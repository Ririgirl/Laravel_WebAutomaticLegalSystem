<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MembersEntitys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members_entitys', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('num_act')->unsigned();
            $table->bigInteger('entity_id')->unsigned();
            $table->foreign('num_act')->references('reg_number')->on('acts');
            $table->foreign('entity_id')->references('id')->on('entitys');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members_entitys');
    }
}
