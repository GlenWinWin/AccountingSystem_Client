@extends('layouts.mylayout')

@section('title')
	Add Clerk
@stop

@section('body-content')
<center>
	{!! Form::open(array('action' => 'AdminClerkDistributor@addClerkProcess' , 'method' => 'post' , 'id' => 'formQuestion'))!!}
						<h1>Add Clerk here</h1>
					<div>
						<input type="text" name="first_name" placeholder="First Name" required="" />
					</div>
					<div>
						<input type="text" name="last_name" placeholder="Last Name" required="" />
					</div>
					<div>
						<button>Add Clerk</button>
					</div>
	{!! Form::close()!!}
</center>
@stop