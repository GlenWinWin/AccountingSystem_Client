@extends('layouts.myDistributorLayout')
@section('title')
  Priviliges Bonus
@stop

@section('body-content')
    <div class="col-lg-9">
     <center>
       <div class="form-title-row">
           <h1>Priviliges Bonus</h1>
           <hr>
       </div>
     </center>
     <div class="alert alert-info alert-small">
           <a class="panel-close close" data-dismiss="alert">×</a>
           <i class="fa fa-gift"></i>
         <strong>Current Priviliges</strong> <br>
         You don't have any priviliges yet. Please require all the requirements to enjoy the priviliges!
         </div>
         <center>
           <div>
               <div class="checkout-wrap col-xs-12">
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
           </div>

       </center>
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
           <th scope="row" id="totalSalesMoney"></th>
           <th>{{ Auth::user()->totalPersonalSales  >= 300000 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @elseif(Auth::user()->channelPosition == 2)
         <tr>
           <td>Personal Sales</td>
           <th scope="row" id="totalSalesMoney"></th>
           <th>{{ Auth::user()->totalPersonalSales  >= 500000 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @elseif(Auth::user()->channelPosition == 3)
         <tr>
           <td>Personal Sales</td>
           <th scope="row" id="totalSalesMoney"></th>
           <th>{{ Auth::user()->totalPersonalSales  >= 1000000 ? 'Done' : 'Not Yet'}}</th>
         </tr>
         @endif
       </tbody>
     </table>
     </div>
    </div>
  @stop
