<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
  protected $fillable = [
    'id',
    'fname',
    'lname',
    'username',
    'password',
    'email',
    'address',
    'contact',
    'totalSales',
    'profile_path',
    'channelPosition',
    'typeOfUser',
    'distributor_id',
    'connectCounter',
    'monthCounter',
    'passsword_text',
    'userID',
  ];

  public $timestamps = false;

  protected $table = 'users';
}
