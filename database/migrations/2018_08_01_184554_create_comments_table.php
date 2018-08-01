<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('comment_text');
            $table->integer('user_id')->unsigned();
            //foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->integer('object_id')->unsigned();
            //foreign key
            $table->integer('comment_id')->unsigned()->nullable();
            //foreign key
            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');

            $table->boolean('reply')->default(false);
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
        Schema::dropIfExists('comments');
    }
}
