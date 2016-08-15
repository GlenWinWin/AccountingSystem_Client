<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Validator;
use Session;
use Input;
use Crypt;
use Hash;
use Illuminate\Contracts\Encryption\DecryptException;

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
              return redirect('home_clerk');
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
      try{
        $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
        return view('settings.edit_profile')->with('password',$decryptedPassword);
      }
      catch(DecryptException $e){
        echo $e;
      }
    }
    public function bagong_dp(Request $requests){

      if(Input::hasFile('new_dp')){
        $newPic = Input::file('new_dp');
        $newPic->move('assets/images/profile_pictures',$newPic->getClientOriginalName());
        $id = Auth::user()->id;
        $fname = $requests->fname;
        $lname = $requests->lname;
        $address = $requests->address;
        $contact = $requests->contact;
        $email = $requests->email;
        $username = "";
        if(Auth::user()->typeOfUser == 0){
          $username = Auth::user()->username;
        }
        else{
          $username = Auth::user()->typeOfUser == 1 ? 'c_'.substr(strtolower($fname),0,1).strtolower($lname) : 'd_'.substr(strtolower($fname),0,1).strtolower($lname);
        }
        $newPassword = $requests->new_password;
        if($newPassword != ''){
          $updateProfile = User::where('id','=',$id)->update(['name' => $fname . ' ' . $lname,'fname'=>$fname,'lname'=>$lname,'username'=>$username,
        'address'=>$address,'password'=>Hash::make($newPassword),'passsword_text'=>Crypt::encrypt($newPassword),'contact'=>$contact,'email'=>$email,'profile_path' => 'assets/images/profile_pictures/'.$newPic->getClientOriginalName()]);
        }
        else{
          $updateProfile = User::where('id','=',$id)->update(['name' => $fname . ' ' . $lname,'fname'=>$fname,'lname'=>$lname,'username'=>$username,
        'address'=>$address,'contact'=>$contact,'email'=>$email,'profile_path' => 'assets/images/profile_pictures/'.$newPic->getClientOriginalName()]);
        }
        return redirect()->back();
      }
      else{
        $id = Auth::user()->id;
        $fname = $requests->fname;
        $lname = $requests->lname;
        $address = $requests->address;
        $contact = $requests->contact;
        $email = $requests->email;
        $username = "";
        if(Auth::user()->typeOfUser == 0){
          $username = Auth::user()->username;
        }
        else{
          $username = Auth::user()->typeOfUser == 1 ? 'c_'.substr(strtolower($fname),0,1).strtolower($lname) : 'd_'.substr(strtolower($fname),0,1).strtolower($lname);
        }
        $newPassword = $requests->new_password;
        if($newPassword != ''){
          $updateProfile = User::where('id','=',$id)->update(['name' => $fname . ' ' . $lname,'fname'=>$fname,'lname'=>$lname,'username'=>$username,
        'address'=>$address,'password'=>Hash::make($newPassword),'passsword_text'=>Crypt::encrypt($newPassword),'contact'=>$contact,'email'=>$email,'profile_path' => 'assets/images/user.png']);
        }
        else{
          $updateProfile = User::where('id','=',$id)->update(['name' => $fname . ' ' . $lname,'fname'=>$fname,'lname'=>$lname,'username'=>$username,
        'address'=>$address,'contact'=>$contact,'email'=>$email,'profile_path' => 'assets/images/user.png']);
        }
        return redirect()->back();
      }

    }
}
