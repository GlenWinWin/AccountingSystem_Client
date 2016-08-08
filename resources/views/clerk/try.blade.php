@extends('layouts.mylayout')

@section('title')

@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">

		List of Clerks

	</h1></center>
<hr>
	<input type="button" name="name" value="Add Clerk" class="btn btn-primary btn-md open-modal-addClerk">
	<input type="button" name="name" value="Manage Priviliges" onclick="deleteModify()" class="btn btn-primary btn-md">
	<input type="button" name="name" value="Delete" onclick="deleteModify()" class="btn btn-primary btn-md">
	<div class="search">

		<input type="text" name="search" required="" placeholder="Search...">
		<input type="submit" name="name" value="Search" class="btn btn-primary btn-md">

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

			<tr>
				<td><input type="checkbox" name="specific_ids[]" value="" id="checkone"></td>
				<th scope="row">ds</th>
				<td>dsds</td>
				<td>dsds</td>
        <td>dsds</td>
        <td>dsds</td>
				<td><input type="button" class="btn btn-primary btn-sm open-modal-password" onclick="setClerkIdforChangePasswordAccount()" value="Change Password"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-delete" onclick="delete_Clerk_Distributor_Item()" value="Delete"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-priviliges" onclick="manage_privileges()" value="Manage Privileges"></td>
			</tr>

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
										<input type="hidden" id="adminPassword" value="">
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

									</div>
		            </div>
		        </div>
		    </div>
<!--  Modal Change Password-->
<!--  Modal Change Priviliges-->
<div id="myModal-priviliges" class="modal fade">
		<div class="modal-dialog modal-sm">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Check the privileges you will allow:</h4>
						</div>

		<input type="hidden" name="clerkId" value="" id="clerkId">
		 <div class="">
								<div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="sales_encoding" value="1"/>Sales Encoding</label>
									</div>
								</div>

								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="account_registration" value="1"/>Account Registration</label>
									</div>
								</div>



								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="add_clerk" value="1"/>Add Clerk</label>
									</div>
								</div>



								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="use_inventory" value="1"/>Use Inventory</label>
									</div>
								</div>

								<div class="col-sm-offset-2 col-sm-10">
									<div class="checkbox">
										<label><input type="checkbox" name="generate_report" value="1"/>Generate Reports</label>
									</div>
								</div>
							</div>
						</div>
						<div style="padding: 15px;  text-align: right;">
		 <button type="submit" class="btn btn-primary">Save changes</button>
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
						{!! Form::open(array('action' => 'AdminController@addClerk' , 'method' => 'post' , 'id' => 'formQuestion'))!!}
            <div class="col-lg-12">
                <center>
              <div class="col-lg-7" style="    padding-top: 12px;">
                  <img src="assets/images/user.png" class="edit-image" alt="avatar">
                    </div>
                  <div class="col-lg-5 upload-clerk">
                  <h6>Upload a different photo</h6>
                <input type="file" class="text-center upload" name="profile_pic">
                  </div>
                  </center>
</div>
<div class="col-lg-12">

						<div class="modal-body">
							<div class="form-group">
                       <label class="col-lg-4 control-label">First name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="fname">
                       </div>
              </div>
							<div class="form-group">
                       <label class="col-lg-4 control-label">Last name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="lname">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Contact Number:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="contact">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Address:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="address">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Email Address:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="email" name="email">
                       </div>
              </div>
						</div>
            </div>
						<div class="modal-footer">

		 <button type="button" class="btn btn-primary">Submit</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
				{!! Form::close()!!}
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

        <input type="hidden" name="the_id" id="specific_id">
       <button type="submit" class="btn btn-primary">Yes</button>
			 <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>



        			</div>
					</div>
			</div>
	</div>
	<!-- Modal Delete -->
@stop
