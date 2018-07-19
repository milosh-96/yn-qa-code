<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerQuestionTable extends Migration
{
    /**
    * Run the migrations.
    *
    * @return void
    */
    public function up() {
        Schema::create('answer_question', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('question_id');
            $table->foreign('question_id')->references('id')->on('questions');
            $table->integer('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('answer');
            $table->string('ip_address');
        });
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
    Schema::dropIfExists('answer_question');
}
}
