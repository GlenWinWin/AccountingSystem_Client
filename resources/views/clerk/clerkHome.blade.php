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
	@if(Session::has('flash_message'))
	<input type="hidden" value="{{Session::get('flash_message')}}" id="newClerk">
	@endif
	<center><h1 style="padding-bottom:20px;">
		@if(isset($title))
			{{$title}}
		@else
		List of Clerks
		@endif
	</h1></center>
<hr>
	@if($ac == 1)
		<input type="button" name="name" value="Add Clerk" data-toggle="modal" data-target="#myModalAddClerk" class="btn btn-primary btn-md">
	@endif
	<div class="search">
		{!! Form::open(array('action' => 'ClerkController@searchClerk' , 'method' => 'get'))!!}
		<input type="text" name="search" required="" placeholder="Search...">
		<input type="submit" value="Search" class="btn btn-primary btn-md">
		{!! Form::close()!!}
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
			@foreach($clerks as $clerkss)
			<tr>

				<th scope="row">{{$clerkss->fname}} {{$clerkss->lname}}</th>
				<td>{{$clerkss->contact}}</td>
				<td>{{$clerkss->email}}</td>
				<td>{{$clerkss->address}}</td>
				<td>{{$clerkss->username}}</td>

			</tr>
			@endforeach
		</tbody>
	</table>
	</div>
	<center>
		{{$clerks->links()}}
	</center>
</div>
<!--  Modal Add Clerks-->
<div id="myModalAddClerk" class="modal fade" role="dialog">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add Clerk</h4>
						</div>
						<form action="{{ URL::to('add_clerk') }}" method="post" enctype="multipart/form-data">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<div class="col-lg-12">
							<center>
						<div class="col-lg-7" style="    padding-top: 12px;">
										<img id="blah" src="assets/images/user.png" class="edit-image">
									</div>
								<div class="col-lg-5 upload-clerk">
								<h6>Upload a different photo</h6>
					<center><input type="file" name="profile_pic" class="text-center upload" id="imgInp"></center>
								</div>
								</center>
</div>
<div class="col-lg-12">

						<div class="modal-body">
							<div class="form-group">
                       <label class="col-lg-4 control-label">First name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="fname" required="" onkeydown="return alphaOnly(event);">
                       </div>
              </div>
							<div class="form-group">
                       <label class="col-lg-4 control-label">Last name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="lname" required="" onkeydown="return alphaOnly(event);">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Contact Number:</label>
											 <div class="col-lg-2" style="margin-top:5px">
                         <font size="4px">+63</font>
                       </div>
											 <div class="col-lg-4" style="margin-left:-55px">
                         <input class="form-control" type="text" id="contactField" name="contact" required="" pattern="[9][0-9]{9}" title="Valid is 9482468123" maxlength="10" style="font-size:18px">
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


<!-- Modal for Add CLerk-->
 <div class="modal fade alert-modal" id="clerkAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog alert-modal-dialog">
      <div class="modal-content" style="padding:50px;">
          <center>
						<img src="assets/images/check.png" alt="" style="height:150px;padding-bottom:20px;"/>
						<h4 class="modal-title" id="myModalLabel"><b>New Clerk Added</b></h4></center>
          <center>  <p style="font-size:18px">A new clerk has been successfully added on the list. </p>  </center>
            <center><button type="button" class="btn btn-primary btn-md edit-btn" data-dismiss="modal" style="padding-left:30px;padding-right:30px;">OK</button>  </center>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  <!-- /.Modal for Add CLerk -->
@stop
@section('javascript_part')
<script type="text/javascript">
	$(document).ready(function(){

		var newClerk = document.getElementById("newClerk").value;
		if(newClerk != '' || newClerk != null){
		  $("#clerkAdd").modal();
		}
	});
</script>
@stop
