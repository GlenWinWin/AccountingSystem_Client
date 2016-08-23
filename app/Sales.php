<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
  protected $fillable = [
    'distributor_id',
    'clerk_id',
    'sale_time',
  ];

  public $timestamps = false;

  protected $table = 'sales';
}
