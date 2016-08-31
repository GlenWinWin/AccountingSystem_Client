@extends('layouts.myClerkLayout')

@section('title')
	@if(isset($title))
		{{$title}}
	@else
	List of Clerks
	@endif
@stop

@section('body-content')
<div class="col-lg-9">
  <center>
    <div class="form-title-row">
        <h1>Distributor Registration</h1>
        <hr>
    </div>
    <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="">

  </center>
  <center>
<div class="col-md-12 col-sm-12 col-xs-12">

  <div class="form-group">
           <label class="col-lg-4 control-label">First name:</label>
           <div class="col-lg-5">
             <input class="form-control" type="text" required="" name="fname" value="">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Last name:</label>
           <div class="col-lg-5">
             <input class="form-control" type="text" required="" name="lname" value="">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Contact Number:</label>
           <div class="col-lg-5">
             <input class="form-control" type="number" name="contact" required="" pattern="[0][9][0-9]{9}" title="Valid is 09358217701" maxlength="11" value="">
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
             <input class="form-control" name="email" type="email" required="" value="">
           </div>
  </div>
<div class="form-group col-lg-12"  style="margin-top:20px;">

</div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Transaction ID:</label>
           <div class="col-lg-4">

               <b>#123453434</b>

           </div>
  </div>
  <div class="col-lg-12">

  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Referral ID:</label>
           <div class="col-lg-4">

               <b>#123453434</b>

           </div>
  </div>

<div class="form-row col-lg-12" style="margin-bottom:20px;">
      <center>
        <input type="submit" class="btn btn-primary btn-md edit-btn" value="Submit Form">
        <a href="back" class="btn btn-secondary btn-md edit-btn">Cancel</a>
      </center>
    </div>
  </div>
</form>
</center>
</div>
@stop
