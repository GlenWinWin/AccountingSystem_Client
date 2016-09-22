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
    'totalSalesMonth',
    'profile_path',
    'channelPosition',
    'typeOfUser',
    'distributor_id',
    'connectCounter',
    'monthCounter',
    'passsword_text',
    'userID',
    'dateToFinish',
    'totalNewMember',
    'totalNewMemberMonth',
    'totalPersonalSales',
    'totalGroupSales',
  ];

  public $timestamps = true;

  protected $table = 'users';
}
