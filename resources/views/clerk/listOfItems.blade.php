@extends('layouts.myClerkLayout')

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
			Inventory
		@endif
	</h1></center>
	<hr>

  <div class="dropdown">
             <a id="dLabel" role="button" data-toggle="dropdown" class="btn btn-primary btn-md" data-target="#">
                 Category<span class="caret"></span>
             </a>
     		<ul class="dropdown-menu multi-level" role="menu" aria-labelledby="dropdownMenu">
               <li class="dropdown-submenu">
                 <a href="Category_filter?cat=1">Safety Equipments</a>
                 <ul class="dropdown-menu">
                   <li><a href="ItemsFilter?cat=1&sub=1">Head</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=2">Eye</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=3">Eyewash</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=4">Ear</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=5">Respiratory</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=6">Body</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=7">Full</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=8">Hand</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=9">Safety Shoes</a></li>
                   <li><a href="ItemsFilter?cat=1&sub=10">Rescue</a></li>
                 </ul>
               </li>
             </ul>
						 	<input type="button" name="name" value="Add an Item" class="btn btn-primary btn-md open-modal-addClerk">
						 <input type="button" class="btn btn-md btn-primary open-modal-deleteMultipleUsers" onclick="doMultipleSelectionItemsToDelete()" value="Delete">
						 <div class="search" style="display:block;">
							 {!! Form::open(array('action' => 'ClerkController@searchItems' , 'method' => 'get'))!!}
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
			@if(count($items) > 0)
				@foreach($items as $itemss)
				<tr>
					<td><input type="checkbox" name="items_ids" id="checkone" value="{{$itemss->item_id}}"></td>
					<td>{{$itemss->item_name}}</td>
					<td>{{$itemss->item_quantity}}</td>
					<td>PHP {{$itemss->item_costPrice}}</td>
					<td>PHP {{$itemss->item_subcostPrice}}</td>
					<td>PHP {{$itemss->item_sellingPrice}}</td>
					<td><input type="button" value="Edit Items" class="btn btn-primary btn-sm open-modal-editItems" onclick="editSpecificItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')"></td>
					<td><input type="button" class="btn btn-sm btn-primary open-modal-delete" onclick="delete_Clerk_Distributor_Item({{$itemss->item_id}})" value="Delete"></td>
				</tr>
				@endforeach
			@elseif(isset($title))
				<tr>
					<td>
						<h4 style="text-align:center"><i>No results found</i></h4>
					</td>
				</tr>
			@else
				<tr>
					<td>
						No Items found
					</td>
				</tr>
			@endif
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
                       <label class="col-lg-4 control-label">Cost Price:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="number" id="itemCostId" value="" name="costPrice_item" required="" step='0.01' placeholder='0.00'>
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Sub Cost Price:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="number" id="itemSubCostId" value="" name="subcostPrice_item" required="" step='0.01' placeholder='0.00'>
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Selling Price:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="number" id="itemSellingId" value="" name="sellingPrice_item" required="" step='0.01' placeholder='0.00'>
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

<!--  Modal Add Clerks-->
<div id="myModal-addClerk" class="modal fade">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Add an Item</h4>
						</div>
						{!! Form::open(array('action' => 'ClerkController@addItem' , 'method' => 'post'))!!}

<div class="col-lg-12">

						<div class="modal-body">
							<div class="form-group">
								<label class="col-lg-4 control-label">Item Category</label>
								<div class="col-lg-8">
									<select id="category" name="category" class="form-control" style="width:95%;" onchange="checkIfselectedCategory()">
			    		    	  <option value="0">Select Category</option>
											@foreach($categories as $cat)
			    		        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
											@endforeach
			    		    </select>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-4 control-label">Item Sub Category</label>
								<div class="col-lg-8">
									<select id="subCategory" name="subCategory" class="form-control" style="width:95%;">
										<option value="0">Select Sub Category</option>
									</select>
								</div>
							</div>
							<div class="form-group">
                       <label class="col-lg-4 control-label">Item name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" type="text" name="item_name" required="" style="width:95%;">
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Cost Price:</label>
											 <div class="col-lg-8" style="inline-block">
											<div style="display:inline;">PHP. &emsp;</div><input class="form-control" type="number" name="cost" required="" style="width:80%;display:inline" step='0.01' placeholder='0.00'>
											 </div>
              </div>
							<div class="form-group">
											 <label class="col-lg-4 control-label">Sub Cost Price:</label>
											 <div class="col-lg-8" style="inline-block">
											<div style="display:inline;">PHP. &emsp;</div><input class="form-control" type="number" name="subcost" required="" style="width:80%;display:inline" step='0.01' placeholder='0.00'>
											 </div>
							</div>
							<div class="form-group">
											 <label class="col-lg-4 control-label">Selling Price:</label>
											 <div class="col-lg-8" style="inline-block">
											<div style="display:inline;">PHP. &emsp;</div><input class="form-control" type="number" name="selling_price" required="" style="width:80%;display:inline" step='0.01' placeholder='0.00'>
											 </div>
							</div>

						</div>
            </div>
						<div class="modal-footer">

		 <button type="submit" class="btn btn-primary" id="addItemBtn">Submit</button>
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>
			{!! Form::close()!!}
		</div>
</div>
<!--  modal add clerk-->
@stop
