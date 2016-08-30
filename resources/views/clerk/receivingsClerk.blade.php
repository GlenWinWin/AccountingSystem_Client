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
      @foreach($temporary_receivings as $receiving)
			<tr>
				<td><a href="remove_temp_receiving_item?id={{$receiving->temporary_receivings_details_id}}&temp_id={{$receiving->id}}" class="btn btn-sm btn-primary " style="padding:8px 12px;">Cancel</a></td>
				<td style="padding-top:15px">{{$receiving->item_name}}</td>
				<td style="padding-top:15px">PHP. {{$receiving->item_costPrice}}</td>
				<td><input type="number" name="name" id="quantityField" min="1" value="{{$receiving->item_quantity}}" class="value" style="width:70px"></td>
        <td style="padding-top:15px;font-weight:bold;">{{ $receiving->item_costPrice * $receiving->item_quantity }}</td>
			</tr>
      @endforeach
		</tbody>
	</table>
	</div>
	{!! Form::close()!!}
		</div>
</div>
@stop
