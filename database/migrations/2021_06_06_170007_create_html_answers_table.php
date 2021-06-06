<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHtmlAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('html_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
            $table->string('question_id');
            $table->string('is_correct');
            $table->unsignedBigInteger('ans_id');
            $table->timestamps();
            $table->foreign('ans_id')->references('id')->on('html_questions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('html_answers');
    }
}
