<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
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
    'profile_path',
    'typeOfUser',
  ];

  public $timestamps = false;

  protected $table = 'users';
}
