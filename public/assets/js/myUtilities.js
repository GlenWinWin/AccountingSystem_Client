function delete_Clerk_Distributor_Item(id){
  $("input[id=specific_id]").val(id);
}
function manage_privileges(id){
  $("input[id=clerkId]").val(id);
}
function validateChangePasswordForm(){
  var pword = document.getElementById("inputPassword").value;
  var repeat_pword = document.getElementById("inputPasswordRepeat").value;
  var admin_pword = document.getElementById("inputPasswordAdmin").value;
  var adminPassword = "adminako";
  var repeatCounter = 0;
  var adminCounter = 0;
  if(pword.localeCompare(repeat_pword) != 0){
    document.getElementById("showErrorRepeat").innerHTML = "Passwords do not match!";
    // repeatCounter = 1;
  }
  if(repeatCounter == adminCounter){
    document.getElementById("showErrorAdmin").innerHTML = "Wrong admin password!";
    adminCounter = 1;
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
function enableSearchBtn(){
  var search = document.getElementById("searchField").value;

  if(search == null || search == ""){
      document.getElementById('searchButton').disabled = true;
  }
  else{
      document.getElementById('searchButton').disabled = false;
  }
}
