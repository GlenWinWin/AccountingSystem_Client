@extends('layouts.mylayout')

@section('title')
	@if(isset($title))
		{{$title}}
	@else
	List of Clerks
	@endif
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">
		@if(isset($title))
			{{$title}}
		@else
		List of Clerks
		@endif
	</h1></center>
<hr>
	<input type="button" name="name" value="Add Clerk" class="btn btn-primary btn-md open-modal-addClerk">
	<input type="button" name="name" value="Manage Priviliges" class="btn btn-primary btn-md">
	<input type="button" name="name" value="Delete" class="btn btn-primary btn-md">
	<div class="search">
		{!! Form::open(array('action' => 'AdminController@searchClerk' , 'method' => 'post'))!!}
	<input type="text" name="search" placeholder="Search...">
	<input type="submit" name="name" value="Search" class="btn btn-primary btn-md">
		{!! Form::close()!!}
	</div>
	<div class="table-responsive">
	<table class="table" id="tab1">
		<thead class="thead">
			<tr >
				<th><input type="checkbox" name="name" value="" name="checkAll" id="checkAll"></th>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Address</th>
				<th>Username</th>
				<th>Password</th>
				<th>Delete</th>
				<th>Manage Priviliges</th>
			</tr>
		</thead>
		<tbody>
			@foreach($clerks as $clerkss)
			<tr>
				<td><input type="checkbox" name="name" value="" id="checkone"></td>
				<th scope="row">{{$clerkss->fname}} {{$clerkss->lname}}</th>
				<td>{{$clerkss->contact}}</td>
				<td>{{$clerkss->email}}</td>
				<td>{{$clerkss->address}}</td>
				<td>{{$clerkss->username}}</td>
				<td>    <input type="button" class="btn btn-primary btn-sm open-modal-password" value="Change Password"></td>
				<td>    <input type="button" class="btn btn-sm btn-primary open-modal-delete" value="Delete"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-priviliges" value="Manage Privileges"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	<center>
		<ul class="pagination pagination-color">
			<li><a href="#"><<</a></li>
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
							<input type="password1" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline">	</center>
								<small id="passwordHelpInline" class="text-muted">
								</small>
								</form>
							</div>

							<div class="form-group">
							 <form class="form-inline">
								 	<center>
								<label for="inputPassword4">Admin Password</label>
								<br>
								<input type="password2" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline">	</center>
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
<!--  Modal Change Priviliges-->
<div id="myModal-priviliges" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Check the privileges you will allow:</h4>
						</div>


		 <div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox"/>Sales Encoding</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox"/>Account Registration</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox"/>Add Clerk</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox"/>Use Inventory</label>
									</div>
								</div>
							</div>
						</div>

		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox"/>Generate Reports</label>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
		 <button type="button" class="btn btn-primary">Save changes</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
		</div>
</div>
<!--  modal priviliges-->
<!--  Modal Add Clerks-->
<div id="myModal-addClerk" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add Clerk</h4>
						</div>

						<div class="modal-body">
								<div class="form-group">
									{!! Form::open(array('action' => 'AdminController@addClerkProcess' , 'method' => 'post' , 'id' => 'formQuestion'))!!}
											<input type="text" name="fname" placeholder="First Name" required=""><br>
											<input type="text" name="lname" placeholder="Last Name" required=""><br>
											<input type="text" name="contact" placeholder="Contact Number" required=""><br>
											<input type="email" name="email" placeholder="Email Address" required=""><br>
											<textarea name="address" placeholder="Address here..." rows="8" cols="40" required=""></textarea><br>
											<button>Add Clerk</button>
									{!! Form::close()!!}
								</div>
						</div>
						<div class="modal-footer">
		 <button type="button" class="btn btn-primary">Submit</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
		</div>
</div>
<!--  modal add clerk-->

  <!-- Modal delete -->
	<!-- Modal HTML -->
	<div id="myModal-delete" class="modal fade">
			<div class="modal-dialog modal-sm">
					<div class="modal-content">
							<div class="modal-header" style="color:#b3cccc";>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Are you sure you want to delete?</h4>
							</div>


							<div class="modal-footer">
			 <button type="button" class="btn btn-primary">Yes</button>
			 <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
							</div>
					</div>
			</div>
	</div>
	<!-- Modal Delete -->
@stop
