<?php

use App\ManagePrivileges;

//Add functions
Route::post('clerk_add', 'AdminController@addClerk');

//Add items for clerk
Route::post('add_item', 'ClerkController@addItem');

//Search functions of admin
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

//Search functions of clerk
Route::get('search_distributor',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@searchDistributor'
]);
Route::get('search_clerk',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@searchClerk'
]);
Route::get('search_items',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@searchItems'
]);
//Home page for clerks and distributors
Route::get('home_clerk',[
  'uses' => 'ClerkController@clerk_home'
]);

//login and logout functions
Route::get('login', function () {
  if(Auth::check()){
		if(Auth::user()->typeOfUser == 0){
      return redirect('list_clerk');
    }
    else if(Auth::user()->typeOfUser == 1){
      return redirect('home_clerk');
    }
    else if(Auth::user()->typeOfUser == 2){
      return 'Distributor is here';
    }
	}
	else{
		return view('auth.login');
	}
});
Route::get('try', function(){
  return view('email.sendClerkEmail');
});
Route::get('search/autocomplete',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@autocomplete'
]);
//login and logout functions
Route::get('genealogy', [
  'middleware' => 'auth',
  'uses' => 'DistributorController@genealogy']);

  Route::get('view_transactions', [
    'middleware' => 'auth',
    'uses' => 'DistributorController@viewTransactions']);

Route::get('logout',[
  'uses' => 'UserController@logout'
]);


//View functions of admin
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

// view functions of clerk
Route::get('distributor_list', [
  'middleware' => 'auth',
  'uses' => 'ClerkController@listOfDistributor'
]);
Route::get('inventory',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@listOfItems'
]);

//Edit Profile functions
Route::get('edit_profile',[
  'middleware' => 'auth',
  'uses' => 'UserController@edit_profile'
]);
Route::get('profile_edit',[
  'middleware' => 'auth',
  'uses' => 'UserController@edit_profile_clerk'
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
Route::post('multiple_remove_items', 'AdminController@removeMultipleItems');

//Manage Privileges function
Route::post('manage_privileges', 'AdminController@managePrivileges');
Route::post('multiple_manage_privileges', 'AdminController@multiplemanagePrivileges');

//Back function
Route::get('back',[
  'uses' => 'AdminController@backFunction'
]);

//Filter per category or sub category for admin
Route::get('filterItems',[
  'middleware' => 'auth',
  'uses' => 'AdminController@filterbySubCategory'
]);
Route::get('filterbyCategory',[
  'middleware' => 'auth',
  'uses' => 'AdminController@filterbyCategory'
]);

//Filter per category or sub category for clerk
Route::get('Category_filter',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@filterbyCategory'
]);
Route::get('ItemsFilter',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@filterbySubCategory'
]);
// function for add distributor
Route::post('addDistributor', ['uses' => 'ClerkController@addDistributor']);
//function for sales encoding
Route::post('sales', ['uses' => 'ClerkController@salesEncoding']);
Route::get('sales_viewing', ['middleware' => 'auth','uses' => 'ClerkController@viewTemporarySales']);

// function for receivingsAdding
Route::post('receivings', ['uses' => 'ClerkController@receivingsAdding']);
Route::get('receivings_viewing', ['middleware' => 'auth','uses' => 'ClerkController@viewTemporaryReceivings']);
//function for adding temporary_sales
Route::post('adding_sales', ['uses' => 'ClerkController@addItemtoSales']);

Route::post('adding_receivings', ['uses' => 'ClerkController@addItemtoReceivings']);
//Function for chaining of dropdowns
Route::get('/dropdown', [
  'middleware' => 'auth',
  'uses' => 'ClerkController@selectSubCategory'
]);

Route::get('/updateTemporaryQuantitySales', [
  'middleware' => 'auth',
  'uses' => 'ClerkController@updateTemporarySales'
]);
Route::get('/updateTemporaryQuantityReceivings', [
  'middleware' => 'auth',
  'uses' => 'ClerkController@updateTemporaryReceivings'
]);
//function for removing items in sales or receivingsAdding

Route::get('remove_temp_sale_item', [
  'middleware' => 'auth',
  'uses' => 'ClerkController@removeSales_Item'
]);

Route::get('remove_temp_receiving_item', [
  'middleware' => 'auth',
  'uses' => 'ClerkController@removeReceivings_Item'
]);

Route::resource('user','UserController',['only' => ['store']]);
