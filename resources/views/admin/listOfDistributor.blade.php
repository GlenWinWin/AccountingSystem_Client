	@extends('layouts.mylayout')

	@section('title')
	@if(isset($title))
		{{$title}}
	@else
	List of Channels
	@endif
	@stop

	@section('body-content')
	<div class="col-lg-9">
		<center><h1 style="padding-bottom:20px;">
			@if(isset($title))
			{{$title}}
			@else
			List of Channels
			@endif</h1></center>
		<hr>
		<div class="dropdown col-lg-8 col-md-8 col-sm-8" >
		<input type="button" name="name" value="Delete" onclick="doMultipleSelectionOfIdsDelete()" class="btn btn-primary btn-md open-modal-deleteMultipleUsers">
	</div>
		<div class="col-lg-3 col-md-3 col-sm-4 search-small">
			{!! Form::open(array('action' => 'AdminController@searchDistributor' , 'method' => 'get'))!!}
			<input type="text" name="search" required="" placeholder="Search..." class="form-control" style="width:70%;display:inline;">
	 	<input type="submit" value="Search" class="btn btn-primary btn-md" style="width:28%">
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
					<td><input type="checkbox" name="specific_ids" value="{{$distributorss->id}}" id="checkone"></td>
					<th scope="row">{{$distributorss->fname}} {{$distributorss->lname}}</th>
					<td>{{$distributorss->contact}}</td>
					<td>{{$distributorss->email}}</td>
					<td>{{$distributorss->address}}</td>
					<td>PHP {{$distributorss->totalSales}}</td>
					<td>{{$distributorss->username}}</td>
	        <td><input type="button" class="btn btn-primary btn-sm open-modal-password" onclick="delete_Clerk_Distributor_Item({{$distributorss->id}})" value="Change Password"></td>
					<td><input type="button" class="btn btn-sm btn-primary open-modal-delete" onclick="delete_Clerk_Distributor_Item({{$distributorss->id}})" value="Delete"></td>
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
							<input type="hidden" name="the_id" id="specific_id">
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
	            <h4 class="modal-title">Are you sure you want to delete this channels?</h4>
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
