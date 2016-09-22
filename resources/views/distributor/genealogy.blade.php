@extends('layouts.myDistributorLayout')
@section('title')
Genealogy
@stop

@section('body-content')
@if(isset($promoted))
<input type="hidden" value="{{$promoted}}" id="promotion">
@endif
  <div class="col-lg-9">
    <center>
      <div class="form-title-row">
          <h1>Genealogy</h1>
          <hr>
      </div>
    </center>
    <center>
      <div class="col-xs-12 genealogy-main">
        <img src="{{ isset($profile) ? $profile : Auth::user()->profile_path }}" alt="" onclick="viewOtherGenealogy({{ Auth::user()->id }})"/>
        <div class="vertical_line"></div>
        <hr class="hr-genealogy" style="margin-bottom:0px;">
      </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-left:22px;"></i>
          <br>
          <img src="{{$image1}}" alt="" onclick="viewOtherGenealogy({{ $image1ID }})"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true"></i>
          <br>
          <img src="{{$image2}}" alt="" onclick="viewOtherGenealogy({{ $image2ID }})"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:5px;"></i>
          <br>
          <img src="{{$image3}}" alt="" onclick="viewOtherGenealogy({{ $image3ID }})"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true"></i>
          <br>
          <img src="{{$image4}}" alt="" onclick="viewOtherGenealogy({{ $image4ID }})"/>
        </div>
        <div class="col-xs-15">
          <i class="fa fa-arrow-down" aria-hidden="true" style="margin-right:33px;"></i>
          <br>
          <img src="{{$image5}}" alt="" onclick="viewOtherGenealogy({{ $image5ID }})"/>
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
  {!! Form::open(array('action' => 'DistributorController@viewOtherGenealogy' , 'method' => 'post' , 'id' => 'formForOtherGenealogy'))!!}
  <input type="hidden" name="distributorID" id="specific_id">
  {!! Form::close()!!}
  <div class="modal fade alert-modal" id="noDistributor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog alert-modal-dialog">
      <div class="modal-content" style="padding:50px;">
          <center>
            <img src="assets/images/x.png" alt="" style="height:150px;padding-bottom:20px;"/>
            <h4 class="modal-title" id="myModalLabel"><b>No Distributor</b></h4></center>
          <center>  <p style="font-size:18px">There's no current distributor for this field</p>  </center>
            <center><button type="button" class="btn btn-primary btn-md edit-btn" data-dismiss="modal" style="padding-left:30px;padding-right:30px;">OK</button>  </center>
      </div>
    </div>
  </div>
  <div class="modal fade alert-modal" id="promotedDistributor" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog alert-modal-dialog">
      <div class="modal-content" style="padding:50px;">
          <center>
            <img src="assets/images/check.png" alt="" style="height:150px;padding-bottom:20px;"/>
            <h4 class="modal-title" id="myModalLabel"><b>Congratulations!</b></h4></center>
          <center>  <p style="font-size:18px" id="promotion_message"></p>  </center>
            <center><a href="genealogy" type="button" class="btn btn-primary btn-md edit-btn" style="padding-left:30px;padding-right:30px;">OK</a>  </center>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
@stop
@section('javascript_part')
<script type="text/javascript">
  $(document).ready(function(){
    var promotion = document.getElementById("promotion").value;
    if(promotion != '' && promotion != null){
      document.getElementById("promotion_message").innerHTML = promotion;
      $("#promotedDistributor").modal();
    }
  });
</script>
@stop
