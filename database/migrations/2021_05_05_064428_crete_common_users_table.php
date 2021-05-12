<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreteCommonUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('common_users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('password');
            $table->string('name')->index();
            $table->string('email')->unique()->index();
            $table->enum('role', ['admin','student', 'teacher'])->default('student');
            $table->rememberToken();
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
        Schema::dropIfExists('common_users');
    }
}
