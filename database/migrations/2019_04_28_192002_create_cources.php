<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 150);
            $table->string('img', 150);
            $table->text('description');
            $table->integer('user_id')->unsigned()->default(99999999);
            $table->foreign('user_id')->references('id')->on('users');
            $table->integer('category_id')->unsigned()->default(99999999);
            $table->foreign('category_id')->references('id')->on('categories');
            $table->integer('creater_id');
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
        Schema::dropIfExists('courses');
    }
}
