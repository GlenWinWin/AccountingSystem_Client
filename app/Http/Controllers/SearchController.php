<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use App\User;

class SearchController extends Controller
{

public function autocomplete(Request $request){
	$term = $request->term;

	$results = array();

	$queries = DB::table('users')
		->where('fname', 'LIKE', '%'.$term.'%')
		->take(5)->get();

	foreach ($queries as $query)
	{
	    $results[] = [ 'value' => $query->fname ];
	}
return response()->json($results);
}
}
