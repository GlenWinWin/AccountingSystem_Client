@extends('layouts.myClerkLayout')

@section('title')
	Home
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">
		List of Clerks

	</h1></center>
<hr>
	<input type="button" name="name" value="Add Clerk" class="btn btn-primary btn-md open-modal-addClerk">
	<div class="search">

		<input type="text" name="search" required="" placeholder="Search...">
		<input type="submit" value="Search" class="btn btn-primary btn-md">

	</div>
	<div class="table-responsive">
	<table class="table" id="tab1">
		<thead class="thead">
			<tr >
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Address</th>
				<th>Username</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<th scope="row">Name</th>
				<td>Name</td>
				<td>Name</td>
				<td>Name</td>
				<td>Name</td>

			</tr>

		</tbody>
	</table>
	</div>
	<center>

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
			<input type="password" id="inputPassword" style="width:70%" name="pword" onkeyup="ableChangePasswordButton()" class="form-control " aria-describedby="passwordHelpInline"></center>
				 <center>
				<label for="inputPassword4">Repeat Password</label>
				<br>
			<input type="password" id="inputPasswordRepeat" style="width:70%" name="new_password" onkeyup="ableChangePasswordButton()" class="form-control" aria-describedby="passwordHelpInline"></center>
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
				<input type="password" id="inputPasswordAdmin" style="width:70%" onkeyup="ableChangePasswordButton()" name="admin_pword" class="form-control" aria-describedby="passwordHelpInline">	</center>
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
<!--  Modal Add Clerks-->
<div id="myModal-addClerk" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add Clerk</h4>
						</div>
						<form action="" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="">
						<div class="col-lg-12">
                <center>
              <div class="col-lg-7" style="    padding-top: 12px;">
                  <img src="assets/images/user.png" class="edit-image" alt="avatar">
                    </div>
                  <div class="col-lg-5 upload-clerk">
                  <h6>Upload a different photo</h6>
                <input type="file" name="clerk_pic" class="text-center upload" name="profile_pic">
                  </div>
                  </center>
</div>
<div class="col-lg-12">

						<div class="modal-body">
							<div class="form-group">
                       <label class="col-lg-4 control-label">First name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="fname" required="">
                       </div>
              </div>
							<div class="form-group">
                       <label class="col-lg-4 control-label">Last name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="lname" required="">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Contact Number:</label>
											 <div class="col-lg-2" style="margin-top:5px">
                         <font size="4px">+63</font>
                       </div>
											 <div class="col-lg-4" style="margin-left:-55px">
                         <input class="form-control" type="text" placeholder="9358217701" id="contactField" name="contact" required="" pattern="[9][0-9]{9}" title="Valid is 9358217701" maxlength="10" style="font-size:18px">
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
                         <input class="form-control" type="email" name="email" required="">
                       </div>
              </div>
						</div>
            </div>
						<div class="modal-footer">

		 <button type="submit" class="btn btn-primary">Submit</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
			</form>
		</div>
</div>
<!--  modal add clerk-->

@stop
