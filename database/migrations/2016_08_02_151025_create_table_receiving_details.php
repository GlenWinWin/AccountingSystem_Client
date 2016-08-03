<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableReceivingDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('receiving_details', function (Blueprint $table) {
         $table->increments('receiving_id');
         $table->integer('item_id');
         $table->string('item_name');
         $table->integer('receive_quantity');
         $table->double('receive_subtotal');
         $table->double('receive_total');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('receiving_details');
     }
}
