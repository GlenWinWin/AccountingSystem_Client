<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Distributor;
use App\Clerk;
use App\ManagePrivileges;
use App\Transactions;
use App\Items;
use Hash;
use Input;

class ClerkController extends Controller
{
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

        return redirect('list_clerk');
      }
      /*
      public function generateReport(Request $requests){

      }
      */
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
