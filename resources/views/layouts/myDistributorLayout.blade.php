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
    											<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
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
    					{{ Auth::user()->name }}
    				</div>
            <div class="profile-usertitle-job">
    					Channel Builder
    				</div>
    			</div>
    		<ul class="nav">
    			<li>
    				<a href="genealogy">
    				<i class="fa fa-users"></i>
    				Genealogy </a>
    			</li>
    			<li >
    				<a href="view_transactions">
    				<i class="fa fa-line-chart"></i>
    			Transactions</a>
    			</li>
    			<li>
    				<a href="list_items">
    				<i class="fa fa-gift"></i>
    			Priviliges Bonus</a>
    			</li>
          <li>
    				<a href="list_items">
    				<i class="fa fa-info" style="font-size:20px;padding-right:5px;"></i>
    			Help</a>
    			</li>
          <li class="visible-xs visible-md visible-sm">
            <a href="edit_profile" >
            <i class="fa fa-pencil"></i>
          Edit Profile</a>
          </li>
          <li class="visible-xs visible-md visible-sm">
            <a href="logout" onclick=" return confirm('Are you sure you want to logout?')">
            <i class="fa fa-sign-out"></i>
          Log Out</a>
          </li>
          <br>
          <br>
          <br>
        </ul>
    	</div>
    </div>
    @yield('body-content')
  </body>
</html>
<script type="text/javascript" src="assets/js/jquery.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/sidebar.js"></script>
  <script src="assets/js/myUtilities.js"></script>
  <!-- active-sidebar -->
<script type="text/javascript">
  var url = window.location;

  $('ul.nav a[href="'+url+'"]').parent().addClass('active-sidebar');
  $('ul.nav a').filter(function(){
    return this.href == url;
  }).parent().addClass('active-sidebar');
</script>
<script type="text/javascript">
$(document).ready(function(){
  for(var counter=1; counter<=2;counter++){
    $('#viewDetailTransaction'+counter).click(function(){
      $.get("{{ url('selectDetailedTransaction')}}?transactID="+$(this).val(),
          function(data) {
            var i=1;
            var totalSales =0;
            $.each(data, function(index, element) {
                $('#transactionDetails').append("<tr>"+
                "<td>"+element.item_name+"</td>"+
                "<td>"+element.transaction_quantity+"</td>"+
                "<td> PHP "+element.transaction_costPrice+"</td>"+
                "<td> PHP "+element.transaction_subtotal+"</td>"+
                "</tr>");
                totalSales += element.transaction_subtotal;
                i++;
            });
            if(i > 8){
              $('#modalBody').style.height = '370px';
              $('#modalBody').style.overflowY = 'auto';
            }
            document.getElementById("totalSalesPerTransaction").innerHTML = 'Total Sales : PHP ' + totalSales;
      });
    });
  }
  $('#modalCancel').click(function(){
    $('#transactionDetails').empty();
    document.getElementById("totalSalesPerTransaction").innerHTML = '';
  });
  $('#modalCancelUpper').click(function(){
    $('#transactionDetails').empty();
    document.getElementById("totalSalesPerTransaction").innerHTML = '';
  });
});
</script>
