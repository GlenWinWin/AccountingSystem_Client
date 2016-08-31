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
	@stop
