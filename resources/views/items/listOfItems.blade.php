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
                   <li><a tabindex="-1" href="filterItems?cat=0&sub=1">Head</a></li>
                   <li><a href="filterItems?cat=0&sub=2">Eye</a></li>
                   <li><a href="filterItems?cat=0&sub=3">Eyewash</a></li>
                   <li><a href="filterItems?cat=0&sub=4">Ear</a></li>
                   <li><a href="filterItems?cat=0&sub=5">Respiratory</a></li>
                   <li><a href="filterItems?cat=0&sub=6">Body</a></li>
                   <li><a href="filterItems?cat=0&sub=7">Full</a></li>
                   <li><a href="filterItems?cat=0&sub=8">Hand</a></li>
                   <li><a href="filterItems?cat=0&sub=9">Safety Shoes</a></li>
                   <li><a href="filterItems?cat=0&sub=10">Rescue</a></li>
                 </ul>
               </li>
             </ul>
						 	<input type="button" name="name" value="Delete" class="btn btn-primary btn-md">
             <div class="search" style="display:block;">
							 {!! Form::open(array('action' => 'AdminController@searchItems' , 'method' => 'get'))!!}
							 <input type="text" name="search" required="" placeholder="Search...">
					 		<input type="submit" value="Search" class="btn btn-primary btn-md">
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
				<td><input type="checkbox" name="items_ids" id="checkone" value="{{$itemss->item_id}}"></td>
				<td>{{$itemss->item_name}}</td>
				<td>{{$itemss->item_quantity}}</td>
				<td>PHP {{$itemss->item_costPrice}}</td>
				<td>PHP {{$itemss->item_subcostPrice}}</td>
				<td>PHP {{$itemss->item_sellingPrice}}</td>
				<td><input type="button" value="Edit" class="btn btn-primary btn-sm"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-deleteItem" onclick="delete_Clerk_Distributor_Item({{$itemss->item_id}})" value="Delete"></td>
			</tr>
			@endforeach
		</tbody>
	</table>

	</div>
	<center>
		{{$items->links()}}
	</center>
</div>
<div id="myModal-deleteItem" class="modal fade">
    <div class="modal-dialog  modal-sm">
        <div class="modal-content">
            <div class="modal-header" style="color:#b3cccc";>
      <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Are you sure you want to delete this item?</h4>
            </div>
            <div class="modal-footer">
							{!! Form::open(array('action' => 'AdminController@removeItem' , 'method' => 'post'))!!}
			        <input type="hidden" name="the_id" id="specific_id">
     <button type="submit" class="btn btn-primary">Yes</button>
     <button type="button" class="btn btn-primary" data-dismiss="modal">No</button>
		 {!! Form::close()!!}
            </div>
        </div>
    </div>
</div>
@stop
