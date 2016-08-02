<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableManagePrivileges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('manage_privileges', function (Blueprint $table) {
        $table->integer('clerk_id');
        $table->integer('sales_encoding');
        $table->integer('accout_registration');
        $table->integer('add_clerk');
        $table->integer('use_inventory');
        $table->integer('generate_report');
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('manage_privileges');
    }
}
