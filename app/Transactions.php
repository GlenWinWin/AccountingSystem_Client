<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
  protected $fillable = [
    'distributor_id',
    'transactID',
    'typeOfTransaction',
  ];

  public $timestamps = true;

  protected $table = 'transactions';
}
