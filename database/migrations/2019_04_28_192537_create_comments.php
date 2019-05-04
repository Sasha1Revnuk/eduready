<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration
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
            $table->string('name', 255)->default(0);
            $table->string('email', 255)->default(0);
            $table->string('subject', 255);
            $table->text('text');
            $table->integer('user_id')->unsigned()->default(99999999);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('lesson_id')->unsigned()->default(99999999);
            $table->foreign('lesson_id')->references('id')->on('lessons');
            $table->integer('parent_id')->default(0);
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
        Schema::dropIfExists('comments');
    }
}
