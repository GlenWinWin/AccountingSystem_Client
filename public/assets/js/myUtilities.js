function delete_Clerk_Distributor_Item(id){
  $("input[id=specific_id]").val(id);
}
function manage_privileges(id){
  $("input[id=clerkId]").val(id);
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
  document.getElementById('toManagePrivileges').innerHTML = "If Save Changes button is disabled, make sure there are selected users.";
}
else{
  document.getElementById('btnManagePrivilegesMultiple').disabled = false;
  document.getElementById('toManagePrivileges').innerHTML = "";
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
