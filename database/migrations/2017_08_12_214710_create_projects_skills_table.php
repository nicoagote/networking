<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('projects_skills', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('project_id')->unsigned();
             $table->foreign('project_id')->references('id')->on('projects');
             $table->integer('skill_id')->unsigned();
             $table->foreign('skill_id')->references('id')->on('skills');
             $table->enum('seniority_level', ['trainee', 'junior', 'semi_senior', 'senior'])->nullable();
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
         Schema::dropIfExists('projects_skills');
     }
}
