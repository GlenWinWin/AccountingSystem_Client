@extends('layouts.myClerkLayout')

@section('title')
	Sales
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">

		Sales

	</h1></center>
<hr>


	<div class=" col-lg-8">
		<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12" >
			<div class="checkbox" >
	  <label class="checkbox1"><input type="checkbox" id="newDistributor" value="0" onclick="changeValue()">New Distributor?</label>
		</div>
		</div>
		<div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 distributor-sales">
			<div class="checkbox" id="divNewDistributor">
		<label style="padding-left:0px;">Distributor ID: &emsp;<input type="text" name="name" oninput="copyValueToHiddenFields()" class="form-control checkbox2" id="inputDistributorID" style="display:inline;" required=""></label>
		</div>
		</div>
		<div style="float:none;text-align:center;">

      {!! Form::open(array('action' => 'ClerkController@addItemtoSales' , 'method' => 'post' , 'id' => 'formAddItemtoSales'))!!}
			<input type="text" name="itemName" required="" id="searchitem" placeholder="Search items..." class="form-control" style="width:70%;margin-bottom: 0px;display:inline;">
			<input type="hidden" name="hiddenID" value="{{$hiddenID}}">
			<input type="submit" onclick="" name="name" value="Add" class="btn btn-primary btn-md" style="width:25%;">
      {!! Form::close()!!}


		</div>
	<div class="table-responsive" style="margin-top: 5px;">
	<table class="table" id="tab1">
		<thead class="thead">
			<tr >
				<th>Cancel</th>
				<th>Item Name</th>
				<th>Price</th>
					<th>Quantity</th>
				<th>Sub Total</th>
			</tr>
		</thead>
		<tbody>
			<?php $counter=1;?>
      @foreach($temporary_sales as $sale)
			<input type="hidden" id="quantitySale" value="{{count($temporary_sales)}}">
			<tr>
				<td><input type="button" onclick="removeSaleItem({{$sale->temporary_sales_details_id}},{{$sale->id}})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalDeleteTemporarySales" style="padding:8px 12px;" value="Cancel"/></td>
				<td style="padding-top:15px">{{$sale->item_name}}</td>
				<td style="padding-top:15px">P{{$sale->item_costPrice}}</td>
				<td><input type="number" id="quantityField{{$counter}}" min="1" value="{{$sale->item_quantity}}" style="width:70px" onchange="updateQuantity({{$counter}},{{$sale->temporary_sales_details_id}})"></td>
				<input type="hidden" id="priceField{{$counter}}" value="{{$sale->item_costPrice}}">
				<td style="padding-top:15px;font-weight:bold;" id="subTotal{{$counter}}">P{{ $sale->item_costPrice * $sale->item_quantity }}</td>
			</tr>
			<?php $counter++;?>
      @endforeach
		</tbody>
	</table>
	</div>

		</div>
		<div class="col-lg-4 price" >
			<div class="table-responsive">
			<table class="table" id="tab1">
				<thead>
					<tr >
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Sub Total</th>
					</tr>
				</thead>
				<tbody>
								<?php $counter=1;?>
					<?php $totalSales = 0;?>
					@foreach($temporary_sales as $sale)
					<tr>
						<td>{{$sale->item_name}}</td>
						<td id="saleQuantity{{$counter}}">x {{$sale->item_quantity}}</td>
						<td id="saleSubTotal{{$counter}}">P {{ $sale->item_costPrice * $sale->item_quantity }}</td>
					</tr>
					<?php $totalSales += $sale->item_costPrice * $sale->item_quantity; ?>
					<?php $counter++;?>
					@endforeach
					<tr>
						<td style="font-weight:bold;font-size:15px;">Total</td>
						<td></td>
						<td id="totalSalesID">P {{$totalSales}}</td>
					</tr>
					<tr>
						{!! Form::open(array('action' => 'ClerkController@salesEncoding' , 'method' => 'post'))!!}
						<td></td>
						<td></td>
						<td>
							<input type="submit" onclick="return confirm('Are you sure you about the sales, this cannot be undone?')" class="btn btn-md btn-primary" style="padding:8px 12px;" id="btnSales" value="Submit">
							<input type="hidden" name="hiddenID" value="{{$hiddenID}}">
							<input type="hidden" name="referralID" id="idReferral">
							<input type="hidden" name="distributorID" id="hiddenDistributorID">
							<input type="hidden" name="totalSalesInput" id="totalSalesHiddenInput">
							<input type="hidden" name="checkIfSelectedNewDistributor" id="checkBoxValue" value="0">
						</td>
						{!! Form::close()!!}
					</tr>
				</tbody>
			</table>

			</div>

		</div>
</div>
<div id="myModalDeleteTemporarySales" class="modal fade" role="dialog">
		<div class="modal-dialog modal-sm">
				<div class="modal-content">
						<div class="modal-header" style="color:#b3cccc";>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Are you sure you want to remove this from the sales?</h4>
						</div>
						<div class="modal-footer">
							{!! Form::open(array('action' => 'ClerkController@removeSales_Item' , 'method' => 'get'))!!}
							<input type="hidden" name="id" id="temp_sales_id">
							<input type="hidden" name="temp_id" id="temp_id">
							 <button type="submit" class="btn btn-primary">Yes</button>
							 <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
		 					{!! Form::close()!!}
						</div>
				</div>
		</div>
</div>
@stop

