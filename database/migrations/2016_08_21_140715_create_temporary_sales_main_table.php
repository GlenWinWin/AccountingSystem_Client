<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporarySalesMainTable extends Migration
{
  public function up()
  {
    Schema::create('temporary_sales', function (Blueprint $table) {
      $table->increments('id');
    });
  }

  public function down()
  {
      Schema::drop('temporary_sales');
  }
}
