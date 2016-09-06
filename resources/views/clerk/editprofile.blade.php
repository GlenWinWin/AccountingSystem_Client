@extends('layouts.myClerkLayout')

@section('title')
  Edit Profile
@stop

@section('body-content')
<div class="col-lg-9">
  <center>
    <div class="form-title-row">
        <h1>Edit Profile</h1>
        <hr>
    </div>
    <form method="post" action="{{ URL::to('bagong_dp') }}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="{{ Auth::user()->profile_path }}" class="edit-image" alt="avatar">
        <h6>Upload a different photo</h6>
        <center><input type="file" name="new_dp" class="text-center upload"></center>
      </div>
    </div>
  </center>
<div class="col-md-8 col-sm-6 col-xs-12">
  <div class="alert alert-info alert-small">
        <a class="panel-close close" data-dismiss="alert">×</a>
        <i class="glyphicon glyphicon-user"></i>
      Update your <strong>Personal Profile</strong> here.
      </div>
<h2>Personal Info</h2>
<center>
  <div class="form-group">
           <label class="col-lg-3 control-label">First name:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text" required="" name="fname" value="{{Auth::user()->fname}}" onkeydown="return alphaOnly(event);">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Last name:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text" required="" name="lname" value="{{Auth::user()->lname}}" onkeydown="return alphaOnly(event);">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Contact Number:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text" name="contact" required="" pattern="[0][9][0-9]{9}" title="Valid is 09482468123" maxlength="11" value="{{Auth::user()->contact}}">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Address:</label>
           <div class="col-lg-9">
             <input class="form-control" name="address" type="text" value="{{Auth::user()->address}}">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Email Address:</label>
           <div class="col-lg-9">
             <input class="form-control" name="email" type="email" required="" value="{{Auth::user()->email}}">
           </div>
  </div>
  <div class="form-group">
            <input type="hidden" id="hiddenPassword" value="{{$password}}">
           <label class="col-lg-3 control-label">Old Password</label>
           <div class="col-lg-9">
             <input class="form-control" name="old_password" id="passwordField" type="password" oninput="checkOldPasswordInput(this);">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">New Password</label>
           <div class="col-lg-9">
             <input class="form-control" name="new_password" id="newPasswordField" type="password" oninput="InvalidMsg(this);">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Confirm Password</label>
           <div class="col-lg-9">
             <input class="form-control" name="confirm_password" oninvalid="InvalidMsg(this);" id="confirmPasswordField" type="password" oninput="InvalidMsg(this);">
           </div>
  </div>

<div class="form-row" style="margin-bottom:20px;">
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
