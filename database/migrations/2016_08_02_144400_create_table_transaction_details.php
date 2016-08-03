<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTransactionDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('transaction_details', function (Blueprint $table) {
        $table->integer('transaction_id');
        $table->integer('item_id');
        $table->string('item_name');
        $table->integer('transaction_quantity');
        $table->double('transaction_sub_total');
        $table->double('transaction_total');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('transaction_details');
    }
}
