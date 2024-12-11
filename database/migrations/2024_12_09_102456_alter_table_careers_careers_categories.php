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
        if (Schema::hasColumns('careers', ['title', 'description'])) {
            Schema::dropColumns('careers', ['title', 'description']);
        }
        if (Schema::hasColumns('careers_categories', ['title', 'description'])) {
            Schema::dropColumns('careers_categories', ['title', 'description']);
        }

        Schema::table('careers', function (Blueprint $table) {
            $table->tinyInteger('feature')->default(0)->nullable()->after('status');
            $table->integer('sort')->default(0)->nullable()->after('feature');

        });
        Schema::table('career_categories', function (Blueprint $table) {
            $table->tinyInteger('feature')->default(0)->nullable()->after('status');
            $table->integer('sort')->default(0)->nullable()->after('feature');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
