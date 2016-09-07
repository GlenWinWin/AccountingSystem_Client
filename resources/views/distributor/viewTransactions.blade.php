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
        </tr>
      </thead>
      <tbody>
        @foreach($transactions as $transaction)
        <tr>
          <td>{{$transaction->created_at}}</td>
          <th scope="row">{{$transaction->transactID}}</th>
          <td>{{$transaction->distributor_id}}</td>
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
