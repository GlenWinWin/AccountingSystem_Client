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
         $table->string('distributor_id');
         $table->integer('clerk_id');
         $table->string('trans_ID');
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
         Schema::drop('sales');
     }
}
