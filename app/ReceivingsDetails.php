<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReceivingsDetails extends Model
{
  protected $fillable = [
    'receiving_id',
    'item_id',
    'item_name',
    'receive_quantity',
    'receive_subtotal',
    'receive_price',

  ];

  public $timestamps = false;

  protected $table = 'receiving_details';
}
