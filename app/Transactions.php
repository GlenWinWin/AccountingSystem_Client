<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
  protected $fillable = [
    'distributor_id',
    'transaction_date',
    'transactID',
  ];

  public $timestamps = false;

  protected $table = 'transactions';
}
