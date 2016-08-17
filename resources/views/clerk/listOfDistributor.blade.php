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
		<input type="button" name="name" value="Delete" onclick="doMultipleSelectionOfIdsDelete()" class="btn btn-primary btn-md open-modal-deleteMultipleUsers">
		<div class="search">
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
	<!-- Modal Password -->
	<div id="myModal-password" class="modal fade">
			<div class="modal-dialog modal-sm">
					<div class="modal-content">
							<div class="modal-header" style="color:#b3cccc";>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title">Fill-up the fields:</h4>
							</div>
				<div class="form-group">
							{!! Form::open(array('action' => 'AdminController@changePasswordAccount' , 'method' => 'post' , 'id' => 'changePasswordAccountForm'))!!}
							<input type="hidden" id="adminPassword" value="{{$password}}">
							<input type="hidden" name="specific_id" id="myClerkId">
					<center>
						<label for="inputPassword3">New Password</label>
					<br>
				<input type="password" id="inputPassword" name="pword" style="width:70%" onkeyup="ableChangePasswordButton()" class="form-control" aria-describedby="passwordHelpInline"></center>
					 <center>
					<label for="inputPassword4">Repeat Password</label>
					<br>
				<input type="password" id="inputPasswordRepeat" name="new_password" style="width:70%" onkeyup="ableChangePasswordButton()" class="form-control" aria-describedby="passwordHelpInline"></center>
					<small id="passwordHelpInline" class="text-muted">
						<center>
								<i>
									<h4 id="showErrorRepeat" style="color:red;">
									</h4>
								</i>
						</center>
					</small>
						<center>
					<label for="inputPassword4">Admin Password</label>
					<br>
					<input type="password" id="inputPasswordAdmin" onkeyup="ableChangePasswordButton()" style="width:70%" name="admin_pword" class="form-control" aria-describedby="passwordHelpInline">	</center>
					<small id="passwordHelpInline" class="text-muted">
						<center>
							<i>
								<h4 id="showErrorAdmin" style="color:red;">
								</h4>
							</i>
						</center>
					</small>
							<div class="modal-footer">
							<input type="button" onclick="validateChangePasswordForm()" id="changePasswordBtn" class="btn btn-primary" value="Save Changes">
							 <button class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
							{!! Form::close()!!}
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
	<div id="myModal-deleteMultiple" class="modal fade">
			<div class="modal-dialog modal-sm">
					<div class="modal-content">
							<div class="modal-header" style="color:#b3cccc";>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
							<h4 class="modal-title" id="toshowEnabledeleteMultipleUserButton"></h4>
							</div>


							<div class="modal-footer">
				{!! Form::open(array('action' => 'AdminController@removeMultipleUsers' , 'method' => 'post'))!!}
				<input type="hidden" name="ids_to_be_delete" id="idstoDelete">
			 <button type="submit" id="btnDeleteMultiple" class="btn btn-primary">Yes</button>
			 <button type="button" class="btn btn-primary" id="changeifHasSelected" data-dismiss="modal">No</button>
			 {!! Form::close()!!}

							</div>
					</div>
			</div>
	</div>
	<!-- Modal Delete -->
	  Home
	@stop
