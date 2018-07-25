<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeysUserquestionAnswerQuestion extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('answer_question', function($table) {
            $table->foreign('user_id','answer_question_user_id')->references('id')->on('users')->onDelete('cascade');;
            $table->foreign('question_id','answer_question_question_id')->references('id')->on('questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('answer_question', function (Blueprint $table) {
            //
        });
    }
}
