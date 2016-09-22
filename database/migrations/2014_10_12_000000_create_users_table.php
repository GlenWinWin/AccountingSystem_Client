<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->text('address');
            $table->string('contact',11);
            $table->integer('typeOfUser');
            $table->integer('channelPosition');
            $table->integer('distributor_id');
            $table->integer('connectCounter');
            $table->integer('monthCounter');
            $table->double('totalSalesMonth');
            $table->double('totalSales');
            $table->integer('totalNewMemberMonth');
            $table->integer('totalNewMember');
            $table->string('profile_path');
            $table->rememberToken();
            $table->timestamps();
            $table->string('passsword_text');
            $table->string('userID');
            $table->string('dateToFinish',15);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
