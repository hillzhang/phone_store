<?php

include("func_validt.php");

//assignment 3
// use of HTML Entities to convert php special input characters.
$password=trim(htmlentities($_GET['password'], ENT_QUOTES, 'UTF-8'));
//check the password
if(isUserName($password)==true){
   echo "<span class='ok'>&radic;valid!</span>";
}
else{
   echo "<span class='err'>&times;the password number is between 3-30 characters!</span>";
}

?>

