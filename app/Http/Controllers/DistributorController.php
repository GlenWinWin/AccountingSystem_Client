<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Distributor;
use App\User;
use Auth;
use DB;

class DistributorController extends Controller
{
    public function genealogy(){
      $selectDownlines = Distributor::where('distributor_id','=',Auth::user()->id)->get();
      $image1 = 'assets/images/temporary.jpg';
      $image2 = 'assets/images/temporary.jpg';
      $image3 = 'assets/images/temporary.jpg';
      $image4 = 'assets/images/temporary.jpg';
      $image5 = 'assets/images/temporary.jpg';
      $i =0;
      foreach($selectDownlines as $user){
        if($i == 0){
          $image1 = $user->profile_path;
        }
        else if($i == 1){
          $image2 = $user->profile_path;
        }
        else if($i == 2){
          $image3 = $user->profile_path;
        }
        else if($i == 3){
          $image4 = $user->profile_path;
        }
        else{
          $image5 = $user->profile_path;
        }
        $i++;
      }
      return view('distributor.genealogy')->with('image1',$image1)->with('image2',$image2)->with('image3',$image3)->with('image4',$image4)->with('image5',$image5);
    }
}
