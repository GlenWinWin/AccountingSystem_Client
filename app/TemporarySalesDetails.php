<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemporarySalesDetails extends Model
{
  protected $fillable = [
    'id',
    'item_id',
    'item_name',
    'item_quantity',
    'item_costPrice',
    'clerk_id',
  ];

  public $timestamps = false;

  protected $table = 'temporary_sales_details';
}
