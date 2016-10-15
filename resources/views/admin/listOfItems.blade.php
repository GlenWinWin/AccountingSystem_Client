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
             <a data-toggle="modal" class="btn btn-primary btn-md" data-target="#myModalFilter">
                 Filter Items
             </a>
						 <input type="button" class="btn btn-md btn-primary open-modal-deleteMultipleUsers" onclick="doMultipleSelectionItemsToDelete()" value="Delete">
						 <input type="button" name="name" value="Add Category" class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModalAddCategory">
						 <div class="col-lg-3 col-md-3 col-sm-4 search-small">
							 {!! Form::open(array('action' => 'AdminController@searchItems' , 'method' => 'get'))!!}
							 <input type="text" name="search" required="" placeholder="Search..." class="form-control" style="width:70%;display:inline;">
							 <input type="submit" value="Search" class="btn btn-primary btn-md" style="width:28%">
					 		{!! Form::close()!!}
             </div>

<div class="table-responsive">

	<table class="table" id="tab1">
		<thead class="thead">
			<tr>
				<th><input type="checkbox" value="" name="checkAll" id="checkAll"></th>
				<th>Item Image</th>
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
				<td  data-toggle="modal" data-target="#myModalItemDetails"  onclick="detailedItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')" style="cursor:pointer;"><img src="assets/images/login.jpg" alt=""  class="img-responsive" style="height:70px;"/></td>
				<td  data-toggle="modal" data-target="#myModalItemDetails"  onclick="detailedItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')" style="cursor:pointer;">{{$itemss->item_name}}</td>
				<td  data-toggle="modal" data-target="#myModalItemDetails"  onclick="detailedItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')" style="cursor:pointer;">{{$itemss->item_quantity}}</td>
				<td  data-toggle="modal" data-target="#myModalItemDetails"  onclick="detailedItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')" style="cursor:pointer;">P{{$itemss->item_costPrice}}</td>
				<td  data-toggle="modal" data-target="#myModalItemDetails"  onclick="detailedItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')" style="cursor:pointer;">P{{$itemss->item_subcostPrice}}</td>
				<td  data-toggle="modal" data-target="#myModalItemDetails"  onclick="detailedItem({{$itemss->item_id}},'{{$itemss->item_name}}','{{$itemss->item_costPrice}}','{{$itemss->item_subcostPrice}}','{{$itemss->item_sellingPrice}}')" style="cursor:pointer;">P{{$itemss->item_sellingPrice}}</td>
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
<!--  Modal Show detailed Items-->
<div id="myModalItemDetails" class="modal fade" role="dialog">
		<div class="modal-dialog">
				<div class="modal-content">
						<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Items Details</h4>
						</div>

<div class="col-lg-12">
						<input type="hidden" name="id_item" id="item_id" value="">
						<div class="modal-body">
							<div class="form-group col-lg-12">
								<div class="picture_items">
									<center>	<img src="assets/images/login.jpg" alt=""  class="img-responsive" style="border: 5px solid #002F4C;"/></center>
								</div>
							</div>
							<div class="form-group">
                       <label class="col-lg-4 control-label">Item name:</label>
                       <div class="col-lg-8">
												 <p id="itemNameId"  name="name_item">
 												</p>
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Cost Price:</label>
                       <div class="col-lg-8">
												 <p id="itemCostId">
												</p>
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Sub Cost Price:</label>
                       <div class="col-lg-8">
												 <p id="itemSubCostId">
												</p>
                       </div>
              </div>
              <div class="form-group">
                       <label class="col-lg-4 control-label">Selling Price:</label>
                       <div class="col-lg-8">
												 <p id="itemSellingId">
												</p>
                       </div>
              </div>
						</div>
            </div>
						<div class="modal-footer">
						 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
						</div>
				</div>

		</div>
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
							<div class="form-group col-lg-12">
								<div class="picture_items">
									<img id="blah" src="assets/images/login.jpg" class="img-responsive" style="border: 5px solid #002F4C;">
									<center><input type="file" name="new_dp" class="text-center upload" id="imgInp" style="margin-top:20px;width:80%;"></center>
								</div>
							</div>
							<div class="form-group">
                       <label class="col-lg-4 control-label">Item name:</label>
                       <div class="col-lg-8">
                         <input class="form-control" id="itemNameId" value="" type="text" name="name_item" required="">
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
<div id="myModalAddCategory" class="modal fade" role="dialog">
	<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Add Category</h4>
					</div>
					{!! Form::open(array('action' => 'AdminController@addCategorySubCategory' , 'method' => 'post'))!!}
<div class="col-lg-12">
					<div class="modal-body">
						<div class="form-group">
							<label class="col-lg-4 control-label">Choose Category</label>
							<div class="col-lg-8">
								<select id="categoryList" name="category" class="form-control" style="width:95%;" onclick="checkIfselectedExistingCategory()">
										<option value="0">Select Category</option>
										@foreach($categories as $cat)
										<option value="{{$cat->id}}">{{$cat->category_name}}</option>
										@endforeach
								</select>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-4 control-label">Add New Category</label>
							<div class="col-lg-8">
								<input class="form-control" type="text" id="newCategory" name="cat_new" required="" style="width:95%;">
							</div>
						</div>
						<div class="form-group">
										 <label class="col-lg-4 control-label">Add Sub Category</label>
										 <div class="col-lg-8">
											 <input class="form-control" type="text" id="newSubCategory" name="sub_new" required="" style="width:95%;">
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
<div id="myModalFilter" class="modal fade" role="dialog">
	<div class="modal-dialog">
			<div class="modal-content">
					<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Filter Items</h4>
					</div>
					{!! Form::open(array('action' => 'AdminController@filterByCategorySubCategory' , 'method' => 'post'))!!}
<div class="col-lg-12">
					<div class="modal-body">
						<div class="form-group">
							<label class="col-lg-4 control-label">Category</label>
							<div class="col-lg-8">
								<select id="selectCategory" name="category" class="form-control" style="width:85%;" onclick="checkIfselectedCategory()">
										<option value="0">Select Category</option>
										@foreach($categories as $cat)
										<option value="{{$cat->id}}">{{$cat->category_name}}</option>
										@endforeach
								</select>
							</div>
							<label class="col-lg-4 control-label">Sub Category</label>
							<div class="col-lg-8">
								<select id="subCategory" name="subCategory" class="form-control" style="width:85%;">
									<option value="0">Select Sub Category</option>
								</select>
							</div>
						</div>
					</div>
					</div>
					<div class="modal-footer">
	 				<button type="submit" class="btn btn-primary" id="btnFilter">Submit</button>
					 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
			</div>
		{!! Form::close()!!}
	</div>
</div>
@stop
@section('javascript_part')
<script type="text/javascript">
	$(document).ready(function(){
		document.getElementById('btnFilter').disabled = true;
	});
</script>
@stop
