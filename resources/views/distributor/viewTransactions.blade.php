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
    <table class="table" id="tab1">
      <thead class="thead">
        <tr>
          <th>Time and Date</th>
          <th>Transaction Code</th>
          <th>Distributor ID</th>

        </tr>
      </thead>
      <tbody>

        <tr>

          <td>121</td>
          <th scope="row">12121</th>
          <td>121</td>

        </tr>

      </tbody>
    </table>
    </div>
    <center>

    </center>

  </div>
  </div>

@stop
