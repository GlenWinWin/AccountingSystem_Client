@extends('layouts.myClerklayout')

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
	  <label class="checkbox1"><input type="checkbox" value="">New Distributor?</label>
		</div>
		</div>
		<div class="col-lg-7 col-md-6 col-sm-6 col-xs-12 distributor-sales">
			<div class="checkbox" >
		<label style="padding-left:0px;">Distributor ID: &emsp;<input type="text" name="name" value="" class="form-control checkbox2" style="display:inline;"></label>
		</div>
		</div>
		<div style="float:none;text-align:center;">

      {!! Form::open(array('action' => 'ClerkController@addItemtoSales' , 'method' => 'post' , 'id' => 'formAddItemtoSales'))!!}
			<input type="text" name="itemName" required="" id="searchitem" placeholder="Search..." class="form-control" style="width:70%;margin-bottom: 0px;display:inline;">
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
			<tr>
				<td><input type="button" onclick="removeSaleItem({{$sale->temporary_sales_details_id}},{{$sale->id}})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalDeleteTemporarySales" style="padding:8px 12px;" value="Cancel"/></td>
				<td style="padding-top:15px">{{$sale->item_name}}</td>
				<td style="padding-top:15px">PHP. {{$sale->item_costPrice}}</td>
				<td><input type="number" id="quantityField{{$counter}}" min="1" value="{{$sale->item_quantity}}" class="value" style="width:70px" onchange="updateQuantity({{$counter}},{{$sale->temporary_sales_details_id}})"></td>
				<input type="hidden" id="priceField{{$counter}}" value="{{$sale->item_costPrice}}">
				<td style="padding-top:15px;font-weight:bold;" id="subTotal{{$counter}}">{{ $sale->item_costPrice * $sale->item_quantity }}</td>
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
						<td id="saleQuantity{{$counter}}">x{{$sale->item_quantity}}</td>
						<td id="saleSubTotal{{$counter}}">{{ $sale->item_costPrice * $sale->item_quantity }}</td>
					</tr>
					<?php $totalSales += $sale->item_costPrice * $sale->item_quantity; ?>
					<?php $counter++;?>
					@endforeach
					<tr>
						<td style="font-weight:bold;font-size:15px;">Total</td>
						<td></td>
						<td>PHP {{$totalSales}}</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td>
							{!! Form::open(array('action' => 'ClerkController@salesEncoding' , 'method' => 'post'))!!}
							<input type="submit" onclick=" return confirm('Are you sure you about the sales, this cannot be undone?')" class="btn btn-md btn-primary" style="padding:8px 12px;" value="Submit">
							<input type="hidden" name="hiddenID" value="{{$hiddenID}}">
							{!! Form::close()!!}
						</td>
					</tr>
				</tbody>
			</table>

			</div>

		</div>
</div>
<div id="myModalDeleteTemporarySales" class="modal fade" role="dialog">
		<div class="modal-dialog  modal-sm">
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
