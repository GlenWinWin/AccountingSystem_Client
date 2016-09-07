<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Distributor;

class DistributorController extends Controller
{
    public function genealogy(){
      return view('distributor.genealogy');
    }
}
