<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContactRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
         Schema::create('contact_requests', function (Blueprint $table) {
             $table->increments('id');
             $table->integer('issuer_id')->unsigned();
             $table->foreign('issuer_id')->references('id')->on('users');
             $table->integer('recipient_id')->unsigned();
             $table->foreign('recipient_id')->references('id')->on('users');
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
         Schema::dropIfExists('contact_requests');
     }
}
