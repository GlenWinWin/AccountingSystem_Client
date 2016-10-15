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
		@if(Session::has('flash_message'))
		<input type="hidden" value="{{Session::get('flash_message')}}" id="newDistributor">
	 	@endif
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
					<th>Distributor Id</th>
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
					<td>{{$distributorss->userID}}</td>
					<td>{{$distributorss->contact}}</td>
					<td>{{$distributorss->email}}</td>
					<td>{{$distributorss->address}}</td>
					<td>P {{$distributorss->totalSales}}</td>
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

	<!-- Modal for Add Distributor-->
 	<div class="modal fade alert-modal" id="distributorAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
 		<div class="modal-dialog alert-modal-dialog">
 			<div class="modal-content" style="padding:50px;">
 					<center>
 						<img src="assets/images/check.png" alt="" style="height:150px;padding-bottom:20px;"/>
 						<h4 class="modal-title" id="myModalLabel"><b>New Distributor Added</b></h4></center>
 					<center>  <p style="font-size:18px">A new Distributor has been successfully added on the list. </p>  </center>
 						<center><button type="button" class="btn btn-primary btn-md edit-btn" data-dismiss="modal" style="padding-left:30px;padding-right:30px;">OK</button>  </center>
 			</div>
 			<!-- /.modal-content -->
 		</div>
 		<!-- /.modal-dialog -->
 	</div>
 	<!-- /.Modal for Add Distributor -->
	@stop
	@section('javascript_part')
	<script type="text/javascript">
	  $(document).ready(function(){
	    var newDistributor = document.getElementById("newDistributor").value;
	    if(newDistributor != '' || newDistributor != null){
	      $("#distributorAdd").modal();
	    }
	    //
	    // var newClerk = document.getElementById("newClerk").value;
	    // if(newClerk != '' || newClerk != null){
	    //   $("#clerkAdd").modal();
	    // }
	  });
	</script>
	@stop
