<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserCurrentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Temporary table
        Schema::create('user_current_exam', function (Blueprint $table) {
            $table->increments('id');
             $table->integer('user_id');
            $table->integer('exam_id');
            $table->integer('question_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('exam_id')->references('id')->on('exams');
            $table->foreign('question_id')->references('id')->on('questions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_current_exam', function (Blueprint $table) {
            Schema::dropIfExists('user_exams');
        });
    }
}
