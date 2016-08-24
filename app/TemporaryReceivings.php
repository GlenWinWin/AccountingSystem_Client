<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporaryReceivings extends Model
{
  protected $fillable = [
    'id',
    'item_id',
    'item_name',
    'item_quantity',
    'item_costPrice',
    'clerk_id',
  ];
  public $timestamps = true;

  protected $table = 'temporary_receivings';
}
