
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Iphone Shop</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="http://www.iiwnet.com/templets/niu/js/jquery.min.js"></script>
<script type="text/javascript" src="js/username.js"></script> 
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/sugestion.js"></script>
<script type="text/javascript" src="js/items.js"></script>
<script type="text/javascript">


function InputCheck(RegForm)
{
  if (RegForm.username.value == "")
  {
    alert("the username should not be empty!");
    RegForm.username.focus();
    return (false);
  }
  if (RegForm.password.value == "")
  {
    alert("you must fill in the password!");
    RegForm.password.focus();
    return (false);
  }
  
}


</script>

</head>
<body onload="loadXMLDoc();loadXMLDoc1()">
<div id="wrap">

       <div class="header">
	   <!--add the search form -->
	   <form  action="" id="fn" name="fn" style="float:right"> 
				<div> 

				<input type="text" size="26" value="" id="inputString" onkeyup="lookup(this.value);" onblur="fill();" />
				 <input type="button" value="search" onclick="goto()"/>
				</div> 
				<div class="suggestionsBox" id="suggestions" style="display: none;"> 

				<div class="suggestionList" id="autoSuggestionsList"> 

				</div> 
				</div> 
       </form>
       		<div class="logo"><a href="ass3.html"><img src="images/logo.gif" alt="" title="" border="0" /></a></div>            
        <div id="menu">
            <ul>                                                                       
            <li><a href="ass3.html">home</a></li>
            <li class="divider"></li>
            <li><a href="about.html">about us</a></li>
            <li class="divider"></li>
            <li><a href="category.html">parts</a></li>
            <li class="divider"></li>
            <li><a href="specials.html">premium parts</a></li>
            <li class="divider"></li>
            <li class="selected"><a href="myaccount.html">my accout</a></li>
            <li class="divider"></li>
            <li><a href="register.html">register</a></li>
            <li class="divider"></li>
            <li><a href="details.php">prices</a></li>
            <li class="divider"></li>
            <li><a href="contact.php">contact</a></li>

            </ul>
        </div>   
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>My account</div>
        
        	<div class="feat_prod_box_details">
            
            
              	<div class="contact_form">
                <div class="form_subtitle">Search Result</div>
                
						<?php 
						//assignment 3
                         // use HTML Entities to convert php special input characters.
						$q=htmlentities($_GET["p"], ENT_QUOTES, 'UTF-8');
                        if($q=="")
						echo 'There are no relevent products';
						else{
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

							// looking for the information begin with user's input
							$sql	=	"SELECT * FROM ".$SQL_FROM." WHERE ".$SQL_WHERE." LIKE '".$q."%'";
								
							$stmt = OCIParse($db, $sql); 
						  
							if(!$stmt)  {
								echo "An error occurred in parsing the sql string.\n"; 
								exit; 
							  }
							OCIExecute($stmt); 
							OCIFetch($stmt);
							//assignment 3
                            // use HTML Entities to convert php special characters from the database.
							$id = htmlentities(OCIResult($stmt,"ID"), ENT_QUOTES, 'UTF-8');
                            if($id=="")
							{
							echo 'There are no relevent products';
							}
							else{
							OCIExecute($stmt);
							echo '<table border=\'1\'>';
							echo '<th> Product picture</th>';
							echo '<th> Title</th>';
							echo'<th> price</th>';
							echo'<th> order</th>';
							
							while(OCIFetch($stmt))
			                 {
							//assignment 3
                            // use HTML Entities to convert php special characters from the database.
			                $photo= htmlentities(OCIResult($stmt,"PHOTO"), ENT_QUOTES, 'UTF-8');
							$title= htmlentities(OCIResult($stmt,"TITLE"), ENT_QUOTES, 'UTF-8');
							$price= htmlentities(OCIResult($stmt,"PRICE"), ENT_QUOTES, 'UTF-8');
							$id = htmlentities(OCIResult($stmt,"ID"), ENT_QUOTES, 'UTF-8');
							$url = htmlentities(OCIResult($stmt,"URL"), ENT_QUOTES, 'UTF-8');
							echo'<tr>';
							echo'<td><img src=\'images/'.$photo.'\'height="70" width="70"/></td>';
							echo'<td>'.$title.'</td>';
							echo'<td>$ '.$price.'</td>';
							echo '<td><a href="'.$url.'">details</a></td>';
							echo'</tr>';
						   
						   }
						   echo'</table>';
	}
		
	}
?>
                    
                </div>  
            
            </div>	
            
              

            

            
        <div class="clear"></div>
        </div><!--end of left content-->
        
        <div class="right_content">
        
               	<div class="languages_box">
            <span class="red">Languages:</span>
            <a href="#"><img src="images/au.gif" width="16" height="11" alt="AU" title="" border="0" /></a>
                        </div>
                <div class="currency">
                <span class="red">Currency: </span>
                <a href="#"><strong>AUD</strong></a>
                </div>
				<div class="currency">
				<!--display the username of the user if logged -->
				<h3>
                <span class="red" id="myDiv" style="color:red"> </span>
				</h3>
				</div>
                
                
                
              <div class="cart">
                  <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
                  <!--display the total prices and items -->
				  <div class="home_cart_content" id="cart">
                 
                  </div>
                  <a href="cart.php" class="view_cart">view cart</a>
              
              </div>
        
             <div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Shop</div> 
             <div class="about">
             <p>
             <img src="images/about.gif" alt="" title="" class="right" />
            Welcome to our shopping center, here you can find either hot products or new products, our shop are including Apple, Sumang,HTC, and Nokiacontain phone, phone relevent products such as Charge Cable, Bluetooth, Wallet, etc. hopping you can have a happy visit in out shopping website.
             </p>
             
             </div>
             
             <div class="right_box">
             
             	<div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>Promotions</div> 
                    <div class="new_prod_box">
                        <a href="apple-Bluetooth Headset.php">Bluetooth Headset</a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>
                        <a href="apple-Bluetooth Headset.php"><img src="images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a>
                        </div>           
                    </div>
                    
                    <div class="new_prod_box">
                        <a href="apple -Charge Sync Cable.php">Charge Sync Cable</a>
                        <div class="new_prod_bg">
                        <span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>
                        <a href="apple -Charge Sync Cable.php"><img src="images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a>
                        </div>           
                    </div>                    
                    
                                  
             
             </div>
             
             <div class="right_box">
             
             	<div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div> 
                
                <ul class="list">
                <li><a href="#">accesories</a></li>
                <li><a href="#">premium parts</a></li>
                <li><a href="#">specials</a></li>
                <li><a href="#">best deals</a></li>
                </ul>
                
             	<div class="title"><span class="title_icon"><img src="images/bullet6.gif" alt="" title="" /></span>Partners</div> 
                
                <ul class="list">
                <li><a href="#">Apple</a></li>
                <li><a href="#">Samsung</a></li>
                <li><a href="#">Nokia</a></li>
                <li><a href="#">Motorola</a></li>
                </ul>      
                 
                
			            
             </div>   <!--Added the Catalog can link to the Catalog.xml Linshan Zhang at 26/07/2012-->       
        
        </div><!--end of right content-->
        
        
       
       
       <div class="clear"></div>
       </div><!--end of center content-->
       
              
       <div class="footer">
       	<div class="left_footer"><img src="images/footer_logo.gif" alt="" title="" /><br /> <a href="http://csscreme.com/freecsstemplates/" title="free css templates"><img src="images/csscreme.gif" alt="free css templates" border="0" /></a></div>
        <div class="right_footer">
        <a href="#">home</a>
        <a href="#">about us</a>
        <a href="#">services</a>
        <a href="#">privacy policy</a>
        <a href="#">contact us</a>
       
        </div>
        
       
       </div>
    �Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT203: Web Programming. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY</div>
    <!--Added the statement  Linshan ZHANG at 26/07/2012 -->


</body>
</html>



