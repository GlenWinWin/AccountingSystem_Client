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
                'email' => $requests->email,
                'password' => $requests->password
            ),
            array(
                'email' => 'required|email',
                'password' => 'required'
            ),
            array(
                'email.required' => 'Email is mandatory !',
                'password.required' => 'Password is necessary !'
            )
        );

        if($validator->passes()){
          $attempt = Auth::attempt([
            'email' => $requests->email,
            'password' => $requests->password,
          ]);
          if($attempt){
            echo 'yehey';
          }
          else{
            echo 'nah';
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
}
