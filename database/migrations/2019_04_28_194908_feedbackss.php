<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Feedbackss extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('feedbacks', function (Blueprint $table) {
            $table->increments('id');
            $table->text('text');
             //создание поля для связывания с таблицей user
            $table->integer('user_id')->unsigned()->default(99999999);
            //создание внешнего ключа для поля 'user_id', который связан с полем id таблицы 'users'
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('course_id')->unsigned()->default(99999999);
            $table->foreign('course_id')->references('id')->on('courses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('feedbacks');
    }
}
