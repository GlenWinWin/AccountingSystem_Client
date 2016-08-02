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
        $table->number('transaction_id');
        $table->number('item_id');
        $table->string('item_name');
        $table->number('transaction_quantity');
        $table->number('transaction_sub_total');
        $table->number('transaction_total');
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
