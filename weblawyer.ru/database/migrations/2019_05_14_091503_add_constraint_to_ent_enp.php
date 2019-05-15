<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintToEntEnp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entitys_employers', function (Blueprint $table) {
            $table->bigInteger('ent_id')->unsigned();
            $table->foreign('ent_id')->references('id')->on('entitys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entitys_employers', function (Blueprint $table) {
            //
        });
    }
}
