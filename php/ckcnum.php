<?php

include("func_validt.php");

//assignment 3
// use of HTML Entities to convert php special input characters.
$cnum=trim(htmlentities($_GET['cnum'], ENT_QUOTES, 'UTF-8'));
//check the credit number
if(isCreditnumber($cnum)==true){
   echo "<span class='ok'>&radic;valid!</span>";
}
else{
   echo "<span class='err'>&times the Creditcard is 16 numbers!</span>";
    
}

?>


