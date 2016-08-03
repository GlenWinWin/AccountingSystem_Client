@extends('layouts.mylayout')
@section('title')
Edit Profile
@stop
@section('body-content')
<div class="col-lg-9">
<form class="form-labels-on-top" method="post" action="#">

    <div class="form-title-row">
        <h1>Edit Profile</h1>
    </div>

    <div class="form-row">
        <label>
            <span>First Name</span>
            <input type="text" name="firstname">
        </label>
    </div>

<div class="form-row">
        <label>
            <span>Last Name</span>
            <input type="text" name="lastname">
        </label>
    </div>

<div class="form-row">
        <label>
            <span>Contact Number</span>
            <input type="tel" name="urstel">
        </label>
    </div>

<div class="form-row">
        <label>
            <span>Address</span>
            <input type="text" name="address">
        </label>
    </div>

    <div class="form-row">
        <label>
            <span>Email</span>
            <input type="email" name="email">
        </label>
    </div>
<div class="form-row">
        <center><button type="submit">Submit Form</button>
    </div>



        </div>
    </div>
</form>
</div>
@stop
