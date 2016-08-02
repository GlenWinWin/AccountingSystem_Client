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
        $table->number('clerk_id');
        $table->number('sales_encoding');
        $table->number('accout_registration');
        $table->number('add_clerk');
        $table->number('use_inventory');
        $table->number('generate_report');
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
