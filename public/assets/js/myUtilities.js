function delete_Clerk_Distributor_Item(id){
  $("input[id=specific_id]").val(id);
}
function manage_privileges(id,se,ar,ac,ui,gr){
  if(se == 1){
    $("#salesEncodingCheckBox").prop('checked', true);
  }
  if(ar == 1){
    $("#accountRegistrationCheckBox").prop('checked', true);
  }
  if(ac == 1){
    $("#addClerkCheckBox").prop('checked', true);
  }
  if(ui == 1){
    $("#useInventoryCheckBox").prop('checked', true);
  }
  if(gr == 1){
    $("#generateReportCheckBox").prop('checked', true);
  }
  $("input[id=clerkId]").val(id);
}
function clearPrivileges(){
  $("#salesEncodingCheckBox").prop('checked', false);
  $("#accountRegistrationCheckBox").prop('checked', false);
  $("#addClerkCheckBox").prop('checked', false);
  $("#useInventoryCheckBox").prop('checked', false);
  $("#generateReportCheckBox").prop('checked', false);
}
function setClerkIdforChangePasswordAccount(id){
  $("input[id=myClerkId]").val(id);
}
function validateChangePasswordForm(){
  var pword = document.getElementById("inputPassword").value;
  var repeat_pword = document.getElementById("inputPasswordRepeat").value;
  var admin_pword = document.getElementById("inputPasswordAdmin").value;
  var adminPassword = document.getElementById("adminPassword").value;
  var repeatCounter = 0;
  var adminCounter = 0;
  if(pword.localeCompare(repeat_pword) != 0){
    document.getElementById("showErrorRepeat").innerHTML = "Passwords do not match!";
    repeatCounter = 1;
  }
  if(admin_pword.localeCompare(adminPassword) != 0){
    document.getElementById("showErrorAdmin").innerHTML = "Wrong admin password!";
    adminCounter = 1;
  }
  else if(admin_pword.localeCompare(adminPassword) == 0){
    document.getElementById("showErrorAdmin").innerHTML = "";
    adminCounter = 0;
  }
  if(adminCounter == 0 && repeatCounter == 0){
    $('#changePasswordAccountForm').submit();
  }
}
function ableChangePasswordButton(){
  var pword = document.getElementById("inputPassword").value;
  var repeat_pword = document.getElementById("inputPasswordRepeat").value;
  var admin_pword = document.getElementById("inputPasswordAdmin").value;

  if((pword == null || pword == "") || (repeat_pword == null || repeat_pword == "") || (admin_pword == null || admin_pword == "")){
      document.getElementById('changePasswordBtn').disabled = true;
      document.getElementById("showErrorRepeat").innerHTML = "";
      document.getElementById("showErrorAdmin").innerHTML = "";
  }
  else{
    document.getElementById('changePasswordBtn').disabled = false;
  }
}
function doMultipleSelectionOfIdsManage(){
  var listIds = "";
  $('input:checkbox[name=specific_ids]').each(function()
{
    if($(this).is(':checked'))
    listIds += $(this).val() + ",";
});
if(listIds == null || listIds == ""){
  document.getElementById('btnManagePrivilegesMultiple').disabled = true;
}
else{
  document.getElementById('btnManagePrivilegesMultiple').disabled = false;
  $("input[id=manageIdsPrivileges]").val(listIds);
}
}
function doMultipleSelectionOfIdsDelete(){
  var listIds = "";
  $('input:checkbox[name=specific_ids]').each(function()
{
    if($(this).is(':checked'))
    listIds += $(this).val() + ",";
});
if(listIds == null || listIds == ""){
  document.getElementById('btnDeleteMultiple').disabled = true;
  document.getElementById('toshowEnabledeleteMultipleUserButton').innerHTML = "No selected users!";
  document.getElementById('changeifHasSelected').innerHTML = "Close";

}
else{
  document.getElementById('btnDeleteMultiple').disabled = false;
  document.getElementById('changeifHasSelected').innerHTML = "No";
  document.getElementById('toshowEnabledeleteMultipleUserButton').innerHTML = "Are you sure you want to delete the selected users?";
  $("input[id=idstoDelete]").val(listIds);
}
}
function doMultipleSelectionItemsToDelete(){
  var listIds = "";
  $('input:checkbox[name=items_ids]').each(function()
{
    if($(this).is(':checked'))
    listIds += $(this).val() + ",";
});
  if(listIds == null || listIds == ""){
    document.getElementById('btnDeleteMultiple').disabled = true;
    document.getElementById('toDeleteMultipleItemsTitle').innerHTML = "No selected items!";
    document.getElementById('changeifSelected').innerHTML = "Close";
  }
  else{
    document.getElementById('btnDeleteMultiple').disabled = false;
    document.getElementById('changeifSelected').innerHTML = "No";
    document.getElementById('toDeleteMultipleItemsTitle').innerHTML = "Are you sure you want to delete the selected items?";
    $("input[id=itemstoDelete]").val(listIds);
  }
}
function editSpecificItem(item_id,item_name,item_costPrice,item_subcostPrice,item_sellingPrice){
  $("input[id=item_id]").val(item_id);
  $("input[id=itemNameId]").val(item_name);
  $("input[id=itemCostId]").val(item_costPrice);
  $("input[id=itemSubCostId]").val(item_subcostPrice);
  $("input[id=itemSellingId]").val(item_sellingPrice);
  document.getElementById('itemNameId').innerHTML = item_name;
}
function detailedItem(item_id,item_name,item_costPrice,item_subcostPrice,item_sellingPrice){
  document.getElementById('itemNameId').innerHTML = item_name;
  document.getElementById('itemCostId').innerHTML = item_costPrice;
  document.getElementById('itemSubCostId').innerHTML = item_subcostPrice;
  document.getElementById('itemSellingId').innerHTML = item_sellingPrice;

}
function InvalidMsg(textbox){
  var p = document.getElementById("passwordField").value
  var new_p = document.getElementById("newPasswordField").value;
  var con_p = document.getElementById("confirmPasswordField").value
  if(new_p == '' && con_p == '' && p == ''){
      document.getElementById("passwordField").required = false;
      document.getElementById("newPasswordField").required = false;
      document.getElementById("confirmPasswordField").required = false;
      textbox.setCustomValidity('');
      return false;
  }
  else if(new_p != '' && con_p != ''){
    if(new_p.localeCompare(con_p) != 0){
      textbox.setCustomValidity('Password do not match');
      return true;
    }
    else if(new_p.localeCompare(con_p) == 0){
      textbox.setCustomValidity('');
      return false;
    }
  }
  else{
      document.getElementById("passwordField").required = true;
      document.getElementById("newPasswordField").required = true;
      document.getElementById("confirmPasswordField").required = true;
  }
}
function checkOldPasswordInput(passwordko){
  var current = document.getElementById("hiddenPassword").value;
  var input = document.getElementById("passwordField").value;
  if(input == ''){
    passwordko.setCustomValidity('');
    document.getElementById("newPasswordField").required = false;
    document.getElementById("confirmPasswordField").required = false;
    return false;
  }
  else if(input.localeCompare(current) != 0){
    passwordko.setCustomValidity('The old password you entered was incorrect');
    return true;
  }
  else if(input.localeCompare(current) == 0){
    passwordko.setCustomValidity('');
    document.getElementById("newPasswordField").required = true;
    document.getElementById("confirmPasswordField").required = true;
    return false;
  }
}
function checkIfselectedCategory(){
  var id = $("#selectCategory").val();
  if(id == 0){
    document.getElementById('addItemBtn').disabled = true;
  }
  else{
    document.getElementById('addItemBtn').disabled = false;
  }
}
function checkIfselectedExistingCategory(){
  var id = $("#categoryList").val();
  if(id == 0){
    document.getElementById("newCategory").required = true;
    document.getElementById("newSubCategory").required = true;
  }
  else{
    document.getElementById("newCategory").required = false;
    document.getElementById("newSubCategory").required = true;
  }
}
function removeReceivingItem(temporary_receiving_id,temp_id){
    $("input[id=temp_receiving_id]").val(temporary_receiving_id);
    $("input[id=temp_id]").val(temp_id);
}
function removeSaleItem(temporary_sale_id,temp_id){
    $("input[id=temp_sales_id]").val(temporary_sale_id);
    $("input[id=temp_id]").val(temp_id);
}
function updateQuantity(counter,id){
  var cost = document.getElementById("priceField"+counter).value;
  var quantity = +document.getElementById("quantityField"+counter).value;
  document.getElementById("subTotal"+counter).innerHTML = "P"+(cost * quantity).toFixed(2);
  document.getElementById("saleQuantity"+counter).innerHTML = "x " + quantity;
  document.getElementById("saleSubTotal"+counter).innerHTML = "P"+(cost * quantity).toFixed(2);
  var dataString = "id="+id+"&quantity="+quantity;
  var totalSales = 0;
  $.ajax({
    type: "GET",
    url: "updateTemporaryQuantitySales",
    dataType:"json",
    data: dataString,
    cache: false
  });
  var sales = +document.getElementById("quantitySale").value;
  for(var i=1; i<=sales;i++){
    var cost = document.getElementById("priceField"+i).value;
    var quantity = +document.getElementById("quantityField"+i).value;

    totalSales += (cost * quantity);
  }
  document.getElementById("totalSalesID").innerHTML = "P " + (totalSales).toFixed(2);
  $("input[id=totalSalesHiddenInput]").val((totalSales.toFixed(2)));
}
function updateQuantityReceivings(counter,id){
  var cost = document.getElementById("priceField"+counter).value;
  var quantity = +document.getElementById("quantityField"+counter).value;
  document.getElementById("subTotal"+counter).innerHTML = "P"+(cost * quantity).toFixed(2);

  var dataString = "id="+id+"&quantity="+quantity;
  $.ajax({
    type: "GET",
    url: "updateTemporaryQuantityReceivings",
    dataType:"json",
    data: dataString,
    cache: false
  });
}
function changeValue(){
  var inputDistributorID = document.getElementById("inputDistributorID").value;
  if($("#newDistributor").is(':checked')){
    $("input[id=checkBoxValue]").val("1");
    $("input[id=idReferral]").val(inputDistributorID);
  }
  else{
    $("input[id=checkBoxValue]").val("0");
  }
}
function copyValueToHiddenFields(){
  var inputDistributorID = document.getElementById("inputDistributorID").value;
  if(inputDistributorID != ''){
    document.getElementById('btnSales').disabled = false;
    $("input[id=hiddenDistributorID]").val(inputDistributorID);
    $("input[id=idReferral]").val(inputDistributorID);
  }
  else{
    document.getElementById('btnSales').disabled = true;
    $("input[id=hiddenDistributorID]").val("");
    $("input[id=idReferral]").val("");
  }
}
function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
}
function viewOtherGenealogy(id){
  if(id == 0){
    $("#noDistributor").modal();
  }
  else{
    $("input[id=specific_id]").val(id);
    $('#formForOtherGenealogy').submit();
  }
}
