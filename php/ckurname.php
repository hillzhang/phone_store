<?php

include("func_validt.php");
//assignment 3
// use of HTML Entities to convert php special input characters.
$username1=htmlentities($_GET['username1'], ENT_QUOTES, 'UTF-8');
//check the usernama
if(isName($username1)==true){
   if($username1=="qqtd"){
      echo "<span class='err'>&times;invalid!</span>";
   }
   else{
      echo "<span class='ok'>&radic;valid!</span>";
   }
}
else{
   echo "<span class='err'>&times;between 3 and 30 characters!!</span>";
    
}


?>

