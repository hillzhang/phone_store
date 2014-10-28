<?php

include("func_validt.php");

//assignment 3
// use of HTML Entities to convert php special input characters.
$email=trim(htmlentities($_GET['email'], ENT_QUOTES, 'UTF-8'));
//check the email
if(isEmail($email)==true){
   echo "<span class='ok'>&radic;valid!</span>";
}
else{
   echo "<span class='err'>&times;please fill in correct emial!</span>";
    
}

?>


