@extends('layouts.mylayout')
@section('title')
Edit Profile
@stop
@section('body-content')
<div class="col-lg-9">
  <center>
<form class="form-labels-on-top" method="post" action="#">

    <div class="form-title-row">
        <h1>Edit Profile</h1>
        <hr>
    </div>
    <div class="col-md-4 col-sm-6 col-xs-12">
      <div class="text-center">
        <img src="assets/images/joyth.jpg" class="edit-image" alt="avatar">
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
  <div class="form-group">
           <label class="col-lg-3 control-label">First name:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Last name:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Contact Number:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Address:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-3 control-label">Email Address:</label>
           <div class="col-lg-9">
             <input class="form-control" type="text">
           </div>
  </div>

<div class="form-row" style="margin-bottom:20px;">
      <center>
        <button type="submit" class="btn btn-primary btn-md edit-btn">Submit Form</button>
        <button type="submit" class="btn btn-secondary btn-md edit-btn">Cancel</button>
      </center>
    </div>





  </div>
</form>
</center>
</div>
@stop
