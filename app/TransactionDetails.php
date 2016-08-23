<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
  protected $fillable = [
    'transaction_id',
    'item_id',
    'item_name',
    'transaction_quantity',
    'transaction_costPrice',
    'transaction_subtotal',
  ];

  public $timestamps = false;

  protected $table = 'transaction_details';
}
