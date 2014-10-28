<?php

include("func_validt.php");

//assignment 3
// use HTML Entities to convert php special input characters.
$tel=trim(htmlentities($_GET['tel'], ENT_QUOTES, 'UTF-8'));
//check tha length of the phone number
if(isNumLength($tel, 10, 10)==true){
   echo "<span class='ok'>&radic;valid!</span>";
}
else{
   echo "<span class='err'>&times;the phone is 10 numbers!</span>";
    
}
?>

