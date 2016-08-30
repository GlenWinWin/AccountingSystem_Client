<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receivings extends Model
{
  protected $fillable = [
    'clerk_id',
    'trans_ID',
  ];

  public $timestamps = true;

  protected $table = 'receivings';
}
