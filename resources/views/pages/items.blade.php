@extends('layouts.mylayout')

@section('title')
	Home
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">List of Items</h1></center>
  <div class="dropdown">
             <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary" data-target="#" href="/page.html">
                 Category<span class="caret"></span>
             </a>
     		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
               <li class="dropdown-submenu">
                 <a tabindex="-1" href="#">Safety Equipments</a>
                 <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="#">Head</a></li>
                   <li><a href="#">Eye</a></li>
                   <li><a href="#">Eyewash</a></li>
                   <li><a href="#">Ear</a></li>
                   <li><a href="#">Respiratory</a></li>
                   <li><a href="#">Body</a></li>
                   <li><a href="#">Full</a></li>
                   <li><a href="#">Hand</a></li>
                   <li><a href="#">Safety Shoes</a></li>
                   <li><a href="#">Rescue</a></li>
                 </ul>
               </li>
             </ul>
         </div>
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
				<td><input type="button" name="name" value="Password" class="btn btn-primary btn-sm"></td>
				<td><input type="button" name="name" value="Delete" class="btn btn-primary btn-sm"></td>
				<td>PHP. 12232,232.00</td>
			</tr>
      <tr>
				<td><input type="checkbox" name="name" value=""></td>
				<th scope="row">joyth</th>
				<td>joyth</td>
				<td>joyth@yahoo.com</td>
				<td>joyth</td>
				<td>joyth</td>
				<td><input type="button" name="name" value="Password" class="btn btn-primary btn-sm"></td>
				<td><input type="button" name="name" value="Delete" class="btn btn-primary btn-sm"></td>
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
				<a href="home">
				<i class="glyphicon glyphicon-user"></i>
				Clerks </a>
			</li>
			<li >
				<a href="distributor">
				<i class="glyphicon glyphicon-user"></i>
			Distributors</a>
			</li>
			<li class="active-sidebar">
				<a href="items">
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
@stop
