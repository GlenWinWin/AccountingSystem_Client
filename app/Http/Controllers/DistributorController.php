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
use Commissions;

class DistributorController extends Controller
{
    public function genealogy(){
      $promoted = '';
      if($this->checkIfPromoted(Auth::user()->channelPosition,Auth::user()->id,Auth::user()->totalPersonalSales,Auth::user()->monthCounter,Auth::user()->dateToFinish,Auth::user()->totalPersonalSales) == 'yes'){
        if(Auth::user()->channelPosition == 1){
          $distributorID = Auth::user()->distributor_id;
          do{
            $updatetotalCAMonth = Distributor::where('id','=',$distributorID)->increment('totalNewCAMonth',1);
            $selectUpline = Distributor::where('id','=',$distributorID)->get();
            foreach ($selectUpline as $key => $value) {
              $distributorID = $value->distributor_id;
            }
          }while($distributorID != 0);
          $updateTotalMonthSales = Distributor::where('id','=',Auth::user()->id)->update(['totalSalesMonth'=>500000]);
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish),'monthCounter'=>0]);
          $promoted = 'You have been promoted to new Channel Associate.';

        }
        else if(Auth::user()->channelPosition == 2){
          $updateTotalMonthSales = Distributor::where('id','=',Auth::user()->id)->update(['totalSalesMonth'=>1000000]);
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish),'monthCounter'=>0]);
          $promoted = 'You have been promoted to new Channel Manager.';
        }
        else if(Auth::user()->channelPosition == 3){
          $updateTotalMonthSales = Distributor::where('id','=',Auth::user()->id)->update(['totalSalesMonth'=>2000000]);
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish),'monthCounter'=>0]);
          $promoted = 'You have been promoted to new Channel Director.';
        }
        if(Auth::user()->channelPosition != 4){
            $updatePosition = Distributor::where('id','=',Auth::user()->id)->increment('channelPosition',1);
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
        }
      }
      else{
        if(Auth::user()->channelPosition == 1 && Auth::user()->dateToFinish <= date('Y-m-d',strtotime(date('Y-m-d').  ' + 1 days')) && Auth::user()->totalPersonalSales >= 300000){
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish)]);
          $updateMonth = Distributor::where('id','=',Auth::user()->id)->increment('monthCounter',1);
        }
        else if(Auth::user()->channelPosition == 1 && Auth::user()->dateToFinish <= date('Y-m-d',strtotime(date('Y-m-d').  ' + 1 days')) && Auth::user()->totalPersonalSales < 300000){
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish)]);
          if(Auth::user()->monthCounter >= 1){
            $updateMonth = Distributor::where('id','=',Auth::user()->id)->decrement('monthCounter',1);
          }
        }
        else if(Auth::user()->channelPosition == 2 && Auth::user()->dateToFinish <= date('Y-m-d',strtotime(date('Y-m-d').  ' + 1 days')) && Auth::user()->totalPersonalSales >= 500000){
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish)]);
          $updateMonth = Distributor::where('id','=',Auth::user()->id)->increment('monthCounter',1);
        }
        else if(Auth::user()->channelPosition == 2 && Auth::user()->dateToFinish <= date('Y-m-d',strtotime(date('Y-m-d').  ' + 1 days')) && Auth::user()->totalPersonalSales < 500000){
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish)]);
          if(Auth::user()->monthCounter >= 1){
            $updateMonth = Distributor::where('id','=',Auth::user()->id)->decrement('monthCounter',1);
          }
        }
        else if(Auth::user()->channelPosition == 3 && Auth::user()->dateToFinish <= date('Y-m-d',strtotime(date('Y-m-d').  ' + 1 days')) && Auth::user()->totalPersonalSales >= 1000000){
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish)]);
          $updateMonth = Distributor::where('id','=',Auth::user()->id)->increment('monthCounter',1);
        }
        else if(Auth::user()->channelPosition == 3 && Auth::user()->dateToFinish <= date('Y-m-d',strtotime(date('Y-m-d').  ' + 1 days')) && Auth::user()->totalPersonalSales < 1000000){
          $updateDistributor = Distributor::where('id','=',Auth::user()->id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish)]);
          if(Auth::user()->monthCounter >= 1){
            $updateMonth = Distributor::where('id','=',Auth::user()->id)->decrement('monthCounter',1);
          }
        }
      }
      $this->channelActivity(Auth::user()->id,Auth::user()->channelPosition,Auth::user()->totalGroupSales,Auth::user()->totalNewMemberMonth,Auth::user()->dateToFinish,Auth::user()->totalNewCAMonth);

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
      ->with('image5ID',$image5ID)->with('downlines',$selectDownlines)->with('promoted',$promoted)->with('positionName',$positionName);
    }
    public function viewOtherGenealogy(Request $requests){
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
      ->with('image5ID',$image5ID)->with('downlines',$selectDownlines)->with('profile',$profile)->with('positionName',$positionName);
    }
    public function viewTransactions(){
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

      $allTransactions = Transactions::where('distributor_id','=',Auth::user()->id)->orderBy('id','DESC')->paginate(10);

      return view('distributor.viewTransactions')->with('transactions',$allTransactions)->with('positionName',$positionName);
    }
    public function selectDetailedTransaction(){
      $transactID = Input::get('transactID');
      $transaction_details = TransactionDetails::where('transaction_id','=',$transactID)->get();
      return $transaction_details;
    }
    public function checkIfPromoted($position,$distributorID,$netSales,$monthCounter,$dateToFinish,$groupSales){
      $Date = date('Y-m-d');
      $todaysDate = date('Y-m-d',strtotime($Date . ' + 1 days'));
      $promoted = 'no';
      $countCA = Distributor::where('distributor_id','=',$distributorID)->where('channelPosition','=','2')->get();
      $countCM = Distributor::where('distributor_id','=',$distributorID)->where('channelPosition','=','3')->get();
      if($position == 1 && $netSales >= 300000 && $monthCounter == 2 && ($dateToFinish <= $todaysDate)){
        $promoted = 'yes';
      }
      else if($position == 2 && $netSales >= 500000 && $monthCounter == 2 && $dateToFinish <= $todaysDate && $countCA == 5){
        $promoted = 'yes';
      }
      else if($position == 3 && $netSales >= 1000000 && $monthCounter == 2 && $dateToFinish <= $todaysDate && $countCM == 5 && $groupSales >= 3000000){
        $promoted = 'yes';
      }
      return $promoted;
    }
    public function channelActivity($DISTRIBUTOR_Id,$position,$groupSales,$totalMemberForTheMonth,$dateFinished,$totalCAMonth){
      $Date = date('Y-m-d');
      $todaysDate = date('Y-m-d',strtotime($Date . ' + 1 days'));
      if($position == 2 && $dateFinished <= $todaysDate){
        if($groupSales < 1000000 && $totalMemberForTheMonth < 5){
          $updateTotalMonthSales = Distributor::where('id','=',$DISTRIBUTOR_Id)->update(['totalSalesMonth'=>300000]);
          $updateDistributor = Distributor::where('id','=',$DISTRIBUTOR_Id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish),'monthCounter'=>0]);
          $updatePosition = Distributor::where('id','=',Auth::user()->id)->decrement('channelPosition',1);
        }
      }
      else if($position == 3 && $dateFinished <= $todaysDate){
        if($groupSales < 2000000 && $totalCAMonth < 5){
          $updateTotalMonthSales = Distributor::where('id','=',$DISTRIBUTOR_Id)->update(['totalSalesMonth'=>500000]);
          $updateDistributor = Distributor::where('id','=',$DISTRIBUTOR_Id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish),'monthCounter'=>0]);
          $updatePosition = Distributor::where('id','=',Auth::user()->id)->decrement('channelPosition',1);
        }
      }
      else if($position == 4 && $dateFinished <= $todaysDate){
        if($groupSales < 3500000 && $totalCAMonth < 5){
          $updateTotalMonthSales = Distributor::where('id','=',$DISTRIBUTOR_Id)->update(['totalSalesMonth'=>1000000]);
          $updateDistributor = Distributor::where('id','=',$DISTRIBUTOR_Id)->update(['totalPersonalSales'=>0,'totalGroupSales'=>0,'totalNewMemberMonth'=>0,'totalNewCAMonth'=>0,'dateToFinish'=>$this->dateToFinish(Auth::user()->dateToFinish),'monthCounter'=>0]);
          $updatePosition = Distributor::where('id','=',Auth::user()->id)->decrement('channelPosition',1);
        }
      }
    }
    public function dateToFinish($dateToStart){
      $numberOfDays1 = cal_days_in_month(CAL_GREGORIAN,explode('-',$dateToStart)[1],explode('-',$dateToStart)[0]);
      if($numberOfDays1 == explode('-',$dateToStart)[2]){
       	        $dateToStart1 = date('Y-m-d',strtotime($dateToStart.  ' + 2 days'));
       	        $numberOfDays = cal_days_in_month(CAL_GREGORIAN,explode('-',$dateToStart1)[1],explode('-',$dateToStart1)[0]);
       	        $dateToFinish = explode('-',$dateToStart1)[0].'-'.explode('-',$dateToStart1)[1].'-'.$numberOfDays;
      }
      else{
       		$dateToFinish = explode('-',$dateToStart)[0].'-'.explode('-',$dateToStart)[1].'-'.$numberOfDays1;
      }
      return $dateToFinish;
    }
    public function priviligesBonus(){
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
      $countCA = Distributor::where('distributor_id','=',Auth::user()->id)->where('channelPosition','=','2')->get();
      $countCM = Distributor::where('distributor_id','=',Auth::user()->id)->where('channelPosition','=','3')->get();
      return view('distributor.priviligesBonus')->with('positionName',$positionName)->with('CA',count($countCA))->with('CM',count($countCM));
    }
}
