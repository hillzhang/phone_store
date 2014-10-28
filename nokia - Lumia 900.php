
<?php
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');
// Start the session
session_start();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Iphone Shop</title>
<link rel="stylesheet" type="text/css" href="style.css" />
	<link rel="stylesheet" href="lightbox.css" type="text/css" media="screen" />
	<script type="text/javascript" src="http://www.iiwnet.com/templets/niu/js/jquery.min.js"></script>
<script type="text/javascript" src="js/username.js"></script>
<script type="text/javascript" src="js/search.js"></script>	
<script type="text/javascript" src="js/sugestion.js"></script>
<script type="text/javascript" src="js/items.js"></script>
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
            <li class="selected"><a href="ass3.html">home</a></li>
            <li class="divider"></li>
            <li><a href="about.html">about us</a></li>
            <li class="divider"></li>
            <li><a href="category.html">parts</a></li>
            <li class="divider"></li>
            <li><a href="specials.html">premium parts</a></li>
            <li class="divider"></li>
            <li><a href="myaccount.html">my accout</a></li>
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
        	<div class="crumb_nav">
            <a href="ass3.html">home</a> &gt;&gt; product name
            </div>
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Nokia Lumia 900.jpg</div>
        
        	<div class="feat_prod_box_details">
            
            	<div class="prod_img"><a href="nokia - Lumia 900.php"><img src="images/Nokia Lumia 900.jpg" alt="" title="" border="0" /></a>
                <br /><br />
                <a href="images/big_pic.jpg" rel="lightbox"><img src="images/zoom.gif" alt="" title="" border="0" /></a>
                </div>
                
                <div class="prod_det_box">
                	<div class="box_top"></div>
                    <div class="box_center">
                    <div class="prod_title">Details</div>
                    <p class="details">
Nokia Lumia 900 is a Windows Phone-powered smartphone, first unveiled on January 9, 2012 by Nokia at Consumer Electronics Show 2012, where it won the Best Smartphone award in January 2012.[4] The phone has 4G LTE support and was released in April, 2012. Nokia Lumia 900 has a 4.3? (109 mm) display and a ClearBlack AMOLED 800×480 capacitive touchscreen. It also features a one-piece polycarbonate body and is available in magenta, black, cyan and white.[5



</p>
                    <div class="price"><strong>PRICE:</strong> <span class="red">100 $</span></div>
                    <div class="price"><strong>COLORS:</strong> 
                    <span class="colors"><img src="images/color1.gif" alt="" title="" border="0" /></span>
                    <span class="colors"><img src="images/color2.gif" alt="" title="" border="0" /></span>
                    <span class="colors"><img src="images/color3.gif" alt="" title="" border="0" /></span>                    </div>
                   
					<?php
  
						$sql = "SELECT * FROM catalog WHERE title='nokia - Lumia 900'";

						$stmt = OCIParse($db, $sql); 
						  
						if(!$stmt)  {
							echo "An error occurred in parsing the sql string.\n"; 
							exit; 
						  }
						OCIExecute($stmt); 

						while(OCIFetch($stmt)) {
                             //assignment 3
                            // use HTML Entities to convert php special characters from the database.
							$title= htmlentities(OCIResult($stmt,"TITLE"), ENT_QUOTES, 'UTF-8'); 
							$price = htmlentities(OCIResult($stmt,"PRICE"), ENT_QUOTES, 'UTF-8'); 
							$id = htmlentities(OCIResult($stmt,"ID"), ENT_QUOTES, 'UTF-8'); 
							
						}
						echo '<a href="cart.php?action=add&id='.$id.'"><img src="images/order_now.gif" alt="" title="" border="0"/></a>';
           ?>
		   
            </div>	
            
                </div> 
              <div class="clear"></div>
            </div>
            
              
            <div id="demo" class="demolayout">

                <ul id="demo-nav" class="demolayout">
                <li><a class="active" href="#tab1">More details</a></li>
                <li><a class="" href="#tab2">Related products</a></li>
                </ul>
    
            <div class="tabs-container">
            
                    <div style="display: block;" class="tab" id="tab1">
                                        <p class="more_details">Features: 








                                        </p>
                            <ul class="list">
                            <li><a href="#">Latest version of Flip to silence - Silence incoming calls by turning your phone face down.
</a></li>
                            <li><a href="#">Download new apps from Marketplace, such as the Contacts Share app to send and receive business cards as text messages.
</a></li>
                            <li><a href="#">Enhanced sensitivity for proximity sensor performance
</a></li>
                                                        <li><a href="#">Improvement to your phone's screen colours in low light
</a></li>             
                            </ul>
                                         <p class="more_details">
                                        </p>                           
                    </div>	
                    
            
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
				
				<h3>
                <span class="red" id="myDiv" style="color:red"> </span>
				</h3>
				</div>
                
                
              <div class="cart">
                  <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
                 
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
    ©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT203: Web Programming. Therefore it is not part of the University's authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY</div>
    <!--Added the statement  Linshan ZHANG at 26/07/2012 -->


</body>

</html>