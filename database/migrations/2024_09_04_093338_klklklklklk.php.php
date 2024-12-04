<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('home_setting_pages', function (Blueprint $table) {
             $table->tinyInteger('featured')->nullable()->default(1);

        });
        Schema::table('settings_values', function (Blueprint $table) {
            $table->tinyInteger('featured')->nullable()->default(1);

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
};
