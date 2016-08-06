<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ManagePrivileges extends Model
{
  protected $fillable = [
    'clerk_id',
    'sales_encoding',
    'account_registration',
    'add_clerk',
    'use_inventory',
    'generate_report',
  ];

  public $timestamps = false;

  protected $table = 'manage_privileges';
}
