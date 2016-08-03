<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Items;

class ItemsController extends Controller
{
    public function subCategory_head(){
      $title = "Sub Category Head";
      $items = Items::where('item_sub_category', '=', 'HEAD')->get();
      return view('items.listOfItems')->with('items',$items)->with('title',$title);
    }
    public function subCategory_eye(){
      $title = "Sub Category Eye";
      $items = Items::where('item_sub_category', '=', 'EYE')->get();
      return view('items.listOfItems')->with('items',$items)->with('title',$title);
    }
}
