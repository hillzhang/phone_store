<?php

include("func_validt.php");
//assignment 3
// use of HTML Entities to convert php special input characters.
$sname=htmlentities($_GET['sname'], ENT_QUOTES, 'UTF-8');
//check the street name
if(isName($sname)==true){
  
      echo "<span class='ok'>&radic;valid!</span>";
  }
else{
   echo "<span class='err'>&times;please fill in right street name!</span>";
    
}

?>

