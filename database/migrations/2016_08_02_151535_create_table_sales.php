<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableSales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     public function up()
     {
       Schema::create('sales', function (Blueprint $table) {
         $table->increments('sales_id');
         $table->number('distributor_id');
         $table->number('clerk_id');
         $table->string('sale_time');
       });
     }

     /**
      * Reverse the migrations.
      *
      * @return void
      */
     public function down()
     {
         Schema::drop('sales');
     }
}
