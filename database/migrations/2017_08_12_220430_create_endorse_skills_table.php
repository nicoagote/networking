<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEndorseSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('endorse_skills', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users');
             $table->integer('skill_id')->unsigned();
             $table->foreign('skill_id')->references('id')->on('skills');
             $table->integer('endorser_id')->unsigned();
             $table->foreign('endorser_id')->references('id')->on('users');
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
         Schema::dropIfExists('endorse_skills');
     }
}
