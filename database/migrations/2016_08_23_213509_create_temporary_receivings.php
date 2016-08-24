<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTemporaryReceivings extends Migration
{
  public function up()
  {
    Schema::create('temporary_receivings', function (Blueprint $table) {
      $table->increments('id');
      $table->timestamps();
    });
  }

  public function down()
  {
      Schema::drop('temporary_receivings');
  }

}
