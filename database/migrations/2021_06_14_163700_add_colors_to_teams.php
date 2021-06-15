<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColorsToTeams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->after('group', function ($table) {
                $table->string('color_primary')->nullable();
                $table->string('color_secondary')->nullable();
                $table->string('color_terciary')->nullable();
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->dropColumn('color_primary');
            $table->dropColumn('color_secondary');
            $table->dropColumn('color_terciary');
        });
    }
}
