
<?php
//connect to the database
$dbuser = "linshan"; 
  $dbpass = "linshan1206";  
  $dbname = "SSID"; 
  $db = OCILogon($dbuser, $dbpass, $dbname); 

  if (!$db)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }
  	
?>
