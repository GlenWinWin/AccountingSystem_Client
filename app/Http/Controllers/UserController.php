<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Validator;
use Session;

class UserController extends Controller
{
    public function store(Request $requests){
        $inputs = $requests->all();

    	   $validator = Validator::make(
            array(
                'username' => $requests->username,
                'password' => $requests->password
            ),
            array(
                'username' => 'required',
                'password' => 'required'
            ),
            array(
                'username.required' => 'Username is  mandatory!',
                'password.required' => 'Password is necessary !'
            )
        );

        if($validator->passes()){
          $attempt = Auth::attempt([
            'username' => $requests->username,
            'password' => $requests->password,
          ]);
          if($attempt){
            if(Auth::user()->typeOfUser == 0){
              return redirect('list_clerk');
            }
            else if(Auth::user()->typeOfUser == 1){

            }
            else if(Auth::user()->typeOfUser == 2){

            }
          }
          else{
            Session::flash('flash_message','Credentials Invalid');
            Session::flash('type_message','danger');

            return redirect('login')->withInput();
          }
        }
        else{
            return view('auth.login')->withErrors($validator,'errors');

        }
    }
    public function logout(){
      Auth::logout();
      return redirect('login');
    }
    public function edit_profile(){
      return view('settings.edit_profile');
    }
    public function bagong_dp(Request $requests){
      $id = Auth::user()->id;
      $fname = $requests->fname;
      $lname = $requests->lname;
      $address = $requests->address;
      $contact = $requests->contact;
      $email = $requests->email;
      $updateProfile = User::where('id','=',$id)->update(['fname'=>$fname,'lname'=>$lname,
    'address'=>$address,'contact'=>$contact,'email'=>$email]);
      return redirect()->back();
    }
}
