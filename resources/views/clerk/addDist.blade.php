@extends('layouts.myClerkLayout')

@section('title')
	Add Channel
@stop

@section('body-content')
<div class="col-lg-9" style="padding-bottom:30px;">
	@if(Session::has('flash_message'))
	<input type="hidden" value="{{Session::get('flash_message')}}" id="newClerk">
	@endif
	<center><h1 style="padding-bottom:20px;">
		@if(isset($title))
			{{$title}}
		@else
		FIST Application Form
		@endif
	</h1></center>
<hr>
	<div class="col-md-12 application-container" >
		<div class="col-md-4 application-row" >
			 <label class="col-md-4" style="padding-left:5px;">Date of Application:</label>
			 <div class="col-md-8" style="padding-left:0px;">
				 <input class="form-control" type="date" required="" placeholder="">
			 </div>
		 </div>

		 <div class="col-md-4 application-row" >
 			 <label class="col-md-4" style="padding-left:5px;">Position:</label>
 			 <div class="col-md-8" style="padding-left:0px;">
 				 <input class="form-control" type="text" required=""placeholder="">
 			 </div>
 		 </div>
		 <div class="col-md-4 application-row">
				<label class="col-md-4" style="padding-left:5px;">Reference ID No. :</label>
				<div class="col-md-8" style="padding-left:0px;">
					<input class="form-control" type="text" onkeypress="return isNumberKey(event)" required=""  >
				</div>
			</div>
	</div>
	<div>
		<label class="col-md-12" style="padding-left:5px;padding-top:15px;padding-bottom:15px;">I. Personal Information <hr class="hr"></label>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-4 application-row" >
				 <label class="col-md-4" style="padding-left:5px;">Surname:</label>
				 <div class="col-md-8" style="padding-left:0px;">
					 <input class="form-control" type="text" required=""  placeholder="">
				 </div>
			 </div>
			 <div class="col-md-4 application-row" >
 				 <label class="col-md-4" style="padding-left:5px;">First Name:</label>
 				 <div class="col-md-8" style="padding-left:0px;">
 					 <input class="form-control" type="text" required="" placeholder="">
 				 </div>
 			 </div>
			 <div class="col-md-4 application-row" >
 				 <label class="col-md-4" style="padding-left:5px;padding-right:5px;">Middle Name:</label>
 				 <div class="col-md-8" style="padding-left:0px;">
 					 <input class="form-control" type="text" required=""  placeholder="">
 				 </div>
 			 </div>
	</div>
	<div class="col-md-12 application-container">
		<div class="application-row" >
			 <label class="col-md-1" style="padding-left:5px;">Permanent Address:</label>
			 <div class="col-md-11 p-address">
				 <input class="form-control" type="text" required=""  placeholder="">
			 </div>
		 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-4 application-row" >
				 <label class="col-md-4" style="padding-left:5px;">Date of Birth:</label>
				 <div class="col-md-8" style="padding-left:0px;">
					 <input class="form-control" type="date" required=""  placeholder="">
				 </div>
			 </div>
			 <div class="col-md-4 application-row" >
				 <label class="col-md-4" style="padding-left:5px;">Place of Birth:</label>
				 <div class="col-md-8" style="padding-left:0px;">
					 <input class="form-control" type="text" required="" placeholder="">
				 </div>
			 </div>
			 <div class="col-md-4 application-row" >
				 <label class="col-md-4" style="padding-left:5px;padding-right:5px;">Nationality:</label>
				 <div class="col-md-8" style="padding-left:0px;">
					 <input class="form-control" type="text" required=""  placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-4 application-row" >
				 <label class="col-md-4" style="padding-left:5px;">Age:</label>
				 <div class="col-md-8" style="padding-left:0px;">
					 <input class="form-control" type="number" required=""  placeholder="">
				 </div>
			 </div>
			 <div class="col-md-4 application-row" >
				 <label class="col-md-4" style="padding-left:5px;">Gender:</label>
				 <div class="col-md-8" style="padding-left:0px;">
					   <label class="col-md-6" style="font-weight:normal;padding-left:0px;"><input type="radio" name="gender" value="male" > Male</label>
					   <label class="col-md-6" style="font-weight:normal;padding-left:0px;"><input type="radio" name="gender" value="female" > Female</label>
				 </div>
			 </div>
			 <div class="col-md-4 application-row" >
				 <label class="col-md-4" style="padding-left:5px;padding-right:5px;">Status:</label>
				 <div class="col-md-8" style="padding-left:0px;">
					 <select class="form-control">
							<option value="Married">Married</option>
							<option value="Single">Single</option>
							<option value="Divorced">Divorced</option>
							<option value="Widowed">Widowed</option>
						</select>
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
		<div class="application-row">
			 <label class="col-md-1" style="padding-left:5px;">Current Address:</label>
			 <div class="col-md-11 p-address">
				 <input class="form-control" type="text" required=""  placeholder="">
			 </div>
		 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Barangay No. :</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Zip Code:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Telephone No. :</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Cellphone No. :</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Email Address:</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="email"  placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Facebook Account:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">TIN ID No. :</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">SSS ID No.:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
	</div>
	<div>
		<label class="col-md-12" style="padding-left:5px;padding-top:15px;padding-bottom:15px;">II. Family Background <hr class="hr"></label>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Father's Name:</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text"  placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Occupation:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Residing Address:</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text" placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Contact No.:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Mother's Name:</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text"  placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Occupation:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Residing Address:</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text" placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Contact No.:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-6 application-row" >
				 <label class="col-md-2" style="padding-left:5px;">Father's Name:</label>
				 <div class="col-md-10 p-address" >
					 <input class="form-control" type="text"  placeholder="">
				 </div>
			 </div>
			 <div class="col-md-6 application-row" >
				 <label class="col-md-2 zip-code">Occupation:</label>
				 <div class="col-md-10 p-address">
					 <input class="form-control"type="text" placeholder="">
				 </div>
			 </div>
	</div>
	<div class="col-md-12 application-container">
			<div class="col-md-2 application-row" style="padding-left:5px;">
				<label >No. of Siblings:</label>
			 <input class="form-control" type="text" onkeypress="return isNumberKey(event)" placeholder="">
		 </div>
		 <div class="col-md-10" style="padding-left:5px;">
			<label>Name of Siblings</label>
			<input class="form-control" type="text"  placeholder="">
			<input class="form-control" type="text"  placeholder="">
			<input class="form-control" type="text"  placeholder="">
		 </div>
	 </div>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Spouse Name:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Contact No. :</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code"></label>
					<div class="col-md-10 p-address">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Occupation:</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text" placeholder="">
					</div>
				</div>
	 </div>
	 <div class="col-md-12 application-container">
		 <div class="application-row" >
				<label class="col-md-1" style="padding-left:5px;">Residing Address:</label>
				<div class="col-md-11 p-address">
					<input class="form-control" type="text" required=""  placeholder="">
				</div>
			</div>
	 </div>
	 <div>
		 <label class="col-md-12" style="padding-left:5px;padding-top:15px;padding-bottom:15px;">III. Beneficiary <hr class="hr"></label>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Full Name:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Occupation:</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text" placeholder="">
					</div>
				</div>
	 </div>
	 <div class="col-md-12 application-container">
		 <div class="application-row" >
				<label class="col-md-1" style="padding-left:5px;">Address:</label>
				<div class="col-md-11 p-address">
					<input class="form-control" type="text" required=""  placeholder="">
				</div>
			</div>
	 </div>
	 <label class="col-md-12" style="padding-left:5px;padding-top:15px;padding-bottom:15px;">IV. Employee Records<hr class="hr"></label>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Company Name:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Position:</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text" placeholder="">
					</div>
				</div>
	 </div>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Company Address:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Contact No. :</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text"  onkeypress="return isNumberKey(event)" placeholder="">
					</div>
				</div>
	 </div>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Name of Employer:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Contact No. :</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
					</div>
				</div>
	 </div>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Employment Reference:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Year/s in Service :</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="number" onkeypress="return isNumberKey(event)" placeholder="">
					</div>
				</div>
	 </div>
	 <div>
		 <label class="col-md-12" style="padding-left:5px;padding-top:15px;padding-bottom:15px;">V. FIST Officer Portion<hr class="hr"></label>
	 </div>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">FIST Encoder:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Signature:</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text"  placeholder="">
					</div>
				</div>
	 </div>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Channel Consultant:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Reference ID No. :</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text" onkeypress="return isNumberKey(event)" placeholder="">
					</div>
				</div>
	 </div>
	 <div class="col-md-12 application-container">
			 <div class="col-md-6 application-row" >
					<label class="col-md-2" style="padding-left:5px;">Approved By:</label>
					<div class="col-md-10 p-address" >
						<input class="form-control" type="text"  placeholder="">
					</div>
				</div>
				<div class="col-md-6 application-row" >
					<label class="col-md-2 zip-code">Signature:</label>
					<div class="col-md-10 p-address">
						<input class="form-control"type="text" placeholder="">
					</div>
				</div>
	 </div>
</div>
@stop
