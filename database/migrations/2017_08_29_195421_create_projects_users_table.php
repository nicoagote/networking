<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsUsersTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
       Schema::create('projects_users', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('project_id')->unsigned();
           $table->foreign('project_id')->references('id')->on('projects');
           $table->integer('user_id')->unsigned();
           $table->foreign('user_id')->references('id')->on('users');
           $table->enum('state', ['part_of', 'request', 'blocked'])->length(7);
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
       Schema::dropIfExists('projects_users');
   }
}
