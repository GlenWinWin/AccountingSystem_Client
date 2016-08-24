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
         $table->increments('receiving_detail_id');
         $table->integer('receiving_id');
         $table->integer('item_id');
         $table->string('item_name');
         $table->double('receive_price');
         $table->integer('receive_quantity');
         $table->double('receive_subtotal');
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
