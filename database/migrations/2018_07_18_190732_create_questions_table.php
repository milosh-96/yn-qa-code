<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string('title');
            $table->string('hash',9);
            $table->string('slug');
            $table->text('question_text')->nullable();
            $table->string('answer1')->nullable();
            $table->string('answer2')->nullable();
            $table->integer('user_id',10)->unsigned();
            $table->string('ip_address')->nullable();
            $table->boolean('discussion_enabled')->nullable()->default(1);
            $table->boolean('answers_enabled')->nullable()->default(1);
            $table->integer('likes_count')->nullable()->default(0);
            $table->integer('dislikes_count')->nullable()->default(0);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
