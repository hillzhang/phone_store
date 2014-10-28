<?php

include("func_validt.php");

//assignment 3
// use of HTML Entities to convert php special input characters.
$REQUESTcode=trim(htmlentities($_GET['pc'], ENT_QUOTES, 'UTF-8'));
//check the postcode
if(isREQUESTcode($REQUESTcode)==true){
   echo "<span class='ok'>&radic;valid!</span>";
}
else{
   echo "<span class='err'>&times;the Code number is 4!!</span>";
   
}

?>
