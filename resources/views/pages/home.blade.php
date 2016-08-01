@extends('layouts.mylayout')

@section('title')
	Home
@stop

@section('body-content')
  <a href="logout" style="float:right" onclick=" return confirm('Are you sure you want to logout?')">Logout</a>
  Home

@stop
