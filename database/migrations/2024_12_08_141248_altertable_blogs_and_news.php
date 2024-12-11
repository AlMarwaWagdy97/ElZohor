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
        if (Schema::hasColumns('blogs', ['title', 'description'])) {
            Schema::dropColumns('blogs', ['title', 'description']);
        }
        if (Schema::hasColumns('news', ['title', 'description'])) {
            Schema::dropColumns('news', ['title', 'description']);
        }

        Schema::table('blogs', function (Blueprint $table) {
            $table->tinyInteger('feature')->default(0)->nullable()->after('status');
            $table->integer('sort')->default(0)->nullable()->after('feature');

        });
        Schema::table('news', function (Blueprint $table) {
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
