<?php

//Add functions
Route::post('clerk_add', 'AdminController@addClerkProcess');

//Search functions
Route::post('clerk_search', 'AdminController@searchClerk');
Route::post('distributor_search', 'AdminController@searchDistributor');
Route::post('items_search', 'AdminController@searchItems');

//login and logout functions
Route::get('login', function () {
  if(Auth::check()){
		return redirect('home');
	}
	else{
		return view('auth.login');
	}
});
Route::get('logout',[
  'uses' => 'UserController@logout'
]);


//View functions
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

//Edit Profile function view
Route::get('edit_profile',[
  'middleware' => 'auth',
  'uses' => 'UserController@edit_profile'
]);

//Change Password function for admin
Route::post('change_password_account', 'AdminController@changePasswordAccount');

//Delete Functions
Route::post('clerk_remove', 'AdminController@removeClerk');
Route::post('distributor_remove', 'AdminController@removeDistributor');
Route::post('items_remove', 'AdminController@removeItem');


Route::get('subCategory_head',[
  'middleware' => 'auth',
  'uses' => 'ItemsController@subCategory_head'
]);

Route::get('subCategory_eye',[
  'middleware' => 'auth',
  'uses' => 'ItemsController@subCategory_eye'
]);

Route::resource('user','UserController',['only' => ['store']]);
Route::resource('admin','AdminController');
Route::resource('items','ItemsController');
