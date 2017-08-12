<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectUsersRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('project_users_requests', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('project_id')->unsigned();
             $table->foreign('project_id')->references('id')->on('projects');
             $table->integer('issuer_id')->unsigned();
             $table->foreign('issuer_id')->references('id')->on('users');
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
         Schema::dropIfExists('project_users_requests');
     }
}
