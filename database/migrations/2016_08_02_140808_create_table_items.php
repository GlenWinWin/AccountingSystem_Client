<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('items', function (Blueprint $table) {
        $table->increments('item_id');
        $table->string('item_category');
        $table->string('item_sub_category');
        $table->string('item_name');
        $table->integer('item_quantity');
        $table->integer('item_costPrice');
        $table->integer('item_sellingPrice');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('items');
    }
}
