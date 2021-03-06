<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSalesDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('sales_details', function (Blueprint $table) {
         $table->integer('sales_id');
         $table->integer('item_id');
         $table->string('item_name');
         $table->integer('sales_quantity');
         $table->double('sales_price');
         $table->double('sales_subtotal');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('sales_details');
     }
}
