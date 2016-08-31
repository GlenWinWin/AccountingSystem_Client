	@extends('layouts.myClerkLayout')

	@section('title')
	@if(isset($title))
		{{$title}}
	@else
	List of Distributors
	@endif
	@stop

	@section('body-content')
	<div class="col-lg-9">
		<center><h1 style="padding-bottom:20px;">
			@if(isset($title))
			{{$title}}
			@else
			List of Distributors
			@endif</h1></center>
		<hr>

		<div class="search" style="padding-bottom:20px;">
			{!! Form::open(array('action' => 'ClerkController@searchDistributor' , 'method' => 'get'))!!}
			<input type="text" name="search" required="" placeholder="Search...">
			<input type="submit" value="Search" class="btn btn-primary btn-md">
			{!! Form::close()!!}
		</div>
		<div class="table-responsive">
		<table class="table" id="tab1">
			<thead class="thead">
				<tr>
					<th>Name</th>
					<th>Contact</th>
					<th>Email</th>
					<th>Address</th>
					<th>Total Sales</th>
					<th>Username</th>

				</tr>
			</thead>
			<tbody>
				@foreach($distributors as $distributorss)
	      <tr>
					<th scope="row">{{$distributorss->fname}} {{$distributorss->lname}}</th>
					<td>{{$distributorss->contact}}</td>
					<td>{{$distributorss->email}}</td>
					<td>{{$distributorss->address}}</td>
					<td>PHP {{$distributorss->totalSales}}</td>
					<td>{{$distributorss->username}}</td>

				</tr>
				@endforeach
			</tbody>
		</table>
		</div>
		<center>
			{{$distributors->links()}}
		</center>

	</div>
	<!-- Modal delete -->
	<!-- Modal HTML -->
	<div id="myModal-delete" class="modal fade">
	    <div class="modal-dialog  modal-sm">
	        <div class="modal-content">
	            <div class="modal-header" style="color:#b3cccc";>
	      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	            <h4 class="modal-title">Are you sure you want to delete this distributor?</h4>
	            </div>
	            <div class="modal-footer">
								{!! Form::open(array('action' => 'AdminController@removeDistributor' , 'method' => 'post'))!!}
				        <input type="hidden" name="the_id" id="specific_id">
	     <button type="submit" class="btn btn-primary">Yes</button>
	     <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
			 {!! Form::close()!!}
	            </div>
	        </div>
	    </div>
	</div>
	@stop
