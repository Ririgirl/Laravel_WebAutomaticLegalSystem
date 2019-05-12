<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->nullable();//заголовок файла
            $table->string('f_name');//название файла
            $table->string('path');//путь
            $table->string('mytype')->nullable();//идентификация типа файла
            $table->string('size')->nullable();//размер
            $table->bigInteger('num_act')->unsigned();//номер дела
            $table->foreign('num_act')->references('reg_number')->on('acts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('documents');
    }
}
