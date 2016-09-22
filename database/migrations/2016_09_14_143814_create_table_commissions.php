<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCommissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('commissions', function (Blueprint $table) {
        $table->increments('commission_id');
        $table->integer('distributor_id');
        $table->double('commission');
      });
    }

    public function down()
    {
        Schema::drop('commissions');
    }
}
