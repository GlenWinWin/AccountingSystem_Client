@extends('layouts.myDistributorLayout')
@section('title')
Transactions
@stop

@section('body-content')
  <div class="col-lg-9">
    <center>
      <div class="form-title-row">
          <h1>Transactions</h1>
          <hr>
      </div>
    </center>
    <div class="table-responsive">
      @if(count($transactions))
    <table class="table" id="tab1">
      <thead class="thead">
        <tr>
          <th>Time and Date</th>
          <th>Transaction Code</th>
          <th>Distributor ID</th>
          <th>View Details</th>
        </tr>
      </thead>
      <tbody>
        @foreach($transactions as $transaction)
        <tr>
          <td>{{$transaction->created_at}}</td>
          <th scope="row">{{$transaction->transactID}}</th>
          <td>{{$transaction->distributor_id}}</td>
          <td>	<input type="button" name="name" value="Details" data-toggle="modal" data-target="#myModalAddClerk" class="btn btn-primary btn-md"></td>
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
  <div id="myModalAddClerk" class="modal fade" role="dialog">
  		<div class="modal-dialog">
  				<div class="modal-content">
  						<div class="modal-header">
  			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
  						<center><h4 class="modal-title">Detailed Transaction of 	TRANS-0000000001</h4></center>
  						</div>
  <div class="col-lg-12">

  						<div class="modal-body">
                <div class="table-responsive" style=" margin-top: 0px;">
          			<table class="table" id="tab1">
          				<thead>
          					<tr >
          						<th>Item Name</th>
          						<th>Quantity</th>
          						<th>Sub Total</th>
          					</tr>
          				</thead>
          				<tbody>

          					<tr>
          						<td>GIDEON SPECTACLES NON ADJUSTABLE - CLEAR</td>
          						<td id="saleQuantity">x</td>
          						<td id="saleSubTotal">PHP. 27.5</td>
          					</tr>
          					<tr>
          						<td style="font-weight:bold;font-size:15px;">Total</td>
          						<td></td>
          						<td id="totalSalesID">PHP 27.5</td>
          					</tr>
          					<tr>

          					</tr>
          				</tbody>
          			</table>

          			</div>
  						</div>
              </div>
  						<div class="modal-footer">


  						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
  						</div>
  				</div
  		</div>
  </div>
@stop
