<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserRelationshipsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
   public function up()
   {
       Schema::create('user_relationships', function (Blueprint $table) {
           $table->increments('id');
           $table->integer('relating_user_id')->unsigned();
           $table->foreign('relating_user_id')->references('id')->on('users');
           $table->enum('state', ['contact', 'request', 'blocked'])->length(7);
           $table->integer('related_user_id')->unsigned();
           $table->foreign('related_user_id')->references('id')->on('users');
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
       Schema::dropIfExists('user_relationships');
   }
}
