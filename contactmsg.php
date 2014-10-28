<?php
	session_start();
	$name=$_SESSION['name'];
	$email=$_SESSION['email'];
	$phone=$_SESSION['phone'];
	$company=$_SESSION['company'];
	$message=$_SESSION['message'];
	$username=$_SESSION['username'];
	if(isset($_REQUEST['submit'])){
	if($username=="")
	{
	echo"<script type='text/javascript'>alert('You haven\'t login, please login before continue!!');location='myaccount.html';</script>";
	exit;
	}
	else
	{
	   include('inc/global-connect.inc.php');
	   $sq = "INSERT INTO contact VALUES( id.nextval,'$username','$name','$email','$phone','$company','$message')";
	   $stmt1 = OCIParse($db, $sq);
		OCI_Execute($stmt1);
		echo"<script type='text/javascript'>alert('Thank you for contacting us, we will call you back soon!!');location='ass3.html';</script>";
		exit; 
		}
	}
         
?>


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

</head>
<body onload="loadXMLDoc();loadXMLDoc1()">
<div id="wrap">

       <div class="header">
	   <!--addt he search form -->
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
            <li><a href="myaccount.html">my accout</a></li>
            <li class="divider"></li>
            <li><a href="register.html">register</a></li>
            <li class="divider"></li>
            <li><a href="details.php">prices</a></li>
            <li class="divider"></li>
            <li class="selected"><a href="contact.php">contact</a></li>
            </ul>
        </div>     
            
            
       </div> 
       
       
       <div class="center_content">
       	<div class="left_content">
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Contact Us</div>
        
        	<div class="feat_prod_box_details">
            <p class="details">
             Thank you for contact us, if you have any advises, please contact us without any hesitation, we will enhance our servers as soon as possible.
            </p>
            <form method="post" action="contactmsg.php"name="form2" id="form2">
              	<div class="contact_form">
                <div class="form_subtitle">Check the information</div>    
                     <?php
					 echo '<h2>';
					 echo 'name:'.$name.'<br/><br/>';
					 
					 echo 'email:'.$email.'<br/><br/>';
					 
					 echo 'phone:'.$phone.'<br/><br/>';
					 
					 echo 'company:'.$company.'<br/><br/>';
					
					 echo 'message:'.$message.'<br/><br/>';
					 echo'</h2>';
					 
					 ?>
					 
					 
                    <div class="form_row">
                    <input type="submit" id="submit" name="submit" value="submit" class="register"></input>                 
					</div>    
                  			
 				
                </div>  
            </form>
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
				<!--display the username of user if logged -->
				<h3>
                <span class="red" id="myDiv" style="color:red"> </span>
				</h3>
				</div>
                
                
              <div class="cart">
                  <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
                  <!--display the total items and prices  -->
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
             
                      
             
             </div>    <!--Added the Catalog can link to the Catalog.xml Linshan Zhang at 26/07/2012-->       
        
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