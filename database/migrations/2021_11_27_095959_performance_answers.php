<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PerformanceAnswers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('performance_answers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Question_id');
            $table->unsignedBigInteger('user_id');
            $table->string('Score_value');
            $table->foreign('Question_id')->references('id')->on('questions');
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('performance_answers');
    }
}
