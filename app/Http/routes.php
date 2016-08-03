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
Route::post('admin/clerk_add', 'AdminController@addClerkProcess');
Route::post('admin/clerk_search', 'AdminController@searchClerk');


Route::get('login', function () {
  if(Auth::check()){
		return redirect('home');
	}
	else{
		return view('auth.login');
	}
});

Route::get('admin/list_distributor', [
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfDistributor'
]);
Route::get('admin/list_clerk',[
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfClerk'
]);
Route::get('admin/list_items',[
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfItems'
]);
Route::get('edit_profile',[
  'middleware' => 'auth',
  'uses' => 'UserController@edit_profile'
]);
Route::get('add_clerk',[
  'middleware' => 'auth',
  'uses' => 'AdminController@addClerk'
]);

Route::get('subCategory_head',[
  'middleware' => 'auth',
  'uses' => 'ItemsController@subCategory_head'
]);

Route::get('subCategory_eye',[
  'middleware' => 'auth',
  'uses' => 'ItemsController@subCategory_eye'
]);

Route::get('logout',[
  'uses' => 'UserController@logout'
]);
Route::resource('user','UserController',['only' => ['store']]);
Route::resource('admin','AdminController');
Route::resource('items','ItemsController');
