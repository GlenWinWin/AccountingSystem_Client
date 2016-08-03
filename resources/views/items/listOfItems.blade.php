@extends('layouts.mylayout')

@section('title')
	List of Items
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">List of Items</h1></center>
	<hr>
  <div class="dropdown">
             <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary btn-md" data-target="#" href="/page.html">
                 Category<span class="caret"></span>
             </a>
     		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
               <li class="dropdown-submenu">
                 <a tabindex="-1" href="#">Safety Equipments</a>
                 <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="#">Head</a></li>
                   <li><a href="#">Eye</a></li>
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
             <input type="text" name="name" value="">
             <input type="button" name="name" value="Search" class="btn btn-primary btn-md">
             </div>

         </div>
<div class="table-responsive">

	<table class="table" id="tab1">
		<thead class="thead">
			<tr>
				<th><input type="checkbox" value="" name="checkAll" id="checkAll"></th>
				<th>Item ID</th>
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
			<tr>
				<td><input type="checkbox" id="checkone" value=""></td>
				<th scope="row">1</th>
				<td>joyth</td>
				<td>25</td>
				<td>PHP. 12232,232.00</td>
				<td>PHP. 12232,232.00</td>
				<td>PHP. 12232,232.00</td>
				<td><input type="button" name="name" value="Edit" class="btn btn-primary btn-sm"></td>
				<td><input type="button" name="name" value="Delete" class="btn btn-primary btn-sm"></td>
			</tr>
			<tr>
				<td><input type="checkbox" id="checkone" value=""></td>
				<th scope="row">1</th>
				<td>joyth</td>
				<td>25</td>
				<td>PHP. 12232,232.00</td>
				<td>PHP. 12232,232.00</td>
				<td>PHP. 12232,232.00</td>
				<td><input type="button" name="name" value="Edit" class="btn btn-primary btn-sm"></td>
				<td><input type="button" name="name" value="Delete" class="btn btn-primary btn-sm"></td>
			</tr>

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
