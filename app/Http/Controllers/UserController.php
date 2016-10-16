<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use Mail;
use Validator;
use Session;
use Input;
use Crypt;
use Hash;
use Illuminate\Contracts\Encryption\DecryptException;
use App\ManagePrivileges;
use App\Commissions;

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
            Session::flash('flash_message','invalid');

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
    public function forgotPassword(Request $requests){
      $email = $requests->emailForgot;
      $selectUser = User::where('email','=',$email)->get();
      if(count($selectUser) == 1){
        $temporaryPassword = $this->createRandomPassword();
        $temporaryPasswordText = Crypt::encrypt($temporaryPassword);
        $name = "";
        foreach($selectUser as $user){
          $name = $user->name;
        }
        $updateAccount = User::where('email','=',$email)->update(['password'=>Hash::make($temporaryPassword),'passsword_text'=>$temporaryPasswordText]);

        $data = array( 'email' => $email, 'name' => $name,'password' => $temporaryPassword , 'from' => 'channellingsystem@gmail.com', 'from_name' => 'Admin');

        Mail::send('email.forgotPassword',['name'=> $data['name'],'password'=>$data['password']],function($message) use($data){
          $message->to($data['email'],$data['name'])->from( $data['from'], $data['from_name'] )->subject('Here is your new temporary password');
        });
        Session::flash('flash_message','forgot');

        return redirect('login')->withInput();
      }
      else{
        Session::flash('flash_message','email');

        return redirect('login')->withInput();
      }

    }
    public function edit_profile(){
      try{
        $typeOfUser = Auth::user()->typeOfUser;
        $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
        return view('admin.edit_profile')->with('password',$decryptedPassword)->with('typeOfUser',$typeOfUser);
      }
      catch(DecryptException $e){
        echo $e;
      }
    }
    public function edit_profile_clerk(){
      try{
        $typeOfUser = Auth::user()->typeOfUser;
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
        return view('clerk.editprofile')->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport)->with('typeOfUser',$typeOfUser);
      }
      catch(DecryptException $e){
        echo $e;
      }
    }
    public function edit_profile_distributor(){
      try{
      	$commission = Commissions::where('distributor_id','=',Auth::user()->id)->get();
      $generatedCommission = 0;
      foreach($commission as $comm){
      	$generatedCommission = $comm->commission;
      }
        $positionName = '';
        if(Auth::user()->channelPosition == 1){
          $positionName = 'CHANNEL BUILDER';
        }
        else if(Auth::user()->channelPosition == 2){
          $positionName = 'CHANNEL ASSOCIATE';
        }
        else if(Auth::user()->channelPosition == 3){
          $positionName = 'CHANNEL MANAGER';
        }
        else{
          $positionName = 'CHANNEL DIRECTOR';
        }
        $typeOfUser = Auth::user()->typeOfUser;
        $decryptedPassword = Crypt::decrypt(Auth::user()->passsword_text);
        return view('distributor.editprofile')->with('password',$decryptedPassword)->with('typeOfUser',$typeOfUser)->with('positionName',$positionName)->with('comm',$generatedCommission);
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
        $fname = ucfirst($requests->fname);
        $lname = ucfirst($requests->lname);
        $address = $requests->address;
        $contact = $requests->contact;
        $email = $requests->email;
        $username = "";
        if(Auth::user()->typeOfUser == 0){
          $username = Auth::user()->username;
        }
        else{
          $username = Auth::user()->typeOfUser == 1 ? 'm_'.substr(strtolower($fname),0,1).strtolower($lname) : 'c_'.substr(strtolower($fname),0,1).strtolower($lname);
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
      }
      else{
        $id = Auth::user()->id;
        $fname = ucfirst($requests->fname);
        $lname = ucfirst($requests->lname);
        $address = $requests->address;
        $contact = $requests->contact;
        $email = $requests->email;
        $username = "";
        if(Auth::user()->typeOfUser == 0){
          $username = Auth::user()->username;
        }
        else{
          $username = Auth::user()->typeOfUser == 1 ? 'm_'.substr(strtolower($fname),0,1).strtolower($lname) : 'c_'.substr(strtolower($fname),0,1).strtolower($lname);
        }
        $newPassword = $requests->new_password;
        if($newPassword != ''){
          $updateProfile = User::where('id','=',$id)->update(['name' => $fname . ' ' . $lname,'fname'=>$fname,'lname'=>$lname,'username'=>$username,
        'address'=>$address,'password'=>Hash::make($newPassword),'passsword_text'=>Crypt::encrypt($newPassword),'contact'=>$contact,'email'=>$email]);
        }
        else{
          $updateProfile = User::where('id','=',$id)->update(['name' => $fname . ' ' . $lname,'fname'=>$fname,'lname'=>$lname,'username'=>$username,
        'address'=>$address,'contact'=>$contact,'email'=>$email]);
        }
      }
      if(Auth::user()->typeOfUser == 0){
        return redirect('list_merchant');
      }
      else if(Auth::user()->typeOfUser == 1){
          return redirect('home_merchant');
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
}
