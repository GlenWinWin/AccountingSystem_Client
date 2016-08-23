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
         $table->increments('id');
         $table->integer('distributor_id');
         $table->integer('clerk_id');
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
