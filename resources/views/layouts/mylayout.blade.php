<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
         <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
    	<div class="navbar-header">
    		<a id="menu-toggle" href="#" class="navbar-toggle">
    				<span class="sr-only">Toggle navigation</span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    		</a>
    			<a class="navbar-brand" href="list_clerk">
    				logo
    			</a>
    		</div>
    		<div id="navbar" class="navbar-collapse collapse ">
    			<ul class="nav navbar-nav navbar-right">
    				<li class="dropdown">
    											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
    											<ul class="dropdown-menu">
    												<li><a href="edit_profile">Edit Profile</a></li>
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
    				<img src="{{ Auth::user()->profile_path }}" class="img-responsive" alt="">
    			</div>
    			<div class="profile-usertitle">
    				<div class="profile-usertitle-name">
    					Administrator
    				</div>
    			</div>
    		<ul class="nav">
    			<li>
    				<a href="list_clerk" >
    				<i class="glyphicon glyphicon-user"></i>
    				Clerks </a>
    			</li>
    			<li >
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
    @yield('body-content')
  </body>
</html>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/sidebar.js"></script>
  <script src="assets/js/myUtilities.js"></script>

  <!--  modal-->
	<script type="text/javascript">
	$(document).ready(function(){
    //this method is for disabling and enabling button in change password modal
    var pword = document.getElementById("inputPassword").value;
    var repeat_pword = document.getElementById("inputPasswordRepeat").value;
    var admin_pword = document.getElementById("inputPasswordAdmin").value;

    if((pword == null || pword == "") && (repeat_pword == null || repeat_pword == "") && (admin_pword == null || admin_pword == "")){
    		document.getElementById('changePasswordBtn').disabled = true;
    }

    //this method is for disabling and enabling button in search
    var search = document.getElementById("searchField1").value;

    if(search == null || search == ""){
    		document.getElementById('searchButton1').disabled = true;
    }

    //modal for changing password
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
		$('.open-modal-addClerk').click(function(){
			$('#myModal-addClerk').modal('show');
		});
	    $("#myModal-addClerk").on('hidden.bs.modal', function(){
			<!--alert("Modal window has been completely closed.");-->
		});
	});
	</script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('.open-modal-priviliges').click(function(){
			$('#myModal-priviliges').modal('show');
		});
	    $("#myModal-priviliges").on('hidden.bs.modal', function(){
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
  <!--  modal-->
  <!-- active-sidebar -->
<script type="text/javascript">
  var url = window.location;

  $('ul.nav a[href="'+url+'"]').parent().addClass('active-sidebar');
  $('ul.nav a').filter(function(){
    return this.href == url;
  }).parent().addClass('active-sidebar');
</script>
<!-- checkall -->
<script type="text/javascript">
$("#tab1 #checkAll").click(function () {
  if ($("#tab1 #checkAll").is(':checked')) {
      $("#tab1 input[type=checkbox]").each(function () {
          $(this).prop("checked", true);
      });

  }
  else {
      $("#tab1 input[type=checkbox]").each(function () {
          $(this).prop("checked", false);
      });
  }
});
</script>
<script type="text/javascript">
$("#tab1 #checkone").click(function () {
  if ($("#tab1 #checkone").is(':checked')) {
      $("#tab1 #checkAll").each(function () {
          $(this).prop("checked", false);
      });

  }
  else {
      $("#tab1 #checkAll").each(function () {
          $(this).prop("checked", false);
      });
  }
});
</script>
<!-- check all -->
