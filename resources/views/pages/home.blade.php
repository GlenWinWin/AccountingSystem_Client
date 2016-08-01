@extends('layouts.mylayout')

@section('title')
	Home
@stop

@section('body-content')
  <a href="add_clerk" style="float:right;margin-right:10px;">Add Clerk</a>
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
					Joyce Ann Potestades
				</div>
				<div class="profile-usertitle-job">
					Channel Builder
				</div>
			</div>
		<ul class="nav">
			<li class="active">
				<a href="#">
				<i class="glyphicon glyphicon-home"></i>
				Genealogy </a>
			</li>
			<li>
				<a href="#">
				<i class="glyphicon glyphicon-user"></i>
			Transaction</a>
			</li>
			<li>
				<a href="#" target="_blank">
				<i class="glyphicon glyphicon-ok"></i>
				Privileges Bonus </a>
			</li>
			<li>
				<a href="#">
				<i class="glyphicon glyphicon-flag"></i>
				Chart </a>
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
