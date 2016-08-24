<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
  protected $fillable = [
    'distributor_id',
    'clerk_id',
    'trans_ID',
  ];

  public $timestamps = true;

  protected $table = 'sales';
}
