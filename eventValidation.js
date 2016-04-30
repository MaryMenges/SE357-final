var flag=0;

function validateEventName(field){
  if(field==""){
    document.getElementById("eError0").innerHTML="No Event Name was entered.";
    flag=1;
  }
  else{
    document.getElementById("eError0").innerHTML="";
  }
}

function validateEventType(field){
  if(field==""){
    document.getElementById("eError1").innerHTML="No Event Type was entered.";
    flag=1;
  }
  else{
    document.getElementById("eError1").innerHTML="";
  }
}

function validateDate(field){
  if (field == ""){
    document.getElementById("eError2").innerHTML="No Date was entered.";
    flag=1;
  }
  else{
    document.getElementById("eError2").innerHTML="";
  }
}

function validateEvent(form){
  flag=0;
  validateEventName(form.event_name.value);
  validateEventType(form.event_type.value);
  validateDate(form.date.value);
  if(flag==1){
    return false;
  }
  else{
    return true;
  }
}
