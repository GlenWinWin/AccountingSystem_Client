<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesDetails extends Model
{
  protected $fillable = [
    'sales_id',
    'item_id',
    'item_name',
    'sales_quantity',
    'sales_price',
    'sales_subtotal',
  ];

  public $timestamps = false;

  protected $table = 'sales_details';
}
