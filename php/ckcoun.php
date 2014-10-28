<?php

include("func_validt.php");
//assignment 3
// use of HTML Entities to convert php special input characters.
$coun=htmlentities($_GET['coun'], ENT_QUOTES, 'UTF-8');
//check the country name
if(isName($coun)==true){
   if($coun=="yu"){
      echo "<span class='err'>&times;invalid!</span>";
	   
   }
   else{
      echo "<span class='ok'>&radic;valid!</span>";
   }
}
else{
   echo "<span class='err'>&times;please fill in right country name!</span>";
    
}

?>

