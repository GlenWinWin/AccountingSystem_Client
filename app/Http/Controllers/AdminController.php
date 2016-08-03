<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

class AdminController extends Controller{
    public function listOfClerk(){
      return view('clerk.listClerk');
    }
    public function listOfItems(){
      return view('items.listOfItems');
    }
    public function listOfDistributor(){
      return view('distributor.listOfDistributor');
    }
    public function addClerk(){
      return view('clerk.addClerk');
    }
    public function edit_profile(){
      return view('settings.edit_profile');
    }
    public function addClerkProcess(Request $requests){
      $fname = $requests->first_name;
      $lname = $requests->last_name;
      $username = 'c_'.substr(strtolower($fname),0,1).strtolower($lname);
      $password = $this->createRandomPassword();

      echo 'First Name : ' . $fname.'<br>';
      echo 'Last Name : ' . $lname.'<br>';
      echo 'Username : ' . $username.'<br>';
      echo 'Password : ' . $password.'<br>';
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
