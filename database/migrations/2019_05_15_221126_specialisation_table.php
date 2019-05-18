<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SpecialisationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('specialisations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('faculty_id')->unsigned()->default(99999999);
            $table->foreign('faculty_id')->references('id')->on('faculties');
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
        Schema::dropIfExists('specialisations');
    }
}
