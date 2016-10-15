<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">
         <link rel="stylesheet" href="assets/css/style.css" media="screen" title="no title" charset="utf-8">
         <link rel="stylesheet" href="assets/fonts/css/font-awesome.min.css" media="screen" title="no title" charset="utf-8">
         <link rel="stylesheet" href="assets/css/jquery-ui.css" type="text/css" />

    <title>@yield('title')</title>
  </head>
  <body>
    <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="nav-title">
    	<div class="navbar-header">
    		<a id="menu-toggle" href="#" class="navbar-toggle">
    				<span class="sr-only">Toggle navigation</span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    						<span class="icon-bar"></span>
    		</a>
    			<a class="navbar-brand" href="home_merchant">
    				<img src="assets/images/logo.png" height="55px;" />
    			</a>
    		</div>
    		<div id="navbar" class="navbar-collapse collapse ">
    			<ul class="nav navbar-nav navbar-right">
    				<li class="dropdown">
    											<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-top: 25px;font-size:17px;">Settings<span class="caret"></span></a>
    											<ul class="dropdown-menu">
    												<li><a href="profile_edit">Edit Profile</a></li>
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
    					{{Auth::user()->name}}
    				</div>
            <div class="profile-usertitle-job">
              Merchant
            </div>

    			</div>
    		<ul class="nav">
            <li>
              <a href="home_merchant">
              <i class="fa fa-user"></i>
              Merchant</a>
            </li>
            <li>
              <a href="channel_list">
              <i class="fa fa-users"></i>
              Channel</a>
            </li>
          @if($ui == 1)
          <li>
            <a href="inventory">
            <i class="fa fa-list"></i>
          Inventory</a>
          </li>
          <li>
            <a href="sales_viewing">
            <i class="fa fa-line-chart"></i>
          Sales</a>
          </li>
          <li>
            <a href="receivings_viewing" >
            <i class="fa fa-archive"></i>
          Receiving</a>
          </li>
          @endif
          @if($gr == 1)
          <li>
            <a href="list_items">
            <i class="fa fa-bar-chart"></i>
          Reports</a>
          </li>
          @endif
          <li class="visible-xs visible-md visible-sm">
            <a href="profile_edit" >
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
  <script type="text/javascript" src="assets/js/ui.js"></script>
  @yield('javascript_part')

  <!--  modal-->
	<script type="text/javascript">
	$(document).ready(function(){
    document.getElementById('addItemBtn').disabled = true;
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
    $('.open-modal-managePrivilegesMultipleTimes').click(function(){
      $('#myModal-multiplePrivileges').modal('show');
    });
      $("#myModal-multiplePrivileges").on('hidden.bs.modal', function(){
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
    $('.open-modal-addItems').click(function(){
      $('#myModal-addItems').modal('show');
    });
      $("#myModal-addItems").on('hidden.bs.modal', function(){
      <!--alert("Modal window has been completely closed.");-->
    });
  });
  </script>
  <script type="text/javascript">
  $(document).ready(function(){
    $('.open-modal-editItems').click(function(){
      $('#myModal-editItems').modal('show');
    });
      $("#myModal-editItems").on('hidden.bs.modal', function(){
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
    $('.open-modal-deleteItem').click(function(){
      $('#myModal-deleteItem').modal('show');
    });
      $("#myModal-deleteItem").on('hidden.bs.modal', function(){
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
  <script type="text/javascript">
  $(document).ready(function(){
    $('.open-modal-deleteMultipleUsers').click(function(){
      $('#myModal-deleteMultiple').modal('show');
    });
      $("#myModal-deleteMultiple").on('hidden.bs.modal', function(){
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
<!-- Script for chaining of dropdowns -->
<script type="text/javascript">
$(document).ready(function($){
  $('#selectCategory').change(function(){
    $.get("{{ url('dropdown')}}?id="+$(this).val(),
  				function(data) {
  					$('#subCategory').empty();
            var id = $("#selectCategory").val();
            if(id == 0){
                $('#subCategory').append("<option value='"+ 0 +"'>" + 'Select Sub Category' + "</option>");
            }
            else{
    					$.each(data, function(index, element) {
    			            $('#subCategory').append("<option value='"+ element.id +"'>" + element.subcategory_name + "</option>");
    			    });
            }
  	});
  });
});
</script>
<script type="text/javascript">
$(document).ready(function($){
  $('#category').change(function(){
    var selectedId = $(this).val();
    $.get("{{ url('dropdown')}}?id="+$(this).val(),
  				function(data) {
            if(selectedId == 0){
              		document.getElementById('btnFilter').disabled = true;
            }
            else{
              		document.getElementById('btnFilter').disabled = false;
            }
  					$('#subCat').empty();
            var id = $("#category").val();
            if(id == 0){
                $('#subCat').append("<option value='"+ 0 +"'>" + 'Select Sub Category' + "</option>");
            }
            else{
              $('#subCat').append("<option value='"+ 0 +"'>All</option>");
    					$.each(data, function(index, element) {
    			            $('#subCat').append("<option value='"+ element.id +"'>" + element.subcategory_name + "</option>");
    			    });
            }
  	});
  });
});
</script>
<script type="text/javascript">
$('#searchitem').autocomplete({

  source:"search/autocomplete",
  minlenght:1,
  autoFocus:true,
  select:function(event,ui){
    event.preventDefault();
    if(ui.item.value == ''){
      $('#searchitem').val('No results found');
    }
    else{
      $('#searchitem').val(ui.item.value);
    }
  }
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
function readURL(input) {

  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#yey').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$("#imgYey").change(function(){
  readURL(this);
});
</script>
<script type="text/javascript">
function readURL(input) {

  if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function (e) {
          $('#blah1').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]);
  }
}

$("#imgInp1").change(function(){
  readURL(this);
});
</script>
<script type="text/javascript">

    function PreviewImage() {
        var oFReader = new FileReader();
        oFReader.readAsDataURL(document.getElementById("uploadImage").files[0]);

        oFReader.onload = function (oFREvent) {
            document.getElementById("uploadPreview").src = oFREvent.target.result;
        };
    };

</script>
