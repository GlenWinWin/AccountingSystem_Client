<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryReceivingsDetails extends Migration
{
  public function up()
  {
    Schema::create('temporary_receivings_details', function (Blueprint $table) {
      $table->increments('temporary_receivings_details_id');
      $table->integer('id');
      $table->integer('item_id');
      $table->string('item_name');
      $table->integer('item_quantity');
      $table->double('item_costPrice');
      $table->integer('clerk_id');
    });
  }

  public function down()
  {
      Schema::drop('temporary_receivings_details');
  }
}
