<?php

include("func_validt.php");

//assignment 3
// use of HTML Entities to convert php special input characters.
$password=trim(htmlentities($_GET['password'], ENT_QUOTES, 'UTF-8'));
$pwd2=trim($_GET['pwd2']);
//check whther the passwor is the same
if($pwd2==$password){
   echo "<span class='ok'>&radic;true!</span>";
}
else{
   echo "<span class='err'>&times;it is different to the password!</span>";
}

?>

