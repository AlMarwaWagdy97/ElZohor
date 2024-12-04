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
        Schema::create('insurances', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(); // Language name (e.g., 'English', 'Arabic')
            $table->string('image')->nullable(); // Path to an image (optional)
            $table->integer('sort')->default(0); // Sorting order
            $table->boolean('status')->default(1); // Active status (1 = active, 0 = inactive)
            $table->boolean('feature')->default(1); // Feature flag (1 = featured, 0 = not featured)

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
        Schema::dropIfExists('insurances');
    }
};
