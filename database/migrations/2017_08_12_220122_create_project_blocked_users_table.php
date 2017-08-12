<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectBlockedUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('project_blocked_users', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('project_id')->unsigned();
             $table->foreign('project_id')->references('id')->on('projects');
             $table->integer('blocked_user_id')->unsigned();
             $table->foreign('blocked_user_id')->references('id')->on('users');
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
         Schema::dropIfExists('project_blocked_users');
     }
}
