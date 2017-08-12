<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('projects', function (Blueprint $table) {
             $table->increments('id');
             $table->string('title');
             $table->integer('creator_id')->unsigned();
             $table->foreign('creator_id')->references('id')->on('users');
             $table->string('short_description')->length(140);
             $table->string('long_description')->length(1400);
             $table->enum('active', ['Y', 'N'])->length(1);
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
         Schema::dropIfExists('projects');
     }
}
