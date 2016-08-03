<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Items extends Model
{
  protected $fillable = [
    'item_name',
    'item_quantity',
    'item_costPrice',
    'item_sellingPrice',
    'item_category',
    'item_sub_category',
    'item_subcostPrice',
  ];

  public $timestamps = false;

  protected $table = 'items';
}
