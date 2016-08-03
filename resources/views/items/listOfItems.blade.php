@extends('layouts.mylayout')

@section('title')
	List of Items
@stop

@section('body-content')
<div class="col-lg-9">
	<center><h1 style="padding-bottom:20px;">List of Items</h1></center>
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
             <div class="search">
             <input type="text" name="name" value="">
             <input type="button" name="name" value="Search" class="btn btn-primary btn-md">
             </div>
         </div>

	<table class="table table-design">
		<thead class="thead">
			<tr>
				<th><input type="checkbox" name="name" value=""></th>
				<th>Name</th>
				<th>Contact</th>
				<th>Email</th>
				<th>Address</th>
				<th>Username</th>
				<th>Password</th>
				<th>Delete</th>
				<th>Total Sales</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td><input type="checkbox" name="name" value=""></td>
				<th scope="row">joyth</th>
				<td>joyth</td>
				<td>joyth@yahoo.com</td>
				<td>joyth</td>
				<td>joyth</td>
				<td><input type="button" name="name" value="Password" class="btn btn-primary btn-sm"></td>
				<td><input type="button" name="name" value="Delete" class="btn btn-primary btn-sm"></td>
				<td>PHP. 12232,232.00</td>
			</tr>
      <tr>
				<td><input type="checkbox" name="name" value=""></td>
				<th scope="row">joyth</th>
				<td>joyth</td>
				<td>joyth@yahoo.com</td>
				<td>joyth</td>
				<td>joyth</td>
				<td><input type="button" name="name" value="Password" class="btn btn-primary btn-sm"></td>
				<td><input type="button" name="name" value="Delete" class="btn btn-primary btn-sm"></td>
				<td>PHP. 12232,232.00</td>
			</tr>


		</tbody>
	</table>
	<center>
		<ul class="pagination pagination-color">
			<li><a href="#"><<</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li><a href="#">5</a></li>
			<li><a href="#">>></a></li>
		</ul>
	</center>
</div>
  Home
@stop
