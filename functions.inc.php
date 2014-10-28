
<?php
@session_start();
  //obtain my salt;
  $salt=$_SESSION['salt'];   
?>

<?php

session_start();
function writeShoppingCart() {
	$cart = $_SESSION['cart'];
	if (!$cart) {
		return'0 items ';
	} else {
		// Parse the cart session variable
		$items = explode(',',$cart);
		$s = (count($items) > 1) ? 's':'';
		return count($items).' x item'.$s;
	}
}

function showCart() {

	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="post" id="cart">';
		$output[] ='<table border="1">';
		$output[] = '<th>Product picture</hr>';
		$output[] = '<th>Product title</hr>';
		$output[] = '<th>Product price</hr>';
		$output[] = '<th>Product quatity</hr>';
		$output[] = '<th>Totla price</hr>';
		$output[] = '<th>Remove</hr>';
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM catalog WHERE id = '.$id;
			
			// modified by Zhang			
			$stmt = OCIParse($db, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			@OCIExecute($stmt); 

			while(@OCIFetch($stmt)) {

				$title= OCIResult($stmt,"TITLE");
				
				$price = OCIResult($stmt,"PRICE");
				$id = OCIResult($stmt,"ID");
               $photo=	OCIResult($stmt,"PHOTO");		
 			   
			}
			$output[] = '<tr>';
			$output[] = '<tr>';
			$output[] = '<tr>';
			
			
			$output[] = '<tr>';
			$output[]='<td><img src=\'images/'.$photo.'\'height="70" width="70"/></td>';
			$output[] = '<td>'.$title.'</td>';
			$output[] = '<td>AU$ '.$price.'</td>';
			$output[] = '<td><input type="text" name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
			$output[] = '<td>AU$ '.($price * $qty).'</td>';
			$output[] = '<td><a href="cart.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$postage += 10 * $qty;
			$packing +=5 *$qty;
			$total += $price * $qty +$postage +$qty;
			
			$output[] = '</tr>';
		}
		$output[] = '</table>';
		$output[] = '<p style=float:right>Postage charge: <strong>AU $'.$postage.'</strong><br/><br/>
		            Packing charge: <strong>AU $'.$packing.'</strong><br/><br/>
					 Grand total: <strong>AU $'.$total.'</strong></p><br/><br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		
        $output[] = '<div ><input type="submit" class="register" value="Update"/></div>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[] = '</form>';
	} else {
		$output[] = '<p><h4>Your shopping cart is empty, please click continue to select your products.</h4></p>';
	}
	return join('',$output);
}
function showCart1() {
	global $db;
	$cart = $_SESSION['cart'];
	$username = $_SESSION['username'];
	
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="order1.php?action=update" method="post" id="cart">';
		$output[] = '<table border="01">';
		$output[] = '<th>Product picture</hr>';
		$output[] = '<th>Product title</hr>';
	
		$output[] = '<th>Product quatity</hr>';
		$output[] = '<th>Totla price</hr>';
		$output[] = '<th>Remove</hr>';
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM catalog WHERE id = '.$id;
			
			// modified by Zhang			
			$stmt = OCIParse($db, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			@OCIExecute($stmt); 
            
			while(@OCIFetch($stmt)) {
                //assignment 3
                // use HTML Entities to convert php special characters from the database.
				$title= htmlentities(OCIResult($stmt,"TITLE"), ENT_QUOTES, 'UTF-8');
				
				$price = htmlentities(OCIResult($stmt,"PRICE"), ENT_QUOTES, 'UTF-8');
				$id=htmlentities(OCIResult($stmt,"ID"), ENT_QUOTES, 'UTF-8');
                				
				$photo=	htmlentities(OCIResult($stmt,"PHOTO"), ENT_QUOTES, 'UTF-8');
               
    	       
			
			$output[] = '<tr>';
			$output[] = '<tr>';
			$output[] = '<tr>';
			
			
			$output[] = '<tr>';
			$output[]='<td><img src=\'images/'.$photo.'\'height="70" width="70"/></td>';
			$output[] = '<td>'.$title.'</td>';
			$output[] = '<td><input type="text"  name="qty'.$id.'" value="'.$qty.'" size="3" maxlength="3" /></td>';
		
			
			$output[] = '<td>AU$ '.($price * $qty).'</td>';
			$output[] = '<td><a href="order1.php?action=delete&id='.$id.'" class="r">Remove</a></td>';
			$money=$price * $qty;
			$postage += 10 * $qty;
			$packing +=5 *$qty;
			$total += $price * $qty +$postage +$qty;
			
			$output[] = '</tr>';
			
			}
		}
		$_SESSION['total']=$total;
	    $_SESSION['title']=$title;
		$output[] = '</table>';
		$output[] = '<p style=float:right>Postage charge: <strong>AU $'.$postage.'</strong><br/><br/>
		            Packing charge: <strong>AU $'.$packing.'</strong><br/><br/>
					 Grand total: <strong>AU $'.$total.'</strong></p><br/><br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[]='<br/>';
		$output[] = '<div><input type="button" class="register" value="Back"style=float:left onclick=window.location.href=\'cart.php\' /></div>';
		$output[] = '<div><input type="submit" class="register" value="Update"style=float:right /></div>';
		$output[] = '</form>';
	} else {
		$output[] = '<p><h4>You shopping cart is empty, please select your products.</h4></p>';
		$output[] = '<div><input type="button" class="register" value="Select"style=float:left onclick=window.location.href=\'category.html\' /></div>';
		
	}
	return join('',$output);
}



function showCart2() {
    $name= $_SESSION['username1'];
    $email= $_SESSION['email'] ;
    $phone= $_SESSION['phone'] ;
    $unit= $_SESSION['unit'] ;
	$street= $_SESSION['street'] ;
	$city= $_SESSION['city'] ;
	$country= $_SESSION['country'];
	$code= $_SESSION['code'] ;
	
	//assignment 3
    //salted md5 to encrypt the credit number before insert into the database
	$credit= $_SESSION['credit'];
	// md5, credit number
	$credit1 = md5($salt.$credit);

	$expire= $_SESSION['expire'];
	$card= $_SESSION['card'];
	global $db;
	$cart = $_SESSION['cart'];
	$username = $_SESSION['username'];
	
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		
	
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM catalog WHERE id = '.$id;
			
			// modified by Zhang			
			$stmt = OCIParse($db, $sql); 
  
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			@OCIExecute($stmt); 
            
			while(@OCIFetch($stmt)) {
                //assignment 3
                // use HTML Entities to convert php special characters from the database.
				$title= htmlentities(OCIResult($stmt,"TITLE"), ENT_QUOTES, 'UTF-8');
				
				$price = htmlentities(OCIResult($stmt,"PRICE"), ENT_QUOTES, 'UTF-8');
				$id= htmlentities(OCIResult($stmt,"ID"), ENT_QUOTES, 'UTF-8');
                				
				$photo=	htmlentities(OCIResult($stmt,"PHOTO"), ENT_QUOTES, 'UTF-8');
               
			$money=$price * $qty;
			$REQUESTage += 10 * $qty;
			$packing +=5 *$qty;
			$total += $price * $qty +$REQUESTage +$qty;
			
			
			$now= date('Y-m-d H:i:s');
			$date=date("Ymd");
			include('conn.php');
			//insert the order information to the database
			 $sq = "INSERT INTO orderinfor VALUES( id.nextval,'$username','$name','$email','$phone','$title','$qty','$money','$now',to_date('".$date."','YYYYMMDD'),'$unit','$street','$city','$country','$code','$credit1','$expire','$card','$photo')";
		    
			 $stmt1 = OCIParse($db, $sq);
			 @OCI_Execute($stmt1);
			}
		}
		
		
	} 
	

}
function showCart3() {

	global $db;
	$cart = $_SESSION['cart'];
	if ($cart) {
		$items = explode(',',$cart);
		$contents = array();
		foreach ($items as $item) {
			$contents[$item] = (isset($contents[$item])) ? $contents[$item] + 1 : 1;
		}
		$output[] = '<form action="cart.php?action=update" method="REQUEST" id="cart">';
		
		foreach ($contents as $id=>$qty) {
		
			$sql = 'SELECT * FROM catalog WHERE id = '.$id;
						
			$stmt = OCIParse($db, $sql); 
			if(!$stmt)  {
				echo "An error occurred in parsing the sql string.\n"; 
				exit; 
			  }
			@OCIExecute($stmt); 

			while(@OCIFetch($stmt)) {
                 //assignment 3
                 // use HTML Entities to convert php special characters from the database.
				$title= htmlentities(OCIResult($stmt,"TITLE"), ENT_QUOTES, 'UTF-8');
				
				$price = htmlentities(OCIResult($stmt,"PRICE"), ENT_QUOTES, 'UTF-8');
				$id = htmlentities(OCIResult($stmt,"ID"), ENT_QUOTES, 'UTF-8');				
			}
			$REQUESTage += 10 * $qty;
			$packing +=5 *$qty;
			$total += $price * $qty +$REQUESTage +$qty;
			
			
			
		}
		echo'|<span class="red">TOTAL:'.$total.'$</span>';
	} 
	else
	{
	echo'|<span class="red">TOTAL:0$</span>';
	}
	return @join('',$output);
}

?>
