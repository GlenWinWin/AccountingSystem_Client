@extends('layouts.myDistributorLayout')
@section('title')
  Priviliges Bonus
@stop

@section('body-content')
    <div class="col-lg-9">
     <center>
       <div class="col-xs-12" style="margin-top:20px;">
       <div class="form-title-row col-lg-4">
           <h1 class="priviliges">Priviliges Bonus</h1>
       </div>
       <div class="checkout-wrap col-lg-8">
         <ul class="checkout-bar">
           @if(Auth::user()->monthCounter == 0)
            <li class="active"><a href="#get-started" data-toggle="tab">First Month </a>
            </li>
            <li class=""><a href="#about-you" data-toggle="tab">Second Month</a>
            </li>
            <li class=""><a href="#">Third Month</a>
            </li>
          @elseif(Auth::user()->monthCounter == 1)
            <li class="visited"><a href="#get-started" data-toggle="tab">First Month </a>
            </li>
            <li class="active"><a href="#about-you" data-toggle="tab">Second Month</a>
            </li>
            <li class=""><a href="#">Third Month</a>
            </li>
          @elseif(Auth::user()->monthCounter == 2)
          <li class="visited"><a href="#get-started" data-toggle="tab">First Month </a>
          </li>
          <li class="visited"><a href="#about-you" data-toggle="tab">Second Month</a>
          </li>
          <li class="active"><a href="#">Third Month</a>
          </li>
          @endif
      </ul>
       </div>
<div class="col-xs-12">
<hr>
</div>
              </div>

     </center>

     <div class="table-responsive " style="border: 0px solid #ddd;" >
       <div class="alert alert-info alert-small col-lg-12" style="margin-bottom:0px;">
             <a class="panel-close close" data-dismiss="alert">×</a>
             <i class="fa fa-gift"></i>
           <strong>Current Priviliges</strong> <br>


        <!--  Channel Builder-->
        <!-- <div class="col-md-12" >
           You don't have any priviliges yet. Please require all the requirements to enjoy the priviliges!
         </div> -->
           <!--  Channel Builder-->

           <!--  Channel Associate-->
          <!-- <div class="col-md-12" >
           <b> 3%</b> Rebates for Magenta Items<br>
           <b>1% </b>Sales Share for Every 20,000-Up Purchased of Channel Builder
        </div> -->
            <!--  Channel Associate-->

           <!--  Channel Manager-->
          <!-- <div class="col-md-6" >
           <b> 5%</b> Rebates for Magenta Items<br>
           <b>3%</b> Sales Share for Every 100,000-Up Purchased of Channel Associate
        </div>
            <div class="col-md-6" >
         <b>  1%</b> Sales share for every 20,000-Up Purchased of Channel Builder
            </div> -->
            <!--  Channel Manager-->

           <!--  Channel Director-->
          <div class="col-md-6" >
           <b>7%</b> Rebates for Magenta Items<br>
        <b> 5%</b> Sales Share for Every 200,000-Up Purchased of Channel Manager
        </div>
            <div class="col-md-6" >
        <b>  3%</b> Sales share for every 75,000-Up Purchased of Channel Associate <br>
        <b>  1% </b>Sales share for every 20,000-Up Purchased of Channel Builder
            </div>
            <!--  Channel Director-->

           </div>

      </div>
      <h2>Requirements</h2>
         <div class="table-responsive">
     <table class="table" id="tab1">
       <thead class="thead">
         <tr>
           <th>Requirements</th>
           <th>Status</th>
           <th>Remarks</th>
         </tr>
       </thead>
       <tbody>
         @if(Auth::user()->channelPosition == 1)
         <tr>
           <td>CB Promotion Choice</td>
           <th scope="row">CHOICE 1</th>
           <th>Done</th>
         </tr>
         @elseif(Auth::user()->channelPosition == 2)
         <tr>
           <td>Number of Direct CA</td>
           <th scope="row">{{$CA}}/5</th>
           <th>{{$CA == 5 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @elseif(Auth::user()->channelPosition == 3)
         <tr>
           <td>Number of Direct CM</td>
           <th scope="row">{{$CM}}/5</th>
           <th>{{$CM == 5 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @endif
         @if(Auth::user()->channelPosition == 1)
         <tr>
           <td>Personal Sales</td>
           <th scope="row" id="totalPersonalSales"></th>
           <th>{{ Auth::user()->totalPersonalSales  >= 300000 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @elseif(Auth::user()->channelPosition == 2)
         <tr>
           <td>Personal Sales</td>
           <th scope="row" id="totalPersonalSales"></th>
           <th>{{ Auth::user()->totalPersonalSales  >= 500000 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @elseif(Auth::user()->channelPosition == 3)
         <tr>
           <td>Personal Sales</td>
           <th scope="row" id="totalPersonalSales"></th>
           <th>{{ Auth::user()->totalPersonalSales  >= 1000000 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         <tr>
           <td>3 M Group Sales</td>
           <th scope="row" id="totalGroupSalesMoney"></th>
           <th>{{ Auth::user()->totalGroupSales  >= 3000000 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @endif
       </tbody>
     </table>
     </div>
     <h2>Channel Activity</h2>
        <div class="table-responsive" style="margin-bottom:20px;">
    <table class="table" id="tab1">
      <thead class="thead">
        <tr>
          <th>Channel Activity</th>
          <th>Status</th>
          <th>Remarks</th>
        </tr>
        </thead>
        <tr>
          <td>Group Sales</td>
          <th> PHP 1,000,000.00 / PHP 1,000,000.00</th>
          <th>Done</th>
        </tr>
        <tr>
          <td>Group Enlistment / Month</td>
          <th>5/5</th>
          <th>Done</th>
        </tr>
        <tr>
          <td>Corporate Channel Enlist</td>
          <th>3/3</th>
          <th>Done</th>
        </tr>

      <tbody>

      </tbody>
    </table>
    </div>
    </div>
  @stop
