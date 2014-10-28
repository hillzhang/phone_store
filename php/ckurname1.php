<?php

include("func_validt.php");
//assignment 3
// use of HTML Entities to convert php special input characters.
$username=htmlentities($_GET['username'], ENT_QUOTES, 'UTF-8');
//check the username
if(isName($username)==true){
   if($username=="qqtd"){
      echo "<span class='err'>&times;invalid!</span>";
   }
   else{
      echo "<span class='ok'>&radic;valid!</span>";
   }
}
else{
   echo "<span class='err'>&times;between 3 and 30 characters!</span>";
    
}


?>

