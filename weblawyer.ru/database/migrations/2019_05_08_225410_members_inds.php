<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersInds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_inds', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('num_act')->unsigned();
            $table->foreign('num_act')->references('reg_number')->on('acts');
            $table->bigInteger('ind_id')->unsigned();
            $table->foreign('ind_id')->references('id')->on('individuals');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_inds');
    }
}
