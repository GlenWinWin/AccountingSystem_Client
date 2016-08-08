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
	<input type="button" name="name" value="Manage Priviliges" onclick="doMultipleSelectionOfIdsManage()" class="btn btn-primary btn-md open-modal-managePrivilegesMultipleTimes">
	<input type="button" name="name" value="Delete" onclick="doMultipleSelectionOfIdsDelete()" class="btn btn-primary btn-md open-modal-deleteMultipleUsers">
	<div class="search">
		{!! Form::open(array('action' => 'AdminController@searchClerk' , 'method' => 'get'))!!}
		<input type="text" name="search" required="" placeholder="Search...">
		<input type="submit" value="Search" class="btn btn-primary btn-md">
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
				<td><input type="checkbox" name="specific_ids" value="{{$clerkss->id}}" id="checkone"></td>
				<th scope="row">{{$clerkss->fname}} {{$clerkss->lname}}</th>
				<td>{{$clerkss->contact}}</td>
				<td>{{$clerkss->email}}</td>
				<td>{{$clerkss->address}}</td>
				<td>{{$clerkss->username}}</td>
				<td><input type="button" class="btn btn-primary btn-sm open-modal-password" onclick="setClerkIdforChangePasswordAccount({{$clerkss->id}})" value="Change Password"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-delete" onclick="delete_Clerk_Distributor_Item({{$clerkss->id}})" value="Delete"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-priviliges" onclick="manage_privileges({{$clerkss->id}})" value="Manage Privileges"></td>
			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	<center>
		{{$clerks->links()}}
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
							<input type="password" id="inputPassword" name="pword" onkeyup="ableChangePasswordButton()" class="form-control" aria-describedby="passwordHelpInline"></center>
								 <center>
								<label for="inputPassword4">Repeat Password</label>
								<br>
							<input type="password" id="inputPasswordRepeat" name="new_password" onkeyup="ableChangePasswordButton()" class="form-control" aria-describedby="passwordHelpInline"></center>
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
								<input type="password" id="inputPasswordAdmin" onkeyup="ableChangePasswordButton()" name="admin_pword" class="form-control" aria-describedby="passwordHelpInline">	</center>
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
<!--  Modal Change Priviliges-->
<div id="myModal-priviliges" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Check the privileges you will allow:</h4>
						</div>
{!! Form::open(array('action' => 'AdminController@managePrivileges' , 'method' => 'post'))!!}
		<input type="hidden" name="clerkId" value="" id="clerkId">
		 <div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="sales_encoding" value="1"/>Sales Encoding</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="account_registration" value="1"/>Account Registration</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="add_clerk" value="1"/>Add Clerk</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="use_inventory" value="1"/>Use Inventory</label>
									</div>
								</div>
							</div>
						</div>

		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="generate_report" value="1"/>Generate Reports</label>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
		 <button type="submit" class="btn btn-primary">Save changes</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
						{!! Form::close()!!}
				</div>
		</div>
</div>
<!--  modal priviliges-->
<div id="myModal-multiplePrivileges" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Check the privileges you will allow to the selected users:</h4>
						</div>
						<center><h4 style="color:red" id="toManagePrivileges"><i><i></h4></center>
{!! Form::open(array('action' => 'AdminController@multiplemanagePrivileges' , 'method' => 'post'))!!}
		<input type="hidden" name="ids_to_be_manage" id="manageIdsPrivileges">
		 <div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="sales_encoding" value="1"/>Sales Encoding</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="account_registration" value="1"/>Account Registration</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="add_clerk" value="1"/>Add Clerk</label>
									</div>
								</div>
							</div>
						</div>


		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="use_inventory" value="1"/>Use Inventory</label>
									</div>
								</div>
							</div>
						</div>

		<div class="modal-body">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="generate_report" value="1"/>Generate Reports</label>
									</div>
								</div>
							</div>
						</div>

						<div class="modal-footer">
		 <button type="submit" id="btnManagePrivilegesMultiple" title="Make sure there are selected users" class="btn btn-primary">Save changes</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
						{!! Form::close()!!}
				</div>
		</div>
</div>
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
									{!! Form::open(array('action' => 'AdminController@addClerk' , 'method' => 'post' , 'id' => 'formQuestion'))!!}
											<input type="text" name="fname" placeholder="First Name" required=""><br>
											<input type="text" name="lname" placeholder="Last Name" required=""><br>
											<input type="text" name="contact" placeholder="Contact Number" required=""><br>
											<input type="email" name="email" placeholder="Email Address" required=""><br>
											<textarea name="address" placeholder="Address here..." rows="8" cols="40" required=""></textarea><br>
											<button class="btn btn-success">Add Clerk</button>
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
        {!! Form::open(array('action' => 'AdminController@removeClerk' , 'method' => 'post'))!!}
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
@stop
