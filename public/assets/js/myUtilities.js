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
function editSpecificItem(item_id,item_name,item_quantity,item_costPrice,item_subcostPrice,item_sellingPrice){
  $("input[id=item_id]").val(item_id);
  $("input[id=itemNameId]").val(item_name);
  $("input[id=itemQuantityId]").val(item_quantity);
  $("input[id=itemCostId]").val(item_costPrice);
  $("input[id=itemSubCostId]").val(item_subcostPrice);
  $("input[id=itemSellingId]").val(item_sellingPrice);
}
function makeBold(){
  var contactField = document.getElementById('contactField').value;
  contactField.innerHTML = '<b>'+contactField+'</b>';
}
