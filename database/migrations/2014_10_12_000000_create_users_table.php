<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->enum('sex', ['m', 'f'])->lenght(1)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('available', ['Y', 'N'])->length(1)->nullable();
            $table->string('country')->nullable(); #!!! setear length
            $table->string('phone')->nullable();
            $table->string('git')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('description')->nullable();
            $table->string('curriculum_file_location')->nullable();
            $table->string('profile_picture_file_location')->nullable();
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
        Schema::dropIfExists('users');
    }
}
