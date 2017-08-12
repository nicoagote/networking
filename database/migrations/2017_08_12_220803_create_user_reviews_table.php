<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('user_reviews', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('user_id')->unsigned();
             $table->foreign('user_id')->references('id')->on('users');
             $table->integer('reviewer_id')->unsigned();
             $table->foreign('reviewer_id')->references('id')->on('users');
             $table->integer('project_id')->unsigned();
             $table->foreign('project_id')->references('id')->on('projects');
             $table->enum('overall', ['P', 'N'])->length(1);
             $table->string('review')->length(512);
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
         Schema::dropIfExists('user_reviews');
     }
}
