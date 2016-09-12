@extends('layouts.myDistributorLayout')
@section('title')
Genealogy
@stop

@section('body-content')
  <div class="col-lg-9">
    <center>
      <div class="form-title-row">
          <h1>Genealogy</h1>
          <hr>
      </div>
    </center>
    <center>
      <div class="col-xs-12 genealogy-main">
        <img src="{{ Auth::user()->profile_path }}" alt="" onclick="viewOtherGenealogy()"/>
        <div class="vertical_line"></div>
        <hr class="hr-genealogy" style="margin-bottom:0px;">
      </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-left:22px;"></i>
          <br>
          <img src="{{$image1}}" alt="" onclick="viewOtherGenealogy()"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true"></i>
          <br>
          <img src="{{$image2}}" alt="" onclick="viewOtherGenealogy()"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:5px;"></i>
          <br>
          <img src="{{$image3}}" alt="" onclick="viewOtherGenealogy()"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true"></i>
          <br>
          <img src="{{$image4}}" alt="" onclick="viewOtherGenealogy()"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:33px;"></i>
          <br>
          <img src="{{$image5}}" alt="" onclick="viewOtherGenealogy()"/>
        </div>
    </center>
    <div class="table-responsive" style="padding-top:20px;">
      @if(count($downlines) > 0)
    <table class="table" id="tab1">
      <thead class="thead">
        <tr>
          <th>Distributor ID</th>
          <th>Name</th>
          <th>Email</th>
          <th>Downlines</th>
        </tr>
      </thead>
      <tbody>
        @foreach($downlines as $user)
        <tr>
          <th scope="row">{{$user->userID}}</th>
          <td>{{$user->name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->connectCounter}}</td>
        </tr>
        @endforeach
      </tbody>
    </table>
    @endif
    </div>
    <center>

    </center>

  </div>
  </div>

@stop
