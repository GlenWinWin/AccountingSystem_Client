@extends('layouts.mylayout')

@section('title')
		@if(isset($title))
			{{$title}}
		@else
			List Of Items
		@endif
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">
		@if(isset($title))
			{{$title}}
		@else
			List Of Items
		@endif
	</h1></center>
	<hr>
  <div class="dropdown">
             <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary btn-md" data-target="#" href="/page.html">
                 Category<span class="caret"></span>
             </a>
     		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
               <li class="dropdown-submenu">
                 <a tabindex="-1" href="#">Safety Equipments</a>
                 <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="subCategory_head">Head</a></li>
                   <li><a href="subCategory_eye">Eye</a></li>
                   <li><a href="#">Eyewash</a></li>
                   <li><a href="#">Ear</a></li>
                   <li><a href="#">Respiratory</a></li>
                   <li><a href="#">Body</a></li>
                   <li><a href="#">Full</a></li>
                   <li><a href="#">Hand</a></li>
                   <li><a href="#">Safety Shoes</a></li>
                   <li><a href="#">Rescue</a></li>
                 </ul>
               </li>
             </ul>
						 	<input type="button" name="name" value="Delete" class="btn btn-primary btn-md">
             <div class="search" style="display:block;">
							 {!! Form::open(array('action' => 'AdminController@searchItems' , 'method' => 'post'))!!}
							 <input type="text" name="search" id="searchField" onkeyup="enableSearchBtn" placeholder="Search...">
							 <input type="submit" name="name" value="Search" id="searchButton" class="btn btn-primary btn-md">
					 		{!! Form::close()!!}
             </div>

         </div>
<div class="table-responsive">

	<table class="table" id="tab1">
		<thead class="thead">
			<tr>
				<th><input type="checkbox" value="" name="checkAll" id="checkAll"></th>
				<th>Item Name</th>
				<th>Quantity</th>
				<th>Cost Price</th>
				<th>Sub Cost Price</th>
				<th>Selling Price</th>
				<th>Edit</th>
				<th>Delete</th>
			</tr>
		</thead>
		<tbody>
			@foreach($items as $itemss)
			<tr>
				<td><input type="checkbox" id="checkone" value=""></td>
				<td>{{$itemss->item_name}}</td>
				<td>{{$itemss->item_quantity}}</td>
				<td>PHP {{$itemss->item_costPrice}}</td>
				<td>PHP {{$itemss->item_subcostPrice}}</td>
				<td>PHP {{$itemss->item_sellingPrice}}</td>
				<td><input type="button" name="name" value="Edit" class="btn btn-primary btn-sm"></td>
				<td><input type="button" name="name" value="Delete" class="btn btn-primary btn-sm" onclick="delete_Clerk_Distributor_Item({{$itemss->id}})"></td>
			</tr>
			@endforeach
		</tbody>
	</table>

	</div>
	<center>
		<ul class="pagination pagination-color">
			<li ><a href="#"><<</a></li>
			<li class="active"><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">>></a></li>
		</ul>
	</center>
</div>
@stop
