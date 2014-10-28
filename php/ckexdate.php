<?php

include("func_validt.php");

//assignment 3
// use of HTML Entities to convert php special input characters.
$exdate=trim(htmlentities($_GET['exdate'], ENT_QUOTES, 'UTF-8'));
///check the date
if(isDate($exdate)==true){
   echo "<span class='ok'>&radic;valid!</span>";
}
else{
   echo "<span class='err'>&times please fill in right date!</span>";
    
}

?>


