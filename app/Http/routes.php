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
Route::get('search/autocomplete', 'ClerkController@autocomplete');

Route::get('try', function () {
  $privileges = ManagePrivileges::where('clerk_id','=',Auth::user()->id)->get();
  $salesEncoding = 0;
  $accountRegistration = 0;
  $addClerk = 0;
  $useInventory = 0;
  $generateReport = 0;
  foreach($privileges as $priv){
    $salesEncoding = $priv->sales_encoding;
    $accountRegistration = $priv->account_registration;
    $addClerk = $priv->add_clerk;
    $useInventory = $priv->use_inventory;
    $generateReport = $priv->generate_report;
  }
  $clerks = DB::table('users')->where('users.typeOfUser',1)->groupBy('manage_privileges.clerk_id')
->join('manage_privileges', 'manage_privileges.clerk_id', '=', 'users.id')->orderBy('manage_privileges.clerk_id', 'asc')->paginate(10);
  return view('clerk.try')->with('clerks',$clerks)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
});


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

//function for sales encoding
Route::post('sales', ['uses' => 'ClerkController@salesEncoding']);
Route::get('sales_viewing', ['middleware' => 'auth','uses' => 'ClerkController@viewTemporarySales']);
//Function for chaining of dropdowns
Route::get('/dropdown', [[
  'middleware' => 'auth',
  'uses' => 'ClerkController@selectSubCategory'
]]);

Route::resource('user','UserController',['only' => ['store']]);
