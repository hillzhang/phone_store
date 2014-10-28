
<?php 
  //connet to the database
  $dbuser = "linshan"; 
  $dbpass = "linshan1206";  
  $dbname = "SSID"; 
  $db = OCILogon($dbuser, $dbpass, $dbname); 

  if (!$db)  {
    echo "An error occurred connecting to the database"; 
    exit; 
  }

	$SQL_FROM = 'catalog';
	$SQL_WHERE = 'title';
     //assignment 3
     // use HTML Entities to convert php special input characters.
	$searchq =	strip_tags(htmlentities($_REQUEST['queryString'], ENT_QUOTES, 'UTF-8'));
	// looking for the information begin with user's input
	$sql	=	"SELECT * FROM ".$SQL_FROM." WHERE ".$SQL_WHERE." LIKE '".$searchq."%'";
		
	$stmt = OCIParse($db, $sql); 
  
	if(!$stmt)  {
		echo "An error occurred in parsing the sql string.\n"; 
		exit; 
	  }
	  // execute sql
	OCIExecute($stmt); 

	while(OCIFetch($stmt)) {
        //assignment 3
         // use HTML Entities to convert php special characters from the database.
		$title= htmlentities(OCIResult($stmt,"TITLE"), ENT_QUOTES, 'UTF-8');
	  echo '<P onClick="fill(\''.$title.'\');">'.$title.'</P>'; 	
		
	}
	
		
	
?>