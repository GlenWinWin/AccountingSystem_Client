<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Commissions extends Model
{
  protected $fillable = [
    'distributor_id',
    'commission'
  ];

  public $timestamps = false;

  protected $table = 'commissions';
}
