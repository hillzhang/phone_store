
// add function to check if the field information is empty
function InputCheck(RegForm)
{
  if (RegForm.username.value == "")
  {
    alert("the username can not be empty!");
    RegForm.username.focus();
    return (false);
  }
  if (RegForm.password.value == "")
  {
    alert("you must enter the password!");
    RegForm.password.focus();
    return (false);
  }
  if (RegForm.password2.value != RegForm.password.value)
  {
    alert("the passwords are different!");
    RegForm.password2.focus();
    return (false);
  }
  if (RegForm.email.value == "")
  {
    alert("the email can not be empty!");
    RegForm.email.focus();
    return (false);
  }
  if (RegForm.tel.value=="")
  {
    alert("you must fill in the phone number!");
    RegForm.tel.focus();
    return (false);
  }
  if (RegForm.coun.value == "")
  {
    alert("you must fill in the country!");
    RegForm.coun.focus();
    return (false);
  }
   if (RegForm.terms.checked ==false)
  {
    alert("you must agree to the terms & condition!");
    RegForm.email.focus();
    return (false);
  }
}

