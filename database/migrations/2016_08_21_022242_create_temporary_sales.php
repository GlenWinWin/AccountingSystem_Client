<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporarySales extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('temporary_sales_details', function (Blueprint $table) {
        $table->increments('temporary_sales_details_id');
        $table->integer('id');
        $table->integer('item_id');
        $table->string('item_name');
        $table->integer('item_quantity');
        $table->double('item_costPrice');
        $table->integer('clerk_id');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('temporary_sales_details');
    }
}
