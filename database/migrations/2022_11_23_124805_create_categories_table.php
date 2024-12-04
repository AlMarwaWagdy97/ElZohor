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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('level')->nullable()->default(1);
            $table->integer('sort')->nullable()->default(0);
            $table->tinyinteger('feature')->nullable()->default(1);
            $table->tinyInteger('status')->nullable()->default(1);
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes(); 
            $table->timestamps();
        });

        Schema::table('categories',function (Blueprint $table){
            $table->foreign('parent_id')->references('id')->on('categories')->nullable()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
