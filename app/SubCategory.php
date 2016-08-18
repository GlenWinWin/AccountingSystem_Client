<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
  protected $fillable = [
    'category_id',
    'subcategory_name',
  ];

  public $timestamps = false;

  protected $table = 'sub_category';
}
