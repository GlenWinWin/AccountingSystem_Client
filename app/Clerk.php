<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clerk extends Model
{
  protected $fillable = [
    'id',
    'fname',
    'lname',
    'name',
    'username',
    'password',
    'email',
    'address',
    'contact',
    'profile_path',
    'typeOfUser',
    'passsword_text',
  ];

  public $timestamps = false;

  protected $table = 'users';
}
