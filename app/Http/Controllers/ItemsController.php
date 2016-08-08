<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Items;

class ItemsController extends Controller
{
    public function filterItems(Request $requests){
      $category = $requests->cat;
      $sub_category = $requests->sub;
      $title = "Results for Filtering...";
      $items = Items::where('item_sub_category', '=', $sub_category)->where('item_category', '=', $category)->paginate(5);
      return view('items.listOfItems')->with('items',$items)->with('title',$title);
    }
}
