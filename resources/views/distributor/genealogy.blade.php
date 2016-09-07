@extends('layouts.myDistributorLayout')
@section('title')
Genealogy
@stop

@section('body-content')
  <div class="col-lg-9">
    <center>
      <div class="col-xs-12 genealogy-main">
        <img src="{{ Auth::user()->profile_path }}" alt="" style="width:20%;padding-top:20px;"/>
        <div class="vertical_line"></div>
        <hr class="hr-genealogy" style="margin-bottom:0px;">
    </div>
        <div class="col-xs-15" >
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-left:22px;"></i>
          <img src="{{$image1}}" alt="" style="width:100%;"/>
          </div>
          <div class="col-xs-15" >
            <i class="fa fa-arrow-down" aria-hidden="true"></i>
            <img src="{{$image2}}" alt="" style="width:100%;"/>
            </div>
            <div class="col-xs-15">
              <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:5px;"></i>
              <img src="{{$image3}}" alt="" style="width:100%;"/>
              </div>
              <div class="col-xs-15">
                <i class="fa fa-arrow-down" aria-hidden="true"></i>
                <img src="{{$image4}}" alt="" style="width:100%;"/>
                </div>
                <div class="col-xs-15">
                  <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:33px;"></i>
                  <img src="{{$image5}}" alt="" style="width:100%;"/>
                  </div>
    </center>
    <div class="table-responsive" style="padding-top:20px;">
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

        <tr>
          <th scope="row">12345</th>
          <td>Jason Lopez</td>
          <td>jeysown@gmail.com</td>
          <td>2</td>
        </tr>

      </tbody>
    </table>
    </div>
    <center>

    </center>

  </div>
  </div>

@stop
