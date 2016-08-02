<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReceivings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('receivings', function (Blueprint $table) {
         $table->integer('clerk_id');
         $table->integer('receiving_id');
         $table->string('receiving_time');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('receivings');
     }
}
