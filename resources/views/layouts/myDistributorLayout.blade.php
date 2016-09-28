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
    			<a class="navbar-brand" href="genealogy">
    				logo
    			</a>
    		</div>
    		<div id="navbar" class="navbar-collapse collapse ">
    			<ul class="nav navbar-nav navbar-right">
    				<li class="dropdown">
    											<a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Settings<span class="caret"></span></a>
    											<ul class="dropdown-menu">
    												<li><a href="profile_distributor">Edit Profile</a></li>
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
    				<div class="profile-usertitle-name" style="margin-bottom:0px;">
    					{{ Auth::user()->name }}
    				</div>
            <div class="profile-usertitle-job" style="margin-bottom:8px;font-size:14px;">
              {{Auth::user()->userID}}
            </div>
            <div class="profile-usertitle-job">
              {{ $positionName }}
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
    				<a href="priviliges_bonus">
    				<i class="fa fa-gift"></i>
    			Priviliges Bonus</a>
    			</li>
          <li>
    				<a href="help">
    				<i class="fa fa-info" style="font-size:20px;padding-right:5px;"></i>
    			Help</a>
    			</li>
          <li class="visible-xs visible-md visible-sm">
            <a href="profile_distributor" >
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
  <script src="assets/js/numeral.min.js"></script>
  <script src="assets/js/myUtilities.js"></script>
  @yield('javascript_part')
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
  var transactID = "";
  var countOfTransactions = +document.getElementById("countOfTransactions").value;
  for(var counter=1; counter<=countOfTransactions;counter++){
    $('#viewDetailTransaction'+counter).click(function(){
      transactID = $(this).val();
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
            $('#transactionDetails').append("<tr>"+
              "<td style='font-weight:bold;font-size:15px;'>Total</td>"+
              "<td></td>"+
              "<td></td>"+
              "<td id='totalSalesID'></td>"+
              "</tr>");
            if(i > 4){
              $('#modalBody').style.height = '300px';
              $('#modalBody').style.overflowY = 'auto';
            }
            document.getElementById("totalSalesID").innerHTML = 'PHP ' + totalSales;
            document.getElementById("titleDetailedTransaction").innerHTML = 'Detailed Transaction of ' + transactID;
      });
    });
  }
  $('#modalCancel').click(function(){
    $('#transactionDetails').empty();
    document.getElementById("totalSalesID").innerHTML = '';
    document.getElementById("titleDetailedTransaction").innerHTML = '';
  });
  $('#modalCancelUpper').click(function(){
    $('#transactionDetails').empty();
    document.getElementById("totalSalesID").innerHTML = '';
    document.getElementById("titleDetailedTransaction").innerHTML = '';
  });
  $(window).click(function() {
    $('#transactionDetails').empty();
    document.getElementById("totalSalesID").innerHTML = '';
    document.getElementById("titleDetailedTransaction").innerHTML = '';
  });
});
</script>
<script type="text/javascript">
function readURL(input) {

  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp").change(function(){
  readURL(this);
});
</script>
<script type="text/javascript">
  var totalSales = numeral({{Auth::user()->totalPersonalSales}}).format('0,0.00');
  var totalSalesMonth = numeral({{Auth::user()->totalSalesMonth}}).format('0,0.00');
  var totalGroupSales = numeral({{Auth::user()->totalGroupSales}}).format('0,0.00');
  var targetGroupSales = numeral({{Auth::user()->targetGroupSales}}).format('0,0.00');
  var groupSalesForChannelDirector = numeral(3000000).format('0,0.00');
  document.getElementById("totalPersonalSales").innerHTML = 'PHP ' + totalSales + '/ PHP ' +totalSalesMonth;
  document.getElementById("totalGroupSales").innerHTML = 'PHP ' + totalGroupSales + '/ PHP ' +groupSalesForChannelDirector;
  document.getElementById("totalGroupSalesMoney").innerHTML = 'PHP ' + totalGroupSales + '/ PHP ' +targetGroupSales;
</script>
