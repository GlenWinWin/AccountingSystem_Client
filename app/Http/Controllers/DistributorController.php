<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Distributor;
use App\Transactions;
use App\TransactionDetails;
use Auth;
use DB;
use Input;

class DistributorController extends Controller
{
    public function genealogy(){
      $selectDownlines = Distributor::where('distributor_id','=',Auth::user()->id)->get();
      $image1 = 'assets/images/temporary.jpg';
      $image2 = 'assets/images/temporary.jpg';
      $image3 = 'assets/images/temporary.jpg';
      $image4 = 'assets/images/temporary.jpg';
      $image5 = 'assets/images/temporary.jpg';
      $image1ID = 0;
      $image2ID = 0;
      $image3ID = 0;
      $image4ID = 0;
      $image5ID = 0;
      $i =0;
      foreach($selectDownlines as $user){
        if($i == 0){
          $image1 = $user->profile_path;
          $image1ID = $user->id;
        }
        else if($i == 1){
          $image2 = $user->profile_path;
          $image2ID = $user->id;
        }
        else if($i == 2){
          $image3 = $user->profile_path;
          $image3ID = $user->id;
        }
        else if($i == 3){
          $image4 = $user->profile_path;
          $image4ID = $user->id;
        }
        else{
          $image5 = $user->profile_path;
          $image5ID = $user->id;
        }
        $i++;
      }
      return view('distributor.genealogy')->with('image1',$image1)->with('image2',$image2)->with('image3',$image3)->with('image4',$image4)->with('image5',$image5)->with('image1ID',$image1ID)->with('image2ID',$image2ID)->with('image3ID',$image3ID)->with('image4ID',$image4ID)
      ->with('image5ID',$image5ID)->with('downlines',$selectDownlines);
    }
    public function viewOtherGenealogy(Request $requests){
      $id = $requests->distributorID;
      $selectDownlines = Distributor::where('distributor_id','=',$id)->get();
      $profile = "";
      $selectProfile = Distributor::where('id','=',$id)->get();
      foreach ($selectProfile as $key => $value) {
        $profile = $value->profile_path;
      }
      $image1 = 'assets/images/temporary.jpg';
      $image2 = 'assets/images/temporary.jpg';
      $image3 = 'assets/images/temporary.jpg';
      $image4 = 'assets/images/temporary.jpg';
      $image5 = 'assets/images/temporary.jpg';
      $image1ID = 0;
      $image2ID = 0;
      $image3ID = 0;
      $image4ID = 0;
      $image5ID = 0;
      $i =0;
      foreach($selectDownlines as $user){
        if($i == 0){
          $image1 = $user->profile_path;
          $image1ID = $user->id;
        }
        else if($i == 1){
          $image2 = $user->profile_path;
          $image2ID = $user->id;
        }
        else if($i == 2){
          $image3 = $user->profile_path;
          $image3ID = $user->id;
        }
        else if($i == 3){
          $image4 = $user->profile_path;
          $image4ID = $user->id;
        }
        else{
          $image5 = $user->profile_path;
          $image5ID = $user->id;
        }
        $i++;
      }
      return view('distributor.genealogy')->with('image1',$image1)->with('image2',$image2)->with('image3',$image3)->with('image4',$image4)->with('image5',$image5)->with('image1ID',$image1ID)->with('image2ID',$image2ID)->with('image3ID',$image3ID)->with('image4ID',$image4ID)
      ->with('image5ID',$image5ID)->with('downlines',$selectDownlines)->with('profile',$profile);
    }
    public function viewTransactions(){
      $allTransactions = Transactions::where('distributor_id','=',Auth::user()->id)->paginate(10);

      return view('distributor.viewTransactions')->with('transactions',$allTransactions);
    }
    public function selectDetailedTransaction(){
      $transactID = Input::get('transactID');
      $transaction_details = TransactionDetails::where('transaction_id','=',$transactID)->get();
      return $transaction_details;
    }
    public function priviligesBonus(){
      return view('distributor.priviligesBonus');
    }
    public function help(){
      return view('distributor.help');
    }
}
