<?php

use App\ManagePrivileges;

Route::get('add_new_distributor',[
  'middleware' => 'auth',
  'uses' => 'ClerkController@addDist'
]);

//Filter Items
Route::post('filterItems', 'AdminController@filterByCategorySubCategory');
Route::post('itemFilter', 'ClerkController@filterByCategorySubCategory');

//Add Category
Route::post('add_category', 'AdminController@addCategorySubCategory');

//Add functions
Route::post('clerk_add', 'AdminController@addClerk');
Route::post('add_clerk', 'ClerkController@addClerk');

//Add items for clerk
Route::post('add_item', 'ClerkController@addItem');

//Forgot password
Route::post('forgotPassword', 'UserController@forgotPassword');

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
Route::get('home_merchant',[
  'uses' => 'ClerkController@clerk_home'
]);

//login and logout functions
Route::get('login', function () {
  if(Auth::check()){
		if(Auth::user()->typeOfUser == 0){
      return redirect('list_merchant');
    }
    else if(Auth::user()->typeOfUser == 1){
      return redirect('home_merchant');
    }
    else if(Auth::user()->typeOfUser == 2){
      return redirect('genealogy');
    }
	}
	else{
		return view('auth.login');
	}
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
Route::get('list_channel', [
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfDistributor'
]);
Route::get('list_merchant',[
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfClerk'
]);
Route::get('list_items',[
  'middleware' => 'auth',
  'uses' => 'AdminController@listOfItems'
]);

// view functions of clerk
Route::get('channel_list', [
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
Route::get('profile_distributor',[
  'middleware' => 'auth',
  'uses' => 'UserController@edit_profile_distributor'
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

Route::get('priviliges_bonus',[
  'middleware' => 'auth',
  'uses' => 'DistributorController@priviligesBonus'
]);
Route::get('help',[
  'middleware' => 'auth',
  'uses' => 'DistributorController@help'
]);

// function for add distributor
Route::post('addDistributor', ['uses' => 'ClerkController@addDistributor']);

//function for viewing different genealogies
Route::post('viewDifferentGenealogy', ['uses' => 'DistributorController@viewOtherGenealogy']);
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

Route::get('/selectDetailedTransaction', [
  'middleware' => 'auth',
  'uses' => 'DistributorController@selectDetailedTransaction'
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
