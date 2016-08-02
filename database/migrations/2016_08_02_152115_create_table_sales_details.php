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
         $table->increments('sales_id');
         $table->increments('item_id');
         $table->string('item_description');
         $table->number('sales_quantity');
         $table->number('sales_total');
         $table->number('sales_subtotal');
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
