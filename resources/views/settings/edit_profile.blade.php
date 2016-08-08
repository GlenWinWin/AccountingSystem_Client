@extends('layouts.mylayout')
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
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="{{ Auth::user()->profile_path }}" class="edit-image" alt="avatar">
        <h6>Upload a different photo</h6>
        <center><input type="file" class="text-center upload"></center>
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
  {!! Form::open(array('action' => 'UserController@bagong_dp' , 'method' => 'post'))!!}
  <div class="form-group">
           <label class="col-lg-3 control-label">First name:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text" required="" name="fname" value="{{Auth::user()->fname}}">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Last name:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text" required="" name="lname" value="{{Auth::user()->lname}}">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Contact Number:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text" name="contact" required="" value="{{Auth::user()->contact}}">
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

<div class="form-row" style="margin-bottom:20px;">
      <center>
        <input type="submit" class="btn btn-primary btn-md edit-btn" value="Submit Form">
        <a href="back" class="btn btn-secondary btn-md edit-btn">Cancel</a>
      </center>
    </div>
  </div>
  {!! Form::close()!!}
</center>
</div>
@stop
