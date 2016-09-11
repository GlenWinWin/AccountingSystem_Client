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
      <input type="hidden" id="countOfTransactions" value="{{count($transactions)}}">
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
        <?php $counter=1;?>
        @foreach($transactions as $transaction)
        <tr>
          <td>{{$transaction->created_at}}</td>
          <th scope="row">{{$transaction->transactID}}</th>
          <td>{{$transaction->distributor_id}}</td>
          <td><button type="button" value="{{$transaction->transactID}}" id="viewDetailTransaction{{$counter}}" class="btn btn-primary" data-toggle="modal" data-target="#myModalViewDetails" name="button">Details</button></td>
        </tr>
        <?php $counter++;?>
        @endforeach
      </tbody>
    </table>
      @endif
    </div>
    <center>

    </center>
  </div>
  <div id="myModalViewDetails" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modalCancelUpper">&times;</button>
            <center><h4 class="modal-title" id="titleDetailedTransaction"></h4></center>
            </div>
<div class="col-lg-12">

            <div class="modal-body" id="modalBody">
              <div class="table-responsive" style=" margin-top: 0px;">
              <table class="table" id="tab1">
                <thead>
                  <tr >
                    <th>Item Name</th>
                    <th>Quantity</th>
                    <th>Cost Price</th>
                    <th>Sub Total</th>
                  </tr>
                </thead>
                <tbody id="transactionDetails">
                </tbody>
              </table>
              </div>
            </div>
            </div>
            <div class="modal-footer">
             <button type="button" class="btn btn-default" data-dismiss="modal" id="modalCancel">Close</button>
            </div>
        </div>
    </div>
  </div>
@stop
