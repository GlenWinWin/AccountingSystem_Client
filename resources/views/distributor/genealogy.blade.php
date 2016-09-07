@extends('layouts.mylayout')
@section('title')
Genealogy
@stop

@section('body-content')
  <div class="col-lg-9">
    <center>
      <div class="col-xs-12 genealogy-main">
        <img src="assets/images/profile_pictures/joker.jpg" alt="" style="width:20%;padding-top:20px;"/>
        <div class="vertical_line"></div>
        <hr class="hr-genealogy" style="margin-bottom:0px;">
    </div>
        <div class="col-xs-15" >
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-left:22px;"></i>
          <img src="assets/images/profile_pictures/admin.png" alt="" style="width:100%;"/>
          </div>
          <div class="col-xs-15" >
            <i class="fa fa-arrow-down" aria-hidden="true"></i>
            <img src="assets/images/profile_pictures/prof.jpg" alt="" style="width:100%;"/>
            </div>
            <div class="col-xs-15">
              <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:5px;"></i>
              <img src="assets/images/user.png" alt="" style="width:100%;"/>
              </div>
              <div class="col-xs-15">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                <img src="assets/images/profile_pictures/admin.png" alt="" style="width:100%;"/>
                </div>
                <div class="col-xs-15">
                  <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:33px;"></i>
                  <img src="assets/images/user.png" alt="" style="width:100%;"/>
                  </div>
    </center>
  </div>

@stop
