
function InputCheck(RegForm)
{
  if (RegForm.username.value == "")
  {
    alert("the username should not be empty!");
    RegForm.username.focus();
    return (false);
  }
  if (RegForm.email.value == "")
  {
    alert("you must fill in the email!");
    RegForm.email.focus();
    return (false);
  }
  if (RegForm.tel.value=="")
  {
    alert("you must fill in the phone number!");
    RegForm.tel.focus();
    return (false);
  }
  if (RegForm.number.value == "")
  {
    alert("you must fill in the unit number!");
    RegForm.number.focus();
    return (false);
  }
  if (RegForm.sname.value == "")
  {
    alert("you must fill in your stree number!");
    RegForm.sname.focus();
    return (false);
  }if (RegForm.city.value == "")
  {
    alert("you must fill in the city!");
    RegForm.city.focus();
    return (false);
  }
  
  if (RegForm.coun.value == "")
  {
    alert("you must fill in the country!");
    RegForm.coun.focus();
    return (false);
  }
   if (RegForm.cnum.value == "")
  {
    alert("you must fill in your credit number!");
    RegForm.cnum.focus();
    return (false);
  } if (RegForm.exdate.value == "")
  {
    alert("the expiry date should not be empty!");
    RegForm.exdate.focus();
    return (false);
  } if (RegForm.hname.value == "")
  {
    alert("you must fill the card holder name!");
    RegForm.hname.focus();
    return (false);
  }
}


