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
                 <li class="visited"><a href="#get-started" data-toggle="tab">First Month </a>
                 </li>
                 <li class="active"><a href="#about-you" data-toggle="tab">Second Month</a>
                 </li>
                 <li class=""><a href="#">Third Month</a>
                 </li>
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
        <tr>
          <td>Personal Sales</td>
          <th scope="row">PHP 300,000.00 / PHP 300,000.00</th>
          <th>Done</th>
        </tr>
        <tr>
          <td>New Channel Builder</td>
          <th scope="row">1 / 5</th>
          <th>Not Yet</th>
        </tr>
      </tbody>
    </table>
    </div>

  </div>
@stop
