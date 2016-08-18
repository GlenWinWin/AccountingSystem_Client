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
                 <a href="gg">Safety Equipments</a>
								 <ul class="dropdown-menu">
                   <li><a tabindex="-1" href="filterItems?cat=1&sub=1">Head</a></li>
                   <li><a href="filterItems?cat=1&sub=2">Eye</a></li>
                   <li><a href="filterItems?cat=1&sub=3">Eyewash</a></li>
                   <li><a href="filterItems?cat=1&sub=4">Ear</a></li>
                   <li><a href="filterItems?cat=1&sub=5">Respiratory</a></li>
                   <li><a href="filterItems?cat=1&sub=6">Body</a></li>
                   <li><a href="filterItems?cat=1&sub=7">Full</a></li>
                   <li><a href="filterItems?cat=1&sub=8">Hand</a></li>
                   <li><a href="filterItems?cat=1&sub=9">Safety Shoes</a></li>
                   <li><a href="filterItems?cat=1&sub=10">Rescue</a></li>
                 </ul>
               </li>
             </ul>
						 <input type="button" class="btn btn-md btn-primary open-modal-deleteMultipleUsers" onclick="doMultipleSelectionItemsToDelete()" value="Delete">
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
				<td><input type="button" value="Edit Items" class="btn btn-primary btn-sm open-modal-editItems" onclick="editSpecificItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_quantity}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')"></td>
				<td><input type="button" class="btn btn-sm btn-primary open-modal-delete" onclick="delete_Clerk_Distributor_Item({{$itemss->item_id}})" value="Delete"></td>
			</tr>
			@endforeach
		</tbody>
	</table>

	</div>
	<center>
		{{$items->links()}}
	</center>
</div>
<!-- Modal Password -->
<div id="myModal-password" class="modal fade">
		<div class="modal-dialog modal-sm">
				<div class="modal-content">
						<div class="modal-header" style="color:#b3cccc";>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Fill-up the fields:</h4>
						</div>
			<div class="form-group">
						<input type="hidden" id="adminPassword" value="">
						<input type="hidden" name="specific_id" id="myClerkId">
				<center>
					<label for="inputPassword3">New Password</label>
				<br>
			<input type="password" id="inputPassword" name="pword" onkeyup="ableChangePasswordButton()" class="form-control" aria-describedby="passwordHelpInline"></center>
				 <center>
				<label for="inputPassword4">Repeat Password</label>
				<br>
			<input type="password" id="inputPasswordRepeat" name="new_password" onkeyup="ableChangePasswordButton()" class="form-control" aria-describedby="passwordHelpInline"></center>
				<small id="passwordHelpInline" class="text-muted">
					<center>
							<i>
								<h4 id="showErrorRepeat" style="color:red;">
								</h4>
							</i>
					</center>
				</small>
					<center>
				<label for="inputPassword4">Admin Password</label>
				<br>
				<input type="password" id="inputPasswordAdmin" onkeyup="ableChangePasswordButton()" name="admin_pword" class="form-control" aria-describedby="passwordHelpInline">	</center>
				<small id="passwordHelpInline" class="text-muted">
					<center>
						<i>
							<h4 id="showErrorAdmin" style="color:red;">
							</h4>
						</i>
					</center>
				</small>
						<div class="modal-footer">
						<input type="button" onclick="validateChangePasswordForm()" id="changePasswordBtn" class="btn btn-primary" value="Save Changes">
						 <button class="btn btn-default" data-dismiss="modal">Close</button>
						</div>

					</div>
				</div>
		</div>
</div>
<!--  Modal Change Password-->
<!--  Modal Edit Items-->
<div id="myModal-editItems" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Edit Items</h4>
						</div>
{!! Form::open(array('action' => 'AdminController@editItem' , 'method' => 'post'))!!}
<div class="col-lg-12">
						<input type="hidden" name="id_item" id="item_id" value="">
						<div class="modal-body">
							<div class="form-group">
                       <label class="col-lg-4 control-label">Item name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" id="itemNameId" value="" type="text" name="name_item" required="">
                       </div>
              </div>
							<div class="form-group">
                       <label class="col-lg-4 control-label">Quantity:</label>
                       <div class="col-lg-8">
                         <input class="form-control" id="itemQuantityId" value="" type="text" name="quantity_item" required="">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Cost Price:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" id="itemCostId" value="" name="costPrice_item" required="">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Sub Cost Price:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" id="itemSubCostId" value="" name="subcostPrice_item" required="">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Selling Price:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" id="itemSellingId" value="" name="sellingPrice_item" required="">
                       </div>
              </div>
						</div>
            </div>
						<div class="modal-footer">

		 <button type="submit" class="btn btn-primary">Submit</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
				{!! Form::close()!!}
		</div>
</div>
<!--  modal add clerk-->

<div id="myModal-delete" class="modal fade">
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

<div id="myModal-deleteMultiple" class="modal fade">
		<div class="modal-dialog modal-sm">
				<div class="modal-content">
						<div class="modal-header" style="color:#b3cccc";>
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title" id="toDeleteMultipleItemsTitle"></h4>
						</div>
						<div class="modal-footer">
			{!! Form::open(array('action' => 'AdminController@removeMultipleItems' , 'method' => 'post'))!!}
			<input type="hidden" name="ids_to_be_delete" id="itemstoDelete">
		 <button type="submit" id="btnDeleteMultiple" class="btn btn-primary">Yes</button>
		 <button type="button" class="btn btn-primary" id="changeifSelected" data-dismiss="modal"></button>
		 {!! Form::close()!!}
						</div>
				</div>
		</div>
</div>
@stop
