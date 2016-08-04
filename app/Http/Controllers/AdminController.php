<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Clerk;
use App\Distributor;
use App\Items;

class AdminController extends Controller{
    public function listOfClerk(){
      $clerks = Clerk::where('typeOfUser', '=', 1)->get();
      return view('clerk.listClerk')->with('clerks',$clerks);
    }
    public function listOfItems(){
      $items = Items::all();
      return view('items.listOfItems')->with('items',$items);
    }
    public function listOfDistributor(){
      $distributors = Distributor::where('typeOfUser', '=', 2)->get();
      return view('distributor.listOfDistributor')->with('distributors',$distributors);
    }
    public function searchClerk(Request $requests){
      $keyword = $requests->search;
      $searchClerk = Clerk::where('typeOfUser','=',1)->where('fname','LIKE','%'.$keyword.'%')->orWhere('lname','LIKE','%'.$keyword.'%')->get();
      $title = "Results for search...";
      return view('clerk.listClerk')->with('clerks',$searchClerk)->with('title',$title);
    }
    public function searchDistributor(Request $requests){
      $keyword = $requests->search;
      $searchDistributor = Distributor::where('typeOfUser','=',2)->where('fname','LIKE','%'.$keyword.'%')->orWhere('lname','LIKE','%'.$keyword.'%')->get();
      $title = "Results for search...";
      return view('distributor.listOfDistributor')->with('distributors',$searchDistributor)->with('title',$title);
    }
    public function searchItems(Request $requests){
      $keyword = $requests->search;
      $searchItems = Items::where('item_name','LIKE','%'.$keyword.'%')->get();
      $title = "Results for search...";
      return view('items.listOfItems')->with('items',$searchItems)->with('title',$title);
    }
    public function addClerk(){
      return view('clerk.addClerk');
    }
    public function addClerkProcess(Request $requests){
      $fname = $requests->fname;
      $lname = $requests->lname;
      $username = 'c_'.substr(strtolower($fname),0,1).strtolower($lname);
      $password = $this->createRandomPassword();
      $contact = $requests->contact;
      $email = $requests->email;
      $address = $requests->address;

      $addClerkQuery = new Clerk;
      $addClerkQuery->fname = $fname;
      $addClerkQuery->lname = $lname;
      $addClerkQuery->email = $email;
      $addClerkQuery->username = $username;
      $addClerkQuery->password = $password;
      $addClerkQuery->contact = $contact;
      $addClerkQuery->address = $address;
      $addClerkQuery->typeOfUser = 1;
      $addClerkQuery->profile_path = 'assets/images/user.png';
      $addClerkQuery->save();

      return redirect('list_clerk');
    }
    public function changePasswordAccount(Request $requests){
      $id = $requests->specific_id;
      $newPassword = $requests->new_password;
      $changePwordAccount = User::where('id','=',$id)->update(['password'=>Hash::make($newPassword)]);
      return redirect()->back();
    }
    public function editItem(Request $requests){
      $item_id = $requests->id_item;
      $item_name = $requests->name_item;
      $item_quantity = $requests->quantity_item;
      $item_costPrice = $requests->costPrice_item;
      $item_subcostPrice = $requests->subcostPrice_item;
      $item_sellingPrice = $requests->sellingPrice_item;
      $editItem = Items::where('item_id','=',$item_id)->update(['item_name'=>$item_name,'item_quantity'=>$item_quantity,
    'item_costPrice'=>$item_costPrice],'item_subcostPrice'=>$item_subcostPrice,'item_sellingPrice]'=>$item_sellingPrice]);
      return redirect()->back();
    }

    public function removeClerk(Request $requests){
      $id = $requests->the_id;
      $deleteClerk = Clerk::where('id','=',$id)->delete();
      return redirect('list_clerk');
    }
    public function removeDistributor(Request $requests){
      $id = $requests->the_id;
      $deleteDistributor = Distributor::where('id','=',$id)->delete();
      return redirect('list_distributor');
    }
    public function removeItem(Request $requests){
      $id = $requests->the_id;
      $deleteItem = Items::where('item_id','=',$id)->delete();
      return redirect('list_items');
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
