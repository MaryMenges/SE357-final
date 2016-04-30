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
