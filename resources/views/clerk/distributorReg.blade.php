@extends('layouts.myClerkLayout')

@section('title')
	Add Distributor
@stop

@section('body-content')
<div class="col-lg-9">
  <center>
    <div class="form-title-row">
        <h1>Distributor Registration</h1>
        <hr>
    </div>
  </center>
  <center>
		{!! Form::open(array('action' => 'ClerkController@addDistributor' , 'method' => 'post'))!!}

<div class="col-md-12 col-sm-12 col-xs-12">

  <div class="form-group">
           <label class="col-lg-4 control-label">First name:</label>
           <div class="col-lg-5">
             <input class="form-control" type="text" required="" name="fname" onkeydown="return alphaOnly(event);">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Last name:</label>
           <div class="col-lg-5">
             <input class="form-control" type="text" required="" name="lname" onkeydown="return alphaOnly(event);">
           </div>
  </div>
	<div class="form-group">
					 <label class="col-lg-4 control-label">Contact Number:</label>
					 <div class="col-lg-2" style="margin-top:5px;margin-left:-50px">
						 <font size="4px">+63</font>
					 </div>
					 <div class="col-lg-4" style="margin-left:-75px">
						 <input class="form-control" type="text" id="contactField" name="contact" required="" pattern="[9][0-9]{9}" title="Valid is 9482468123" maxlength="10" style="font-size:18px">
					 </div>
	</div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Address:</label>
           <div class="col-lg-5">
             <input class="form-control" name="address" type="text" value="">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Email Address:</label>
           <div class="col-lg-5">
             <input class="form-control" name="email" type="email" required="">
           </div>
  </div>
<div class="form-group col-lg-12"  style="margin-top:20px;">

</div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Transaction ID:</label>
           <div class="col-lg-4">

               <b>{{$transID}}</b>
							 <input type="hidden" name="transactionID" value="{{$transID}}">

           </div>
  </div>
  <div class="col-lg-12">

  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Referral ID:</label>
           <div class="col-lg-4">

               <b>{{$referralID}}</b>
							 <input type="hidden" name="referralID" value="{{$referralID}}">
           </div>
  </div>

<div class="form-row col-lg-12" style="margin-bottom:20px;">
      <center>
        <input type="submit" class="btn btn-primary btn-md edit-btn" value="Submit Form">
      </center>
    </div>
  </div>
	{!! Form::close()!!}
</center>
</div>
@stop
