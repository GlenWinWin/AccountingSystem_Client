<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Auth;
use Hash;
use DB;
use Input;
use Mail;
use App\Http\Requests;
use App\Clerk;
use App\Distributor;
use App\Items;
use App\ManagePrivileges;
use App\User;
use App\Category;
use App\SubCategory;
use App\TemporarySales;
use App\TemporarySalesDetails;
use App\TemporaryReceivings;
use App\TemporaryReceivingsDetails;
use App\Transactions;
use App\TransactionDetails;
use App\Sales;
use App\SalesDetails;


class ClerkController extends Controller
{
  public function clerk_home(){
    try{
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
      $clerks = DB::table('users')->where('users.typeOfUser',1)->groupBy('manage_privileges.clerk_id')
  ->join('manage_privileges', 'manage_privileges.clerk_id', '=', 'users.id')->orderBy('manage_privileges.clerk_id', 'asc')->paginate(10);
      return view('clerk.clerkHome')->with('clerks',$clerks)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
    }
    catch(DecryptException $e){
      echo $e;
    }
  }
      public function accountRegistration(Request $requests){
        $deleteAllTemporarySales = TemporarySales::query()->truncate();
      }
      public function autocomplete(Request $request){
      	$term = $request->term;

      	$results = array();

      	$searchItems = Items::where('item_name','LIKE','%'.$term.'%')->get();

      	foreach ($searchItems as $item)
      	{
      	    $results[] = [ 'value' => $item->item_name];
      	}
      return response()->json($results);
      }
      public function viewTemporarySales(){
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
        $selectTemporarySales = TemporarySalesDetails::where('clerk_id','=',Auth::user()->id)->paginate(10);
        $existing_id = 0;
        foreach ($selectTemporarySales as $key => $value) {
          $existing_id = $value->id;
        }
        return view('clerk.salesClerk')->with('temporary_sales',$selectTemporarySales)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport)->with('hiddenID',$existing_id);
      }

      public function viewTemporaryReceivings(){
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
        $selectTemporaryReceivings = TemporaryReceivingsDetails::where('clerk_id','=',Auth::user()->id)->paginate(10);
        $existing_id = 0;
        foreach ($selectTemporaryReceivings as $key => $value) {
          $existing_id = $value->id;
        }
        return view('clerk.receivingsClerk')->with('temporary_receivings',$selectTemporaryReceivings)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport)->with('hiddenID',$existing_id);
      }
      public function salesEncoding(Request $requests){
          $selectTemporarySales = TemporarySalesDetails::where('id','=',$requests->hiddenID)->get();

          $addNewTransaction = new Transactions;
          $addNewTransaction->distributor_id = isset($requests->distributorID) ? $requests->distributorID : 2;
          $addNewTransaction->typeOfTransaction = 0;
          $addNewTransaction->save();

          $transID = $addNewTransaction->id;

          $transactID  = "TRANS-".str_pad($transID,10,"0",STR_PAD_LEFT);
          $updateTransactID = Transactions::where('id','=',$transID)->update(['transactID'=>$transactID]);

          $addNewSales = new Sales;
          $addNewSales->distributor_id = isset($requests->distributorID) ? $requests->distributorID : 2;
          $addNewSales->clerk_id = Auth::user()->id;
          $addNewSales->trans_ID = "TRANS-".str_pad($transID,10,"0",STR_PAD_LEFT);
          $addNewSales->save();

          foreach($selectTemporarySales as $transaction_details){
            $addTransactionDetails = new TransactionDetails;
            $addTransactionDetails->transaction_id = $transactID;
            $addTransactionDetails->item_id = $transaction_details->item_id;
            $addTransactionDetails->item_name = $transaction_details->item_name;
            $addTransactionDetails->transaction_quantity = $transaction_details->item_quantity;
            $addTransactionDetails->transaction_costPrice = $transaction_details->item_costPrice;
            $addTransactionDetails->transaction_subtotal = ($transaction_details->item_quantity * $transaction_details->item_costPrice);
            $addTransactionDetails->save();

            $addSalesDetails = new SalesDetails;
            $addSalesDetails->sales_id = $addNewSales->id;
            $addSalesDetails->item_id = $transaction_details->item_id;
            $addSalesDetails->item_name = $transaction_details->item_name;
            $addSalesDetails->sales_quantity = $transaction_details->item_quantity;
            $addSalesDetails->sales_price = $transaction_details->item_costPrice;
            $addSalesDetails->sales_subtotal = ($transaction_details->item_quantity * $transaction_details->item_costPrice);
            $addSalesDetails->save();
            $selectItem = Items::where('item_id','=',$transaction_details->item_id)->get();
            $itemQuantity = 0;
            foreach($selectItem as $item){
              $itemQuantity = $item->item_quantity;
            }
            $updateQuantityforItems = Items::where('item_id','=',$transaction_details->item_id)->update(['item_quantity'=> ($itemQuantity - $transaction_details->item_quantity)]);
          }
          $deleteTemporarySales = TemporarySales::where('id','=',$requests->hiddenID)->delete();
          $deleteTemporarySalesDetails = TemporarySalesDetails::where('id','=',$requests->hiddenID)->delete();
          return redirect('inventory');
      }
      public function receivingsAdding(Request $requests){
          $selectTemporaryReceivings = TemporaryReceivingsDetails::where('id','=',$requests->hiddenID)->get();

          $addNewTransaction = new Transactions;
          $addNewTransaction->distributor_id = isset($requests->distributorID) ? $requests->distributorID : 2;
          $addNewTransaction->typeOfTransaction = 1;
          $addNewTransaction->save();

          $transID = $addNewTransaction->id;

          $transactID  = "TRANS-".str_pad($transID,10,"0",STR_PAD_LEFT);
          $updateTransactID = Transactions::where('id','=',$transID)->update(['transactID'=>$transactID]);

          $addNewReceivings = new Receivings;
          $addNewReceivings->clerk_id = Auth::user()->id;
          $addNewReceivings->trans_ID = "TRANS-".str_pad($transID,10,"0",STR_PAD_LEFT);
          $addNewReceivings->save();

          foreach($selectTemporaryReceivings as $transaction_details){
            $addTransactionDetails = new TransactionDetails;
            $addTransactionDetails->transaction_id = $transactID;
            $addTransactionDetails->item_id = $transaction_details->item_id;
            $addTransactionDetails->item_name = $transaction_details->item_name;
            $addTransactionDetails->transaction_quantity = $transaction_details->item_quantity;
            $addTransactionDetails->transaction_costPrice = $transaction_details->item_costPrice;
            $addTransactionDetails->transaction_subtotal = ($transaction_details->item_quantity * $transaction_details->item_costPrice);
            $addTransactionDetails->save();

            $addReceivingsDetails = new ReceivingsDetails;
            $addReceivingsDetails->receiving_id = $addNewReceivings->id;
            $addReceivingsDetails->item_id = $transaction_details->item_id;
            $addReceivingsDetails->item_name = $transaction_details->item_name;
            $addReceivingsDetails->receive_quantity = $transaction_details->item_quantity;
            $addReceivingsDetails->receive_price = $transaction_details->item_costPrice;
            $addReceivingsDetails->receive_subtotal = ($transaction_details->item_quantity * $transaction_details->item_costPrice);
            $addReceivingsDetails->save();
            $selectItem = Items::where('item_id','=',$transaction_details->item_id)->get();
            $itemQuantity = 0;
            foreach($selectItem as $item){
              $itemQuantity = $item->item_quantity;
            }
            $updateQuantityforItems = Items::where('item_id','=',$transaction_details->item_id)->update(['item_quantity'=> ($itemQuantity + $transaction_details->item_quantity)]);
          }
          $deleteTemporaryReceivings = TemporaryReceivings::where('id','=',$requests->hiddenID)->delete();
          $deleteTemporaryReceivingsDetails = TemporaryReceivingsDetails::where('id','=',$requests->hiddenID)->delete();
          return redirect('inventory');
      }
      public function addItemtoSales(Request $requests){
        $id = 0;
        if($requests->hiddenID == 0){
          $addTemporarySalesID = new TemporarySales;
          $addTemporarySalesID->save();
          $id = $addTemporarySalesID->id;
        }
        else{
          $id = $requests->hiddenID;
        }
        $selectItems = Items::where('item_name','=',$requests->itemName)->get();
        $itemId = 0;
        $itemName = "";
        $itemQuantity = 0;
        $itemPrice = 0;
        foreach($selectItems as $item){
          $itemId = $item->item_id;
          $itemName = $item->item_name;
          $itemQuantity = $item->item_quantity;
          $itemPrice = $item->item_costPrice;
        }
        $selectTemporarySales = TemporarySalesDetails::where('item_name','=',$itemName)->get();
        if(count($selectTemporarySales) == 0){
          $addTemporarySales = new TemporarySalesDetails;
          $addTemporarySales->id = $id;
          $addTemporarySales->item_id = $itemId;
          $addTemporarySales->item_name = $itemName;
          $addTemporarySales->item_quantity = $itemQuantity;
          $addTemporarySales->item_costPrice = $itemPrice;
          $addTemporarySales->clerk_id = Auth::user()->id;
          $addTemporarySales->save();
        }
        return redirect('sales_viewing');
      }
      public function addItemtoReceivings(Request $requests){
        $id = 0;
        if($requests->hiddenID == 0){
          $addTemporaryReceivings = new TemporaryReceivings;
          $addTemporaryReceivings->save();
          $id = $addTemporaryReceivings->id;
        }
        else{
          $id = $requests->hiddenID;
        }
        $selectItems = Items::where('item_name','=',$requests->itemName)->get();
        $itemId = 0;
        $itemName = "";
        $itemQuantity = 0;
        $itemPrice = 0;
        foreach($selectItems as $item){
          $itemId = $item->item_id;
          $itemName = $item->item_name;
          $itemQuantity = $item->item_quantity;
          $itemPrice = $item->item_costPrice;
        }
        $selectTemporaryReceivings = TemporaryReceivingsDetails::where('item_name','=',$itemName)->get();
        if(count($selectTemporaryReceivings) == 0){
          $addTemporaryReceivings = new TemporaryReceivingsDetails;
          $addTemporaryReceivings->id = $id;
          $addTemporaryReceivings->item_id = $itemId;
          $addTemporaryReceivings->item_name = $itemName;
          $addTemporaryReceivings->item_quantity = $itemQuantity;
          $addTemporaryReceivings->item_costPrice = $itemPrice;
          $addTemporaryReceivings->clerk_id = Auth::user()->id;
          $addTemporaryReceivings->save();
        }
        return redirect('receivings_viewing');
      }
      public function addClerk(Request $requests){
        $fname = $requests->fname;
        $lname = $requests->lname;
        $username = 'c_'.substr(strtolower($fname),0,1).strtolower($lname);
        $password = $this->createRandomPassword();
        $contact = $requests->contact;
        $email = $requests->email;
        $address = $requests->address;
        $pass_text = Crypt::encrypt($password);
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
          $addClerkQuery->passsword_text = $pass_text;
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
          $addClerkQuery->passsword_text = $pass_text;
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

        $data = array( 'email' => $email, 'name' => $fname . ' ' . $lname, 'username' => $username, 'password' => $password , 'from' => 'admin@gmail.com', 'from_name' => 'Admin');

        Mail::send('email.sendClerkEmail',['name'=> $data['name'],'username'=>$data['username'],'password'=>$data['password']],function($message) use($data){
          $message->to($data['email'],$data['name'])->from( $data['from'], $data['from_name'] )->subject('Login with your temporary username and password');
        });

        return redirect('home_clerk');
      }
      public function addItem(Request $requests){
        echo 'Category = ' . $requests->category.'<br>';
        echo 'Sub Category = ' . $requests->subCategory.'<br>';
        echo 'Item Name = ' . $requests->item_name.'<br>';
        echo 'Cost = ' . $requests->cost.'<br>';
        echo 'Sub Cost = ' . $requests->subcost.'<br>';
        echo 'Selling Price = ' . $requests->selling_price;

        $addItem = new Items;
        $addItem->item_category = $requests->category;
        $addItem->item_sub_category = $requests->subCategory;
        $addItem->item_name = $requests->item_name;
        $addItem->item_quantity = 1;
        $addItem->item_costPrice = $requests->cost;
        $addItem->item_subcostPrice = $requests->subcost;
        $addItem->item_sellingPrice = $requests->selling_price;
        $addItem->save();

        return redirect()->back();

      }
      public function listOfDistributor(){
        try{
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
          $distributors = Distributor::where('typeOfUser', '=', 2)->paginate(10);
          return view('clerk.listOfDistributor')->with('distributors',$distributors)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
        }
        catch(DecryptException $e){
          echo $e;
        }
      }
      public function searchDistributor(Request $requests){
        try{
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
          $keyword = $requests->search;
          $searchDistributor = Distributor::where('name','LIKE','%'.$keyword.'%')->where('typeOfUser','=',2)->paginate(10);
          $title = "Results for distributors...";
          return view('clerk.listOfDistributor')->with('distributors',$searchDistributor)->with('title',$title)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
        }
        catch(DecryptException $e){
          echo $e;
        }
      }
      public function searchClerk(Request $requests){
        try{
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
          $keyword = $requests->search;
          $searchClerk = DB::table('users')->where('users.typeOfUser',1)->where('users.name','LIKE','%'.$keyword.'%')->groupBy('manage_privileges.clerk_id')
      ->join('manage_privileges', 'manage_privileges.clerk_id', '=', 'users.id')->orderBy('manage_privileges.clerk_id', 'asc')->paginate(10);
          $title = "Results for clerks...";
          return view('clerk.clerkHome')->with('clerks',$searchClerk)->with('title',$title)->with('password',$decryptedPassword)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
        }
        catch(DecryptException $e){
          echo $e;
        }
      }
      public function listOfItems(){
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
        $categories = Category::all();
        $items = Items::paginate(10);
        return view('clerk.listOfItems')->with('items',$items)->with('categories',$categories)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
      }
      public function searchItems(Request $requests){
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
        $categories = Category::all();
        $keyword = $requests->search;
        $searchItems = Items::where('item_name','LIKE','%'.$keyword.'%')->paginate(10);
        $title = "Results for items...";
        return view('clerk.listOfItems')->with('items',$searchItems)->with('categories',$categories)->with('title',$title)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
      }
      public function filterbyCategory(Request $requests){
        $privileges = ManagePrivileges::where('clerk_id','=',Auth::user()->id)->get();
        $salesEncoding = 0;
        $accountRegistration = 0;
        $addClerk = 0;
        $useInventory = 0;
        $generateReport = 0;
        $categories = Category::all();
        foreach($privileges as $priv){
          $salesEncoding = $priv->sales_encoding;
          $accountRegistration = $priv->account_registration;
          $addClerk = $priv->add_clerk;
          $useInventory = $priv->use_inventory;
          $generateReport = $priv->generate_report;
        }
        $category = $requests->cat;
        $cat = Category::where('id','=',$category)->first();
        $title = "Results for ".$cat->category_name;
        $items = Items::where('item_category', '=', $category)->paginate(10);
        return view('clerk.listOfItems')->with('items',$items)->with('title',$title)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport)->with('categories',$categories);
      }
      public function filterbySubCategory(Request $requests){
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
        $categories = Category::all();
        $category = $requests->cat;
        $sub_category = $requests->sub;
        $cat = Category::where('id','=',$category)->first();
        $sub_cat = SubCategory::where('id','=',$sub_category)->first();
        $title = "Results for ".$cat->category_name." - ".$sub_cat->subcategory_name;
        $items = Items::where('item_sub_category', '=', $sub_category)->where('item_category', '=', $category)->paginate(10);
        return view('clerk.listOfItems')->with('items',$items)->with('categories',$categories)->with('title',$title)->with('se',$salesEncoding)->with('ar',$accountRegistration)->with('ac',$addClerk)->with('ui',$useInventory)->with('gr',$generateReport);
      }
      public function selectSubCategory(){
        $id = Input::get('id');
        $sub_categories = SubCategory::where('category_id','=',$id)->get();
        return $sub_categories;
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
      public function removeSales_Item(Request $requests){
         $id = $requests->id;
         $temp_id = $requests->temp_id;
         $removeTemporarySaleItem = TemporarySalesDetails::where('temporary_sales_details_id','=',$id)->delete();
         $selectTemporarySales = TemporarySalesDetails::where('id','=',$temp_id)->get();
         if(count($selectTemporarySales) == 0){
           $removeTemporarySaleItem = TemporarySales::where('id','=',$temp_id)->delete();
         }
         return redirect('sales_viewing');
       }
       public function removeReceivings_Item(Request $requests){
         $id = $requests->id;
         $temp_id = $requests->temp_id;
         $removeTemporaryReceivingItem = TemporaryReceivingsDetails::where('temporary_receivings_details_id','=',$id)->delete();
         $selectTemporaryReceivings = TemporaryReceivingsDetails::where('id','=',$temp_id)->get();
         if(count($selectTemporaryReceivings) == 0){
           $removeTemporaryReceiving = TemporaryReceivings::where('id','=',$temp_id)->delete();
         }
         return redirect('receivings_viewing');
       }
}
