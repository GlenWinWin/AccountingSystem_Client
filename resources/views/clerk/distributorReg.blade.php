@extends('layouts.myClerkLayout')

@section('title')
	@if(isset($title))
		{{$title}}
	@else
	List of Clerks
	@endif
@stop

@section('body-content')
<div class="col-lg-9">
  <center>
    <div class="form-title-row">
        <h1>Distributor Registration</h1>
        <hr>
    </div>
    <form method="post" action="" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="">

  </center>
  <center>
<div class="col-md-12 col-sm-12 col-xs-12">

  <div class="form-group">
           <label class="col-lg-4 control-label">First name:</label>
           <div class="col-lg-5">
             <input class="form-control" type="text" required="" name="fname" value="">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Last name:</label>
           <div class="col-lg-5">
             <input class="form-control" type="text" required="" name="lname" value="">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Contact Number:</label>
           <div class="col-lg-5">
             <input class="form-control" type="number" name="contact" required="" pattern="[0][9][0-9]{9}" title="Valid is 09358217701" maxlength="11" value="">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Address:</label>
           <div class="col-lg-5">
             <input class="form-control" name="address" type="text" value="">
           </div>
  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Email Address:</label>
           <div class="col-lg-5">
             <input class="form-control" name="email" type="email" required="" value="">
           </div>
  </div>
<div class="form-group col-lg-12"  style="margin-top:20px;">

</div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Transaction ID:</label>
           <div class="col-lg-4">

               <b>#123453434</b>

           </div>
  </div>
  <div class="col-lg-12">

  </div>
  <div class="form-group">
           <label class="col-lg-4 control-label">Referral ID:</label>
           <div class="col-lg-4">

               <b>#123453434</b>

           </div>
  </div>

<div class="form-row col-lg-12" style="margin-bottom:20px;">
      <center>
        <input type="submit" class="btn btn-primary btn-md edit-btn" value="Submit Form">
        <a href="back" class="btn btn-secondary btn-md edit-btn">Cancel</a>
      </center>
    </div>
  </div>
</form>
</center>
<button class="btn btn-primary" data-toggle="modal" data-target="#invalidPassword">
	Invalid Password
</button>
<button class="btn btn-primary" data-toggle="modal" data-target="#clerkAdd">
	Add Clerk
</button>
<button class="btn btn-primary" data-toggle="modal" data-target="#distributorAdd">
	Add Distributor
</button>
</div>




  <!-- Modal for Invalid Password-->
  <div class="modal fade alert-modal" id="invalidPassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog alert-modal-dialog">
      <div class="modal-content" style="padding:50px;">
          <center>
						<img src="assets/images/x.png" alt="" style="height:150px;padding-bottom:20px;"/>
						<h4 class="modal-title" id="myModalLabel"><b>Invalid Username/Password</b></h4></center>
          <center>  <p style="font-size:18px">The email address or password that you've entered doesn't match any account!</p>  </center>
            <center><button type="button" class="btn btn-primary btn-md edit-btn" style="padding-left:30px;padding-right:30px;">OK</button>  </center>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.Modal for Invalid Password -->
	<!-- Modal for Add CLerk-->
  <div class="modal fade alert-modal" id="clerkAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog alert-modal-dialog">
      <div class="modal-content" style="padding:50px;">
          <center>
						<img src="assets/images/check.png" alt="" style="height:150px;padding-bottom:20px;"/>
						<h4 class="modal-title" id="myModalLabel"><b>New Clerk Added</b></h4></center>
          <center>  <p style="font-size:18px">A new clerk has been successfully added on the list. </p>  </center>
            <center><button type="button" class="btn btn-primary btn-md edit-btn" style="padding-left:30px;padding-right:30px;">OK</button>  </center>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.Modal for Add CLerk -->
	<!-- Modal for Add Distributor-->
	<div class="modal fade alert-modal" id="distributorAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog alert-modal-dialog">
			<div class="modal-content" style="padding:50px;">
					<center>
						<img src="assets/images/check.png" alt="" style="height:150px;padding-bottom:20px;"/>
						<h4 class="modal-title" id="myModalLabel"><b>New Distributor Added</b></h4></center>
					<center>  <p style="font-size:18px">A new Distributor has been successfully added on the list. </p>  </center>
						<center><button type="button" class="btn btn-primary btn-md edit-btn" style="padding-left:30px;padding-right:30px;">OK</button>  </center>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.Modal for Add Distributor -->
@stop
