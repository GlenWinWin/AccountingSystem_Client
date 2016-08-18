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

class ClerkController extends Controller
{
  public function clerk_home(){
    try{
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
      $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
      $clerks = DB::table('users')->where('users.typeOfUser',1)->groupBy('manage_privileges.clerk_id')
  ->join('manage_privileges', 'manage_privileges.clerk_id', '=', 'users.id')->orderBy('manage_privileges.clerk_id', 'asc')->paginate(10);
      return view('clerk.clerkHome')->with('clerks',$clerks)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
    }
    catch(DecryptException $e){
      echo $e;
    }
  }
      public function accountRegistration(Request $requests){

      }
      public function salesEncoding(Request $requests){

      }
      public function addClerk(Request $requests){
        $fname = $requests->fname;
        $lname = $requests->lname;
        $username = 'c_'.substr(strtolower($fname),0,1).strtolower($lname);
        $password = $this->createRandomPassword();
        $contact = $requests->contact;
        $email = $requests->email;
        $address = $requests->address;
        $pass_text = Crypt::encrypt($password);
        $addClerkQuery = new Clerk;

        if(Input::hasFile('clerk_pic')){
          $clerk_pic = Input::file('clerk_pic');
          $clerk_pic->move('assets/images/profile_pictures',$clerk_pic->getClientOriginalName());
          $addClerkQuery->fname = $fname;
          $addClerkQuery->lname = $lname;
          $addClerkQuery->name = $fname . ' ' . $lname;
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
          $addClerkQuery->fname = $fname;
          $addClerkQuery->lname = $lname;
          $addClerkQuery->name = $fname . ' ' . $lname;
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

        $data = array( 'email' => $email, 'name' => $fname . ' ' . $lname, 'username' => $username, 'password' => $password , 'from' => 'admin@gmail.com', 'from_name' => 'Admin');

        Mail::send('email.sendClerkEmail',['name'=> $data['name'],'username'=>$data['username'],'password'=>$data['password']],function($message) use($data){
          $message->to($data['email'],$data['name'])->from( $data['from'], $data['from_name'] )->subject('Login with your temporary username and password');
        });

        return redirect('home_clerk');
      }
      /*
      public function generateReport(Request $requests){

      }
      */
      public function listOfDistributor(){
        try{
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
          $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
          $distributors = Distributor::where('typeOfUser', '=', 2)->paginate(10);
          return view('clerk.listOfDistributor')->with('distributors',$distributors)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
        }
        catch(DecryptException $e){
          echo $e;
        }
      }
      public function searchDistributor(Request $requests){
        try{
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
          $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
          $keyword = $requests->search;
          $searchDistributor = Distributor::where('name','LIKE','%'.$keyword.'%')->where('typeOfUser','=',2)->paginate(10);
          $title = "Results for distributors...";
          return view('clerk.listOfDistributor')->with('distributors',$searchDistributor)->with('title',$title)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
        }
        catch(DecryptException $e){
          echo $e;
        }
      }
      public function searchClerk(Request $requests){
        try{
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
          $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
          $keyword = $requests->search;
          $searchClerk = DB::table('users')->where('users.typeOfUser',1)->where('users.name','LIKE','%'.$keyword.'%')->groupBy('manage_privileges.clerk_id')
      ->join('manage_privileges', 'manage_privileges.clerk_id', '=', 'users.id')->orderBy('manage_privileges.clerk_id', 'asc')->paginate(10);
          $title = "Results for clerks...";
          return view('clerk.clerkHome')->with('clerks',$searchClerk)->with('title',$title)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
        }
        catch(DecryptException $e){
          echo $e;
        }
      }
      public function listOfItems(){
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
        $categories = Category::all();
        $items = Items::paginate(10);
        return view('clerk.listOfItems')->with('items',$items)->with('categories',$categories)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
      }
      public function searchItems(Request $requests){
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
        $categories = Category::all();
        $keyword = $requests->search;
        $searchItems = Items::where('item_name','LIKE','%'.$keyword.'%')->paginate(10);
        $title = "Results for items...";
        return view('clerk.listOfItems')->with('items',$searchItems)->with('categories',$categories)->with('title',$title)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
      }
      public function filterItems(Request $requests){
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
        $categories = Category::all();
        $category = $requests->cat;
        $sub_category = $requests->sub;
        $cat = Category::where('id','=',$category)->first();
        $sub_cat = SubCategory::where('id','=',$sub_category)->first();
        $title = "Results for ".$cat->category_name." - ".$sub_cat->subcategory_name;
        $items = Items::where('item_sub_category', '=', $sub_category)->where('item_category', '=', $category)->paginate(10);
        return view('clerk.listOfItems')->with('items',$items)->with('categories',$categories)->with('title',$title)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
      }
      public function selectSubCategory(){
        $id = Input::get('id');
        $sub_categories = SubCategory::where('category_id','=',$id)->get();
        return $sub_categories;
      }
      public function addItem(Request $requests){

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
}
