<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::post('acd/clerk_add', 'AdminClerkDistributor@addClerkProcess');

Route::get('login', function () {
  if(Auth::check()){
		return redirect('home');
	}
	else{
		return view('auth.login');
	}
});
Route::get('distributor', function () {
  return view('pages.distributor');
});
Route::get('home',[
  'middleware' => 'auth',
  'uses' => 'PagesController@home'
]);
Route::get('add_clerk',[
  'middleware' => 'auth',
  'uses' => 'AdminClerkDistributor@addClerk'
]);
Route::get('logout',[
  'uses' => 'UserController@logout'
]);
Route::resource('user','UserController',['only' => ['store']]);
Route::resource('acd','AdminClerkDistributor');
