<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jop_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('mobile');
            $table->text('address');
            $table->text('file');
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->tinyInteger('status')->nullable()->default(0)->comment("                        0 => not_seen
                        1 => seen
                        2 => contacted
                        3=> accepted
                        4=> rejected
                        
");
            $table->unsignedBigInteger('career_id');


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jop_applications');
    }
};
