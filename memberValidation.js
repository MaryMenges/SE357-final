var flag=0;

function validateStudentId(field){
  if(field==""){
    document.getElementById("mError0").innerHTML="No Student ID was entered.";
    flag=1;
  }
  else{
    document.getElementById("mError0").innerHTML="";
  }
}

function validateFirstName(field){
  if(field==""){
    document.getElementById("mError1").innerHTML="No First Name was entered.";
    flag=1;
  }
  else{
    document.getElementById("mError1").innerHTML="";
  }
}

function validateLastName(field){
  if (field == ""){
    document.getElementById("mError2").innerHTML="No Last Name was entered.";
    flag=1;
  }
  else{
    document.getElementById("mError2").innerHTML="";
  }
}

function validateEmail(field){
  if (field == ""){
    document.getElementById("mError3").innerHTML="No Email was entered.";
    flag=1;
  }
  else if(!((field.indexOf(".") > 0) && (field.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(field)){
    document.getElementById("mError3").innerHTML="The Email address is invalid.";
    flag=1;
  }
  else{
    document.getElementById("mError3").innerHTML="";
  }
}

function validateMember(form){
  flag=0;
  validateStudentId(form.student_id.value);
  validateFirstName(form.first_name.value);
  validateLastName(form.last_name.value);
  validateEmail(form.email.value);
  if(flag==1){
    return false;
  }
  else{
    return true;
  }
}
