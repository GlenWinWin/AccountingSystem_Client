@extends('layouts.mylayout')

@section('title')
	List of Distributor
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">List of Distributor</h1></center>
	<input type="button" name="name" value="Delete" class="btn btn-primary btn-md">
	<div class="search">
	<input type="text" name="name" value="">
	<input type="button" name="name" value="Search" class="btn btn-primary btn-md">
	</div>
	<table class="table table-design">
		<thead class="thead">
			<tr>
				<th><input type="checkbox" name="name" value=""></th>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Address</th>
				<th>Username</th>
				<th>Password</th>
				<th>Delete</th>
				<th>Total Sales</th>
			</tr>
		</thead>
		<tbody>
      <tr>
				<td><input type="checkbox" name="name" value=""></td>
				<th scope="row">joyth</th>
				<td>joyth</td>
				<td>joyth@yahoo.com</td>
				<td>joyth</td>
				<td>joyth</td>
        <td>    <input type="button" class="btn btn-primary btn-sm open-modal-password" value="Change Password"></td>
				<td>    <input type="button" class="btn btn-sm btn-primary open-modal-delete" value="Delete"></td>
				<td>PHP. 12232,232.00</td>
			</tr>


		</tbody>
	</table>
	<center>
		<ul class="pagination pagination-color">
			<li><a href="#"><<</a></li>
			<li><a href="#">1</a></li>
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
		        <div class="modal-dialog">
		            <div class="modal-content">
		                <div class="modal-header" style="color:#b3cccc";>
					    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                <h4 class="modal-title">Fill-up the fields:</h4>
		                </div>

							<div class="form-group">
							 <form class="form-inline">
								<label for="inputPassword4">Password</label>
								<input type="password" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline">
								<small id="passwordHelpInline" class="text-muted">
								</small>
								</form>
							</div>

							<div class="form-group">
							 <form class="form-inline">
								<label for="inputPassword4">Repeat Password</label>
								<input type="password1" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline">
								<small id="passwordHelpInline" class="text-muted">
								</small>
								</form>
							</div>

							<div class="form-group">
							 <form class="form-inline">
								<label for="inputPassword4">Admin Password</label>
								<input type="password2" id="inputPassword4" class="form-control" aria-describedby="passwordHelpInline">
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
            <h4 class="modal-title">Are you sure you want to delete <&name>?</h4>
            </div>


            <div class="modal-footer">
     <button type="button" class="btn btn-primary">Yes</button>
     <button type="button" class="btn btn-primary">No</button>
            </div>
        </div>
    </div>
</div>
<!-- Modal Delete -->
  Home
@stop
@section('nav')
<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
<div class="container">
	<div class="navbar-header">
		<a id="menu-toggle" href="#" class="navbar-toggle">
				<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
		</a>
			<a class="navbar-brand" href="#">
				logo
			</a>
		</div>
		<div id="navbar" class="navbar-collapse collapse ">
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown">
											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
											<ul class="dropdown-menu">
												<li><a href="#">Edit Profile</a></li>
												<li><a href="logout" onclick=" return confirm('Are you sure you want to logout?')">Logout</a></li>
											</ul>
										</li>

			</ul>
		</div>
	</div>
</nav>
	<div class=" col-lg-3">

	<div id="sidebar-wrapper" class="sidebar-toggle">
			<div class="profile-userpic">
				<img src="assets/images/joyth.jpg" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					Administrator
				</div>
			</div>
		<ul class="nav">
			<li >
				<a href="list_clerk">
				<i class="glyphicon glyphicon-user"></i>
				Clerks </a>
			</li>
			<li class="active-sidebar">
				<a href="list_distributor">
				<i class="glyphicon glyphicon-user"></i>
			Distributors</a>
			</li>
			<li>
				<a href="list_items">
				<i class="glyphicon glyphicon-user"></i>
			Items</a>
			</li>


	</div>
</div>
@stop

@section('css')

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
     <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
@stop
@section('javascript')
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/sidebar.js"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.open-modal-password').click(function(){
      $('#myModal-password').modal('show');
    });
      $("#myModal-password").on('hidden.bs.modal', function(){
      <!--alert("Modal window has been completely closed.");-->
    });
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.open-modal-delete').click(function(){
      $('#myModal-delete').modal('show');
    });
      $("#myModal-delete").on('hidden.bs.modal', function(){
      <!--alert("Modal window has been completely closed.");-->
    });
  });
  </script>
@stop
