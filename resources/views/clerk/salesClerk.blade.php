@extends('layouts.myClerklayout')

@section('title')

@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">

		Sales

	</h1></center>
<hr>


	<div class=" col-lg-8">

		<div class="search" style="float:none;">

      {!! Form::open(array('action' => 'ClerkController@searchItems' , 'method' => 'get'))!!}
			<input type="text" name="search" required="" id="searchitem" placeholder="Search...items" class="form-control" style="width:200px;margin-bottom: 0px;display:inline;" required="">
			<input type="submit" name="name" value="Add" class="btn btn-primary btn-md">
      {!! Form::close()!!}

		</div>
	<div class="table-responsive">
	<table class="table" id="tab1">
		<thead class="thead">
			<tr >
				<th>Cancel</th>
				<th>Item Name</th>
				<th>Price</th>
					<th>Quantity</th>
				<th>Sub Total</th>
			</tr>
		</thead>
		<tbody>

			<tr>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-delete" style="padding:8px 12px;" onclick="delete_Clerk_Distributor_Item()" value="Cancel"></td>
				<td style="padding-top:15px">Head Gear</td>
				<td style="padding-top:15px">PHP. 1,000,000,000.00</td>
				<td>X &emsp;<input type="number" name="name" value="" class="value" placeholder='0'  style="width:70px"></td>
        <td style="padding-top:15px;font-weight:bold;">PHP. 1,000,000,000.00</td>
			</tr>

		</tbody>
	</table>
	</div>

		</div>
		<div class="col-lg-4 price" >
			<div class="table-responsive">
			<table class="table" id="tab1">
				<thead>
					<tr >
						<th>Item Name</th>
						<th>Quantity</th>
						<th>Sub Total</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>Head Gears</td>
						<td>x1</td>
						<td>PHP. 5,000,000.00</td>
					</tr>
					<tr>
						<td>Head Gears</td>
						<td>x1</td>
						<td>PHP. 5,000,000.00</td>
					</tr>
					<tr>
						<td>Head Gears</td>
						<td>x1</td>
						<td>PHP. 5,000,000.00</td>
					</tr>
					<tr>
						<td>Head Gears</td>
						<td>x1</td>
						<td>PHP. 500,000.00</td>
					</tr>
					<tr>
						<td style="font-weight:bold;font-size:15px;">Total</td>
						<td></td>
						<td>PHP. 5,000,000.00</td>
					</tr>
					<tr>
						<td></td>
						<td></td>
						<td><input type="button" class="btn btn-md btn-primary" style="padding:8px 12px;" onclick="delete_Clerk_Distributor_Item()" value="Submit"></td>
					</tr>
				</tbody>
			</table>

			</div>

		</div>
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
