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
        Schema::create('title_translations', function (Blueprint $table) {
            $table->id();
            $table->string('key'); // Adds a STRING column for 'key'
            $table->json('value'); // Adds a json column for 'value'
            $table->string('description', 500)->nullable(); // Adds a STRING column for 'description' with a maximum length of 500 characters
            $table->foreignId('created_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null') // Set to NULL if the user is deleted
                ->onUpdate('cascade'); // Cascade updates if the referenced user ID is updated

            $table->foreignId('updated_by')
                ->nullable()
                ->constrained('users')
                ->onDelete('set null') // Set to NULL if the user is deleted
                ->onUpdate('cascade');
            $table->tinyInteger('status')->default(1)->nullable(); // Adds an ENUM column for 'status'
            $table->timestamps();
            $table->softDeletes(); // Adds deleted_at TIMESTAMP column for soft deletes

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('title_translations');
    }
};
