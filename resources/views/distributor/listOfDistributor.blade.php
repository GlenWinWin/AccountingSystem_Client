@extends('layouts.mylayout')

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
	<input type="button" name="name" value="Delete" class="btn btn-primary btn-md">
	<div class="search">
		{!! Form::open(array('action' => 'AdminController@searchDistributor' , 'method' => 'post'))!!}
	<input type="text" name="search" placeholder="Search...">
	<input type="submit" name="name" value="Search" class="btn btn-primary btn-md">
		{!! Form::close()!!}
	</div>
	<div class="table-responsive">
	<table class="table" id="tab1">
		<thead class="thead">
			<tr>
				<th><input type="checkbox" value="" name="checkAll" id="checkAll"></th>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Address</th>
				<th>Total Sales</th>
				<th>Username</th>
				<th>Password</th>
				<th>Delete</th>

			</tr>
		</thead>
		<tbody>
			@foreach($distributors as $distributorss)
      <tr>
				<td><input type="checkbox" name="name" value="" id="checkone"></td>
				<th scope="row">{{$distributorss->fname}} {{$distributorss->lname}}</th>
				<td>{{$distributorss->contact}}</td>
				<td>{{$distributorss->email}}</td>
				<td>{{$distributorss->address}}</td>
				<td>PHP {{$distributorss->totalSales}}</td>
				<td>{{$distributorss->username}}</td>
        <td><input type="button" class="btn btn-primary btn-sm open-modal-password" value="Change Password"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-delete" onclick="delete_Clerk_Distributor_Item({{$distributorss->id}})" value="Delete"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	<center>
		<ul class="pagination pagination-color">
			<li ><a href="#"><<</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">>></a></li>
		</ul>
	</center>

</div>
<!-- Modal Password -->
<div id="myModal-password" class="modal fade">
		<div class="modal-dialog modal-sm">
				<div class="modal-content">
						<div class="modal-header" style="color:#b3cccc";>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Fill-up the fields:</h4>
						</div>

			<div class="form-group">
			 <form class="form-inline">

				<center>	<label for="inputPassword4">Password</label>
				<br>
			<input type="password" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline"></center>
				<small id="passwordHelpInline" class="text-muted">
				</small>
				</form>
			</div>

			<div class="form-group">
			 <form class="form-inline">
				 <center>
				<label for="inputPassword4">Repeat Password</label>
				<br>
			<input type="password" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline">	</center>
				<small id="passwordHelpInline" class="text-muted">
				</small>
				</form>
			</div>

			<div class="form-group">
			 <form class="form-inline">
					<center>
				<label for="inputPassword4">Admin Password</label>
				<br>
				<input type="password" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline">	</center>
				<small id="passwordHelpInline" class="text-muted">
				</small>
				</form>
			</div>


						<div class="modal-footer">
		 <button type="button" class="btn btn-primary">Save changes</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
		</div>
</div>
<!--  Modal Change Password-->
<!-- Modal delete -->
<!-- Modal HTML -->
<div id="myModal-delete" class="modal fade">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="color:#b3cccc";>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Are you sure you want to delete?</h4>
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
<!-- Modal Delete -->
  Home
@stop
