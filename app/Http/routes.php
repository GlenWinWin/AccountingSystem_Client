<?php

//Add functions
Route::post('clerk_add', 'AdminController@addClerk');

//Search functions
Route::get('clerk_search',[
  'middleware' => 'auth',
  'uses' => 'AdminController@searchClerk'
]);
Route::get('distributor_search',[
  'middleware' => 'auth',
  'uses' => 'AdminController@searchDistributor'
]);
Route::get('items_search',[
  'middleware' => 'auth',
  'uses' => 'AdminController@searchItems'
]);

//login and logout functions
Route::get('login', function () {
  if(Auth::check()){
		if(Auth::user()->typeOfUser == 0){
      return redirect('list_clerk');
    }
    else if(Auth::user()->typeOfUser == 1){
      return 'Clerk is here';
    }
    else if(Auth::user()->typeOfUser == 2){
      return 'Distributor is here';
    }
	}
	else{
		return view('auth.login');
	}
});
Route::get('logout',[
  'uses' => 'UserController@logout'
]);
Route::get('try', function(){
  return view('clerk.try');
});

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

//Edit Profile functions
Route::get('edit_profile',[
  'middleware' => 'auth',
  'uses' => 'UserController@edit_profile'
]);
Route::post('bagong_dp', 'UserController@bagong_dp');

//Edit Functions
Route::post('update_item', 'AdminController@editItem');

//Change Password function for admin
Route::post('change_password_account', 'AdminController@changePasswordAccount');

//Delete Functions
Route::post('clerk_remove', 'AdminController@removeClerk');
Route::post('distributor_remove', 'AdminController@removeDistributor');
Route::post('items_remove', 'AdminController@removeItem');
Route::post('multiple_remove_users', 'AdminController@removeMultipleUsers');

//Manage Privileges function
Route::post('manage_privileges', 'AdminController@managePrivileges');
Route::post('multiple_manage_privileges', 'AdminController@multiplemanagePrivileges');

//Back function
Route::get('back',[
  'uses' => 'AdminController@backFunction'
]);

//Filter per items
Route::get('filterItems',[
  'middleware' => 'auth',
  'uses' => 'ItemsController@filterItems'
]);
Route::resource('user','UserController',['only' => ['store']]);
Route::resource('admin','AdminController');
Route::resource('items','ItemsController');
