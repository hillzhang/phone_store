<?php

include("func_validt.php");
//assignment 3
// use of HTML Entities to convert php special input characters.
$city=htmlentities($_GET['city'], ENT_QUOTES, 'UTF-8');
//check the city name
if(isName($city)==true){
   if($city=="yu"){
      echo "<span class='err'>&times;invalid!</span>";
	   
   }
   else{
      echo "<span class='ok'>&radic;valid!</span>";
   }
}
else{
   echo "<span class='err'>&times;please fill in right city!</span>";
   
}

?>

