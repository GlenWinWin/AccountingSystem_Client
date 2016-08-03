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
Route::post('acd/clerk_add', 'AdminController@addClerkProcess');

Route::get('login', function () {
  if(Auth::check()){
		return redirect('home');
	}
	else{
		return view('auth.login');
	}
});

Route::get('list_distributor', [
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfDistributor'
]);
Route::get('list_clerk',[
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfClerk'
]);
Route::get('list_items',[
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfItems'
]);
Route::get('edit_profile',[
  'middleware' => 'auth',
  'uses' => 'AdminController@edit_profile'
]);

Route::get('add_clerk',[
  'middleware' => 'auth',
  'uses' => 'AdminController@addClerk'
]);
Route::get('logout',[
  'uses' => 'UserController@logout'
]);
Route::resource('user','UserController',['only' => ['store']]);
Route::resource('acd','AdminController');
