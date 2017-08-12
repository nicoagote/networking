<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('users_skills', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users');
             $table->integer('skill_id')->unsigned();
             $table->foreign('skill_id')->references('id')->on('skills');
             $table->enum('seniority_level', ['trainee', 'junior', 'semi_senior', 'senior']);
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
         Schema::dropIfExists('users_skills');
     }
}
