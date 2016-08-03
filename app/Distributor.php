<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Distributor extends Model
{
  protected $fillable = [
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
  ];

  public $timestamps = false;

  protected $table = 'users';
}
