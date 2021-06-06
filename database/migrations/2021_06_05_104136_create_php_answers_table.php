<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhpAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('php_answers', function (Blueprint $table) {
            $table->id();
            $table->string('answer');
           
            $table->unsignedBigInteger('ans_id');
            $table->timestamps();
            $table->foreign('ans_id')->references('id')->on('php_questions')->onDelete('cascade');
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('php_answers');
    }
}
