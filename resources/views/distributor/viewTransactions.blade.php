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
          <th>Details</th>
        </tr>
      </thead>
      <tbody>
        <?php $counter=1;?>
        @foreach($transactions as $transaction)
        <tr>
          <td>{{$transaction->created_at}}</td>
          <th scope="row">{{$transaction->transactID}}</th>
          <td>{{$transaction->distributor_id}}</td>
          <td><button type="button" value="{{$transaction->transactID}}" id="viewDetailTransaction{{$counter}}" class="btn btn-primary" data-toggle="modal" data-target="#myModalViewDetails" name="button">View</button></td>
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
  		<div class="modal-dialog modal-lg">
  				<div class="modal-content">
  						<div class="modal-header" style="color:#b3cccc";>
    			      <button type="button" class="close" data-dismiss="modal" aria-hidden="true" id="modalCancelUpper">&times;</button>
    						<h4 class="modal-title" id="modalTitle">Transaction Details</h4>
  						</div>
              <div class="modal-body" id="modalBody">
              <table class="table" id="tab1">
                <thead class="thead">
                  <tr>
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
  						<div class="modal-footer">
                <h3 id="totalSalesPerTransaction"></h3>
  							 <button type="button" class="btn btn-primary" data-dismiss="modal" id="modalCancel">Cancel</button>
  						</div>
  				</div>
  		</div>
  </div>
@stop
