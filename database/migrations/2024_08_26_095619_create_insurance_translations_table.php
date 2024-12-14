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
        Schema::create('insurance_translations', function (Blueprint $table) {
            $table->id();
//            $table->string('name'); // Language name (e.g., 'English', 'Arabic')
//            $table->string('image')->nullable(); // Path to an image (optional)
//            $table->integer('sort')->default(0); // Sorting order
//            $table->boolean('status')->default(1); // Active status (1 = active, 0 = inactive)
//            $table->boolean('feature')->default(1); // Feature flag (1 = featured, 0 = not featured)
            $table->unsignedBigInteger('insurance_id');
            $table->string('locale')->index();
            $table->string('title');
            $table->string('slug')->nullable();
            $table->longText('description')->nullable();
            $table->longText('content')->nullable();
            $table->string('meta_title')->nullable();
            $table->longText('meta_description')->nullable();
            $table->longText('meta_key')->nullable();
            $table->unique(['insurance_id', 'locale']);
            $table->foreign('insurance_id')->references('id')->on('insurances')->onDelete('cascade');

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
        Schema::dropIfExists('insurance_translations');
    }
};
