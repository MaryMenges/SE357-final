//==================================================
function validateEvent(form){

  fail = validateEventName(form.event_name.value)
  fail += validateEventType(form.event_type.value)
  fail += validateDate(form.date.value)

  if (fail == "") return true
  else {alert(fail); return false}
}

function validateEventName(field){
  return (field == "") ? "No Event Name was entered.\n" : ""
}

function validateEventType(field){
  return (field == "") ? "No Event Type was entered.\n" : ""
}

function validateDate(field){
  return (field == "") ? "No Date was entered.\n" : ""
}
//==================================================
function validateMember(form){

  fail = validateStudentId(form.student_id.value)
  fail += validateFirstName(form.first_name.value)
  fail += validateLastName(form.last_name.value)
  fail += validateEmail(form.email.value)

  if (fail == "") return true
  else {alert(fail); return false}
}

function validateStudentId(field){
  return (field == "") ? "No Student ID was entered.\n" : ""
}

function validateFirstName(field){
  return (field == "") ? "No First Name was entered.\n" : ""
}

function validateLastName(field){
  return (field == "") ? "No Last Name was entered.\n" : ""
}

function validateEmail(field){
  if (field == "") return "No Email was entered.\n"
  else if (!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)) return "The Email address is invalid.\n"
  return ""
}

//==================================================
// function validateClub(form){
//
//   fail = validateClubName(form.club_name.value)
//   fail += validateUsername(form.username.value)
//   fail += validatePassword(form.password.value, form.confirm_password.value)
//
//   if (fail == "") return true
//   else {alert(fail); return false}
// }
//
// function validateClubName(field){
//   return (field == "") ? "No Club Name was entered.\n" : ""
// }
//
// function validateUsername(field){
//   return (field == "") ? "No Username was entered.\n" : ""
// }
//
// function validatePassword(field1, field2){
//   if (field1 == "") return "No Password was entered.\n"
//   else if (field1.length < 6) return "Password must be at least 6 characters.\n"
//   else if (field1 != field2) return "Passwords do not match.\n"
//   return ""
// }

//==================================================
var flag=0;

function validateClubName(field){
  if(field==""){
    document.getElementById("error0").innerHTML="No Club Name was entered.";
    flag=1;
  }
  else{
    document.getElementById("error0").innerHTML="";
  }
}

function validateUsername(field){
  if(field==""){
    document.getElementById("error1").innerHTML="No Username was entered.";
    flag=1;
  }
  else{
    document.getElementById("error1").innerHTML="";
  }
}

function validatePassword(field1, field2){
  if (field1 == ""){
    document.getElementById("error2").innerHTML="No Password was entered.";
    flag=1;
  }
  else if (field1.length < 6){
    document.getElementById("error2").innerHTML="Password must be at least 6 characters.";
    flag=1;
  }
  else if (field1 != field2){
    document.getElementById("error2").innerHTML="Passwords do not match.";
    flag=1;
  }
  else{
    document.getElementById("error2").innerHTML="";
  }
}

function validateClub(form){
  flag=0;
  validateClubName(form.club_name.value);
  validateUsername(form.username.value);
  validatePassword(form.password.value, form.confirm_password.value);
  if(flag==1){
    return false;
  }
  else{
    return true;
  }
}
