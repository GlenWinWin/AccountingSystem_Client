<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clerk;
use App\Distributor;
use App\Items;
use App\ManagePrivileges;
use App\User;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Auth;
use Hash;
use DB;
use Input;
use Mail;
use App\Category;
use App\SubCategory;

class AdminController extends Controller{
    public function listOfClerk(){
      try{
        $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
        $clerks = DB::table('users')->where('users.typeOfUser',1)->groupBy('manage_privileges.clerk_id')
    ->join('manage_privileges', 'manage_privileges.clerk_id', '=', 'users.id')->orderBy('manage_privileges.clerk_id', 'asc')->paginate(10);
        return view('admin.listClerk')->with('clerks',$clerks)->with('password',$decryptedPassword);
      }
      catch(DecryptException $e){
        echo $e;
      }
    }
    public function listOfItems(){
      $items = Items::paginate(10);
      $categories = Category::all();
      return view('admin.listOfItems')->with('items',$items)->with('categories',$categories);
    }
    public function listOfDistributor(){
      try{
        $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
        $distributors = Distributor::where('typeOfUser', '=', 2)->paginate(10);
        return view('admin.listOfDistributor')->with('distributors',$distributors)->with('password',$decryptedPassword);
      }
      catch(DecryptException $e){
        echo $e;
      }
    }
    public function searchClerk(Request $requests){
      try{
        $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
        $keyword = $requests->search;
        $searchClerk = DB::table('users')->where('users.typeOfUser',1)->where('users.name','LIKE','%'.$keyword.'%')->groupBy('manage_privileges.clerk_id')
    ->join('manage_privileges', 'manage_privileges.clerk_id', '=', 'users.id')->orderBy('manage_privileges.clerk_id', 'asc')->paginate(10);
        $title = "Results for clerks...";
        return view('admin.listClerk')->with('clerks',$searchClerk)->with('title',$title)->with('password',$decryptedPassword);
      }
      catch(DecryptException $e){
        echo $e;
      }
    }
    public function searchDistributor(Request $requests){
      try{
        $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
        $keyword = $requests->search;
        $searchDistributor = Distributor::where('name','LIKE','%'.$keyword.'%')->where('typeOfUser','=',2)->paginate(10);
        $title = "Results for distributors...";
        return view('admin.listOfDistributor')->with('distributors',$searchDistributor)->with('title',$title)->with('password',$decryptedPassword);
      }
      catch(DecryptException $e){
        echo $e;
      }
    }
    public function searchItems(Request $requests){
      $keyword = $requests->search;
      $searchItems = Items::where('item_name','LIKE','%'.$keyword.'%')->paginate(10);
      $title = "Results for items...";
      $categories = Category::all();
      return view('admin.listOfItems')->with('items',$searchItems)->with('title',$title)->with('categories',$categories);
    }
    public function addClerk(Request $requests){
      $fname = $requests->fname;
      $lname = $requests->lname;
      $username = 'c_'.substr(strtolower($fname),0,1).strtolower($lname);
      $password = $this->createRandomPassword();
      $contact = $requests->contact;
      $email = $requests->email;
      $address = $requests->address;
      $addClerkQuery = new Clerk;
      $pass_text = Crypt::encrypt($password);
      $data = array( 'email' => $email, 'name' => ucfirst($fname) . ' ' . ucfirst($lname), 'username' => $username, 'password' => $password , 'from' => 'admin@gmail.com', 'from_name' => 'Admin');

      Mail::send('email.sendClerkEmail',['name'=> $data['name'],'username'=>$data['username'],'password'=>$data['password']],function($message) use($data){
        $message->to($data['email'],$data['name'])->from( $data['from'], $data['from_name'] )->subject('Login with your temporary username and password');
      });
      if(Input::hasFile('clerk_pic')){
        $clerk_pic = Input::file('clerk_pic');
        $clerk_pic->move('assets/images/profile_pictures',$clerk_pic->getClientOriginalName());
        $addClerkQuery->fname = ucfirst($fname);
        $addClerkQuery->lname = ucfirst($lname);
        $addClerkQuery->name = ucfirst($fname) . ' ' . ucfirst($lname);
        $addClerkQuery->email = $email;
        $addClerkQuery->username = $username;
        $addClerkQuery->password = Hash::make($password);
        $addClerkQuery->contact = '0'.$contact;
        $addClerkQuery->address = $address;
        $addClerkQuery->typeOfUser = 1;
        $addClerkQuery->profile_path = 'assets/images/profile_pictures/'.$clerk_pic->getClientOriginalName();
        $addClerkQuery->passsword_text = $pass_text;
        $addClerkQuery->save();
      }
      else{
        $addClerkQuery->fname = ucfirst($fname);
        $addClerkQuery->lname = ucfirst($lname);
        $addClerkQuery->name = ucfirst($fname) . ' ' . ucfirst($lname);
        $addClerkQuery->email = $email;
        $addClerkQuery->username = $username;
        $addClerkQuery->password = Hash::make($password);
        $addClerkQuery->contact = '0'.$contact;
        $addClerkQuery->address = $address;
        $addClerkQuery->typeOfUser = 1;
        $addClerkQuery->profile_path = 'assets/images/user.png';
        $addClerkQuery->passsword_text = $pass_text;
        $addClerkQuery->save();
      }
      //add priviliges

      $addPrivilegesforClerk = new ManagePrivileges;
      $addPrivilegesforClerk->clerk_id = $addClerkQuery->id;
      $addPrivilegesforClerk->sales_encoding = 0;
      $addPrivilegesforClerk->account_registration = 0;
      $addPrivilegesforClerk->add_clerk = 0;
      $addPrivilegesforClerk->use_inventory = 0;
      $addPrivilegesforClerk->generate_report = 0;
      $addPrivilegesforClerk->save();

      return redirect('list_merchant');
    }
    public function changePasswordAccount(Request $requests){
      $id = $requests->the_id;
      $newPassword = $requests->new_password;
      $changePwordAccount = User::where('id','=',$id)->update(['password'=>Hash::make($newPassword),'passsword_text'=>Crypt::encrypt($newPassword)]);
      return redirect()->back();
    }
    public function editItem(Request $requests){
      if(Input::hasFile('update_item')){
        $item_pic = Input::file('update_item');
        $item_pic->move('assets/images/item_pictures',$item_pic->getClientOriginalName());
        $item_id = $requests->id_item;
        $item_name = $requests->name_item;
        $item_costPrice = $requests->costPrice_item;
        $item_subcostPrice = $requests->subcostPrice_item;
        $item_sellingPrice = $requests->sellingPrice_item;
        $editItem = Items::where('item_id','=',$item_id)->update(['item_name'=>$item_name,'item_costPrice'=>$item_costPrice,
        'item_subcostPrice'=>$item_subcostPrice,'item_sellingPrice'=>$item_sellingPrice,'item_image_path'=>'assets/images/item_pictures/'.$item_pic->getClientOriginalName()]);
      }
      else{
        $item_id = $requests->id_item;
        $item_name = $requests->name_item;
        $item_costPrice = $requests->costPrice_item;
        $item_subcostPrice = $requests->subcostPrice_item;
        $item_sellingPrice = $requests->sellingPrice_item;
        $editItem = Items::where('item_id','=',$item_id)->update(['item_name'=>$item_name,'item_costPrice'=>$item_costPrice,
        'item_subcostPrice'=>$item_subcostPrice,'item_sellingPrice'=>$item_sellingPrice]);  
      }
      return redirect()->back();
    }

    public function removeClerk(Request $requests){
      $id = $requests->the_id;
      $deleteClerk = Clerk::where('id','=',$id)->delete();
      $removePrivileges = ManagePrivileges::where('clerk_id','=',$id)->delete();
      return redirect('list_merchant');
    }
    public function removeDistributor(Request $requests){
      $id = $requests->the_id;
      $deleteDistributor = Distributor::where('id','=',$id)->delete();
      return redirect('list_distributor');
    }
    public function removeItem(Request $requests){
      $id = $requests->the_id;
      $deleteItem = Items::where('item_id','=',$id)->delete();
      return redirect('list_items');
    }
    public function removeMultipleUsers(Request $requests){
      $ids = explode(',',$requests->ids_to_be_delete);
      foreach($ids as $value){
        if($value != 0){
          $usertoDelete = User::where('id','=',$value)->delete();
          $removePrivileges = ManagePrivileges::where('clerk_id','=',$value)->delete();
        }
      }
      return redirect()->back();
    }
    public function removeMultipleItems(Request $requests){
      $ids = explode(',',$requests->ids_to_be_delete);
      foreach($ids as $value){
        if($value != 0){
          $itemtoDelete = Items::where('item_id','=',$value)->delete();
        }
      }
      return redirect()->back();
    }
    public function managePrivileges(Request $requests){
      $id = $requests->clerkId;
      $sales_encoding = ($requests->sales_encoding != '') ? 1 : 0;
      $account_registration = ($requests->account_registration != '') ? 1 : 0;
      $add_clerk = ($requests->add_clerk != '') ? 1 : 0;
      $use_inventory = ($requests->use_inventory != '') ? 1 : 0;
      $generate_report = ($requests->generate_report != '') ? 1 : 0;

      $selectifHasClerk = ManagePrivileges::where('clerk_id','=',$id)->get();
      if(count($selectifHasClerk) == 1){
        $managePrivileges = ManagePrivileges::where('clerk_id','=',$id)->update(['sales_encoding'=>$sales_encoding,'account_registration'=>$account_registration,
      'add_clerk'=>$add_clerk,'use_inventory'=>$use_inventory,'generate_report'=>$generate_report]);

      return redirect('list_merchant');
      }
      else{
        $addPrivilegesforClerk = new ManagePrivileges;
        $addPrivilegesforClerk->clerk_id = $id;
        $addPrivilegesforClerk->sales_encoding = $sales_encoding;
        $addPrivilegesforClerk->account_registration = $account_registration;
        $addPrivilegesforClerk->add_clerk = $add_clerk;
        $addPrivilegesforClerk->use_inventory = $use_inventory;
        $addPrivilegesforClerk->generate_report = $generate_report;
        $addPrivilegesforClerk->save();

        return redirect('list_merchant');
      }
    }
    public function multiplemanagePrivileges(Request $requests){
      $sales_encoding = ($requests->sales_encoding != '') ? 1 : 0;
      $account_registration = ($requests->account_registration != '') ? 1 : 0;
      $add_clerk = ($requests->add_clerk != '') ? 1 : 0;
      $use_inventory = ($requests->use_inventory != '') ? 1 : 0;
      $generate_report = ($requests->generate_report != '') ? 1 : 0;
      $ids = explode(',',$requests->ids_to_be_manage);
      foreach($ids as $value){
        if($value != 0){
          $addPrivilegesforClerk = new ManagePrivileges;
          $addPrivilegesforClerk->clerk_id = $value;
          $addPrivilegesforClerk->sales_encoding = $sales_encoding;
          $addPrivilegesforClerk->account_registration = $account_registration;
          $addPrivilegesforClerk->add_clerk = $add_clerk;
          $addPrivilegesforClerk->use_inventory = $use_inventory;
          $addPrivilegesforClerk->generate_report = $generate_report;
          $addPrivilegesforClerk->save();
        }
      }
      return redirect()->back();
    }
    public function addCategorySubCategory(Request $requests){
      if($requests->category == 0){

        $addNewCategory = new Category;
        $addNewCategory->category_name = $requests->cat_new;
        $addNewCategory->save();

        $addNewSubCategory = new SubCategory;
        $addNewSubCategory->category_id = $addNewCategory->id;
        $addNewSubCategory->subcategory_name = $requests->sub_new;
        $addNewSubCategory->save();
      }
      else{
        $addNewSubCategory = new SubCategory;
        $addNewSubCategory->category_id = $requests->category;
        $addNewSubCategory->subcategory_name = $requests->sub_new;
        $addNewSubCategory->save();
      }
      return redirect()->back();
    }
    public function backFunction(){
      if(Auth::user()->typeOfUser == 0){
          return redirect('list_merchant');
      }
      else if(Auth::user()->typeOfUser == 1){
          return redirect('home_clerk');
      }
      else{
          return redirect('genealogy');
      }
    }
    public function createRandomPassword() {

    $chars = "abcdefghijkmnopqrstuvwxyz0123456789";
    srand((double)microtime()*1000000);
    $i = 0;
    $pass = '' ;

        while ($i < 8) {
            $num = rand() % 33;
            $tmp = substr($chars, $num, 1);
            $pass .= $tmp;
            $i++;
        }

        return $pass;

    }
    public function filterByCategorySubCategory(Request $requests){
      if($requests->subCategory == 0){
          $category = $requests->category;
          $cat = Category::where('id','=',$category)->first();
          $title = "Results for ".$cat->category_name;
          $items = Items::where('item_category', '=', $category)->paginate(10);
          $categories = Category::all();
          return view('admin.listOfItems')->with('items',$items)->with('title',$title)->with('categories',$categories);
      }
      else{
          $category = $requests->category;
          $sub_category = $requests->subCategory;
          $cat = Category::where('id','=',$category)->first();
          $sub_cat = SubCategory::where('id','=',$sub_category)->first();
          $title = "Results for ".$cat->category_name." - ".$sub_cat->subcategory_name;
          $items = Items::where('item_sub_category', '=', $sub_category)->where('item_category', '=', $category)->paginate(10);
          $categories = Category::all();
          return view('admin.listOfItems')->with('items',$items)->with('title',$title)->with('categories',$categories);
      }
    }
  }
