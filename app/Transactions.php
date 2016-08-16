<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transactions extends Model
{
  protected $fillable = [
    'transaction_id',
    'distributor_id',
    'transaction_date',
  ];

  public $timestamps = false;

  protected $table = 'transactions';
}
