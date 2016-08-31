@extends('layouts.myClerklayout')

@section('title')
	Receivings
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">

Receivings

	</h1></center>
<hr>


	<div class=" col-lg-12">

		<div class="col-lg-9 col-md-10 col-sm-10 col-xs-12" style="padding-left:0px;padding-right:0px;padding-bottom:5px;">

      {!! Form::open(array('action' => 'ClerkController@addItemtoReceivings' , 'method' => 'post' , 'id' => 'formAddItemtoSales'))!!}
			<input type="text" name="itemName" required="" id="searchitem" placeholder="Search..." class="form-control" style="width:74%;margin-bottom: 0px;display:inline;">
			<input type="hidden" name="hiddenID" value="{{$hiddenID}}">
			<input type="submit" onclick="" name="name" value="Add" class="btn btn-primary btn-md" style="width:24%;">
      {!! Form::close()!!}

		</div>
		{!! Form::open(array('action' => 'ClerkController@receivingsAdding' , 'method' => 'post' , 'id' => 'formAddItemtoSales'))!!}
    <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12 submit-center" style="float:right;padding-bottom:10px;padding-left:0px;">
			<input type="submit" onclick=" return confirm('Are you sure you about the receivings, this cannot be undone?')" class="btn btn-md btn-primary" style="padding:8px 12px;" value="Submit">
			<input type="hidden" name="hiddenID" value="{{$hiddenID}}">
    </div>
	<div class="table-responsive">
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
      @foreach($temporary_receivings as $receiving)
			<tr>
				<td><input type="button" onclick="removeReceivingItem({{$receiving->temporary_receivings_details_id}},{{$receiving->id}})" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModalDeleteTemporaryReceivings" style="padding:8px 12px;" value="Cancel"/></td>
				<td style="padding-top:15px">{{$receiving->item_name}}</td>
				<td style="padding-top:15px">PHP. {{$receiving->item_costPrice}}</td>
				<td><input type="number" name="name" id="quantityField{{$counter}}" min="1" value="{{$receiving->item_quantity}}" style="width:70px" onchange="updateQuantityReceivings({{$counter}},{{$receiving->temporary_receivings_details_id}})"></td>
				<input type="hidden" id="priceField{{$counter}}" value="{{$receiving->item_costPrice}}">
        <td style="padding-top:15px;font-weight:bold;" id="subTotal{{$counter}}">{{ $receiving->item_costPrice * $receiving->item_quantity }}</td>
			</tr>
			<?php $counter++;?>
      @endforeach
		</tbody>
	</table>
	</div>
	{!! Form::close()!!}
		</div>
</div>
<div id="myModalDeleteTemporaryReceivings" class="modal fade" role="dialog">
		<div class="modal-dialog  modal-sm">
				<div class="modal-content">
						<div class="modal-header" style="color:#b3cccc";>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Are you sure you want to remove this from the receivings?</h4>
						</div>
						<div class="modal-footer">
							{!! Form::open(array('action' => 'ClerkController@removeReceivings_Item' , 'method' => 'get'))!!}
							<input type="hidden" name="id" id="temp_receiving_id">
							<input type="hidden" name="temp_id" id="temp_id">
							 <button type="submit" class="btn btn-primary">Yes</button>
							 <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
		 					{!! Form::close()!!}
						</div>
				</div>
		</div>
</div>
@stop
