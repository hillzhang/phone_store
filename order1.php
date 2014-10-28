<?php
         //session start
		 @session_start();
		 //connect to the darabase
		 include('conn.php');
				 $sql= "select * from us where username='$username'";
			     $stmt = OCIParse($db, $sql);
				 //execute the sql atatement
				 OCIExecute($stmt);
				 OCIFetch($stmt);
				 //assignment 3
				 // use HTML Entities to convert php special characters from the database.
				 $email= htmlentities(OCIResult($stmt,"EMAIL"), ENT_QUOTES, 'UTF-8');
                 $phone= htmlentities(OCIResult($stmt,"PHONE"), ENT_QUOTES, 'UTF-8');
                 $city= htmlentities(OCIResult($stmt,"CITY"), ENT_QUOTES, 'UTF-8');
                 $country= htmlentities(OCIResult($stmt,"COUNTRY"), ENT_QUOTES, 'UTF-8');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252" />
<title>Iphone Shop</title>

<link rel="stylesheet" type="text/css" href="style.css" />
<script type="text/javascript" src="js/ajax_navagation.js"></script>
<script type="text/javascript" src="http://www.iiwnet.com/templets/niu/js/jquery.min.js"></script> 
<script type="text/javascript" src="js/username.js"></script> 
<script type="text/javascript" src="js/search.js"></script>
<script type="text/javascript" src="js/sugestion.js"></script>
<script type="text/javascript" src="js/InputCheck.js"></script>
<script type="text/javascript" src="js/check.js"></script>
<style type="text/css">
.err{color:#ff0000;}
.ok{color:#009900;}
</style>
</head>

<body onload="loadXMLDoc()">
<div id="wrap">

       <div class="header">
	   <!-- add the search form --> 
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
	   <!--search form end --> 
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
       	<div class="left_content" >
            <div class="title"><span class="title_icon"><img src="images/bullet1.gif" alt="" title="" /></span>Order form</div>
        
        	<div class="feat_prod_box_details">
			 <?php
			//gain the values of the input text and check if all the input information are passing the validation
			if(isset($_REQUEST['submit'])){
			//assignment 3
			// use of HTML Entities to convert php special input characters.
			$_SESSION['username1'] = htmlentities($_REQUEST['username'], ENT_QUOTES, 'UTF-8');
			$_SESSION['email'] = htmlentities($_REQUEST['email'], ENT_QUOTES, 'UTF-8');
			$_SESSION['phone'] = htmlentities($_REQUEST['tel'], ENT_QUOTES, 'UTF-8');
			$_SESSION['unit'] = htmlentities($_REQUEST['number'], ENT_QUOTES, 'UTF-8');
			$_SESSION['street'] = htmlentities($_REQUEST['sname'], ENT_QUOTES, 'UTF-8');
            $_SESSION['city'] = htmlentities($_REQUEST['city'], ENT_QUOTES, 'UTF-8');
			$_SESSION['country'] = htmlentities($_REQUEST['coun'], ENT_QUOTES, 'UTF-8');
			$_SESSION['code'] = htmlentities($_REQUEST['pc'], ENT_QUOTES, 'UTF-8');
			$_SESSION['credit'] = htmlentities($_REQUEST['cnum'], ENT_QUOTES, 'UTF-8');
			$_SESSION['expire'] = htmlentities($_REQUEST['exdate'], ENT_QUOTES, 'UTF-8');
			$_SESSION['card'] = htmlentities($_REQUEST['hname'], ENT_QUOTES, 'UTF-8');
			
			if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['username1'])||
			   !preg_match("/^[a-z0-9-_.]+@[\da-z][\.\w-]+\.[a-z]{2,4}$/i", $_SESSION['email'])||
               !ereg("^[0-9]{10}$", $_SESSION['phone'])||
			   !ereg("^[0-9]+$", $_SESSION['unit'])||
               !preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['street'])||
				!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['city'])||
				!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['country'])||
				!ereg("^[0-9]{4}$", $_SESSION['code'])||
				!ereg("^[0-9]{16}$", $_SESSION['credit'])||
				!ereg("^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$", $_SESSION['expire'])||
				!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['card']))

              {
				// if some information don't passt he validation, relevant error information will display in aspecific area.
			   echo'<div class="contact_form">';
                echo'<div class="form_subtitle">products </div>';          
                
            	echo'<div id="contents">';
                include("inc/global-connect.inc.php");
				include("inc/functions.inc.php");
				include('inc/cart1.php');
				echo showCart1();
				echo '</div>';  
				echo '</div>';
				echo '<div class="contact_form">';
			   echo'<div class="form_subtitle">Error</div>';
			   // if the input information is incorrect the error information will display in the aimed area;
			   if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['username1']))
			   echo'<div style=color:red>the "name" is incorrect</div>';
			  
			   if(!preg_match("/^[a-z0-9-_.]+@[\da-z][\.\w-]+\.[a-z]{2,4}$/i", $_SESSION['email']))
			   echo'<div style=color:red>the "email" is incorrect</div>';
			   
			   if(!ereg("^[0-9]{10}$", $_SESSION['phone']))
			   echo'<div style=color:red>the "phone number" is incorrect</div>';
			   
			   if(!ereg("^[0-9]+$", $_SESSION['unit']))
			   echo'<div style=color:red>the "unit number" is incorrect</div>';
			   
			   if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['street']))
			   echo'<div style=color:red>the "street name" is incorrect</div>';
			   
			   if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['city']))
			   echo'<div style=color:red>the "city name" is incorrect</div>';
			   
			   if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['country']))
			   echo'<div style=color:red>the "country name" is incorrect</div>';
			   
			   if(!ereg("^[0-9]{4}$", $_SESSION['code']))
			   echo'<div style=color:red>the "REQUESTcode" is incorrect</div>';
			   
			   if(!ereg("^[0-9]{16}$", $_SESSION['credit']))
			   echo'<div style=color:red>the "credit number" is incorrect</div>';
			   
			   if(!ereg("^[0-9]{2}\-[0-9]{2}\-[0-9]{4}$", $_SESSION['expire']))
			   echo'<div style=color:red>the "expire date" is incorrect</div>';
			   
			   if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $_SESSION['card']))
			   echo'<div style=color:red>the "card holder name" is incorrect</div>';
			
				echo'</div>';
              	
				echo '<div class="contact_form">';
                echo'<div class="form_subtitle">customer contact details </div>';          
                  echo'<form name="RegForm" method="post" action="order1.php" onSubmit="return InputCheck(this)">';
					echo'<div class="form_row">';
                   echo'<label class="contact"><strong>Name:</strong></label>';
                    echo'<input type="text"  class="contact_input" name="username" id="username1"value="'.$_SESSION['username1'].'" onblur="ckurname(this.value)">';  
					echo'<span id="urnamemsg" class="err">*</span>';
                    echo'</div>';  
                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>Email:</strong></label>';
                    echo'<input type="text" value="'. $_SESSION['email'].'" class="contact_input" name="email" id="email"onblur="ckemail(this.value)" />';
					echo'<span id="emailmsg"class="err">*</span>';
				   echo'</div>';

                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>Phone:</strong></label>';
					
                    echo '<input type="text"value="'.$_SESSION['phone'].'" class="contact_input" name="tel" id="tel"onblur="cktel(this.value)"/>';
					  echo'<span id="telmsg" class="err">*</span>';
					  echo'<div>(in format 0414321206)</div>';
					echo'</div>';
                       
                echo'</div>';  
            
		  echo'<div class="contact_form" >';
                echo'<div class="form_subtitle">delivery address</div>';          
                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>unit number:</strong></label>';
                    echo'<input type="text" class="contact_input" name="number" id="number" value="'.$_SESSION['unit'].'" onblur="cknumber(this.value)" />';
                    echo'<span id="numbermsg"class="err">*</span>';
				   echo'</div>';  

                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>street name:</strong></label>';
                    echo'<input type="text" class="contact_input" name="sname" id="sname" value="'.$_SESSION['street'].'"onblur="cksname(this.value)"/>';
                   echo'<span id="snamemsg"class="err">*</span>';
				   echo'</div>';
                    echo'<div class="form_row">';
                       echo'<label class="contact"><strong>city:</strong></label>';
					  
                       echo '<input type="text" value="'.$_SESSION['city'].'"class="contact_input" name="city" id="city" onblur="ckcity(this.value)"/>';
                   
				   echo'<span id="citymsg"class="err">*</span>';
					echo'</div> '; 
                    echo'<div class="form_row">';
                       echo'<label class="contact"><strong>country:</strong></label>';
					   
                       echo'<input type="text"value="'.$_SESSION['country'].'" class="contact_input" name="coun" id="coun" onblur="ckcoun(this.value)"/>';
                    
					 echo'<span id="counmsg"class="err">*</span>';
					echo'</div>';
                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>code:</strong></label>';
                    echo'<input type="text" class="contact_input" name="pc" id="pc" value="'.$_SESSION['code'].'"onblur="ckpc(this.value)"/>';
                    echo'<span id="pcmsg"class="err">*</span>';
					echo'</div>';
                    
                         
                echo'</div>';  
          
              echo'<div class="contact_form">';
                echo'<div class="form_subtitle">payment methods </div>';          
                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>credit card number:</strong></label>';
                    echo'<input type="text" class="contact_input" name="cnum" id="cnum" value="'.$_SESSION['credit'].'" onblur="ckcnum(this.value)"/>';
                    echo'<span id="cnummsg"class="err">*</span>';
					echo'</div>';  

                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>expiry date:(in format 01-01-2012)</strong></label>';
                    echo'<input type="text" class="contact_input" name="exdate" id="exdate" value="'.$_SESSION['expire'].'" onblur="ckexdate(this.value)"/>';
                    echo'<span id="exdatemsg"class="err">*</span>';
					echo'</div>';


                    echo'<div class="form_row">';
                    echo'<label class="contact"><strong>card holder name:</strong></label>';
                    echo'<input type="text" class="contact_input" name="hname"id="hname" value="'.$_SESSION['card'].'"onblur="ckhname(this.value)"/>';
                    echo'<span id="hnamemsg"class="err">*</span>';
					echo'</div>';
                    
					echo'<div class="form_row">';
                    echo'<input type="submit" name="submit" class="register" value="submit" onclick="loadXMLDoc()"/>';
              					
					echo'</div>'; 
                       
                 
                echo'</div>';    
   echo'</form>';
   
		}
	
		else{  
		// if all the input information are passing the validation, a reponse will return to user and check if all the information
		// are correct before submit
				include("inc/global-connect.inc.php");
				include("inc/functions.inc.php");
				include('inc/cart1.php');
		echo '<div class="contact_form">';
		    
			echo'<div class="form_subtitle">Please check your information </div>';
			echo'</br>';
			echo '<h4>';
			echo'Total money: $'.$_SESSION['total'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Name  :'.$_SESSION['username'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Email  :'.$_SESSION['email'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Phone  :'.$_SESSION['phone'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Unit bumber  :'.$_SESSION['phone'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Street name  :'.$_SESSION['street'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'City:'.$_SESSION['city'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Code number  :'.$_SESSION['code'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Credit card number  :'.$_SESSION['credit'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Expire date  :'.$_SESSION['expire'];
			echo '</h4>';
			echo'</br>';
			echo '<h4>';
			echo'Holder name  :'.$_SESSION['card'];
			echo '</h4>';
			echo'</br>';
			
			echo'<input type="button" class="register" value="reset" onclick="window.location.href=\'order1.php\'"/>';
			echo'<input type="submit" class="register" name="submit" id="submit" value="submit" onclick="window.location.href=\'success.php\'"/>';
			
			echo'</div>';
		
}
 
        echo'<div class="clear"></div>';
        echo'</div><!--end of left content-->';
		echo'</div>';
		
        echo'<div class="right_content">';
        
                	echo'<div class="languages_box">';
            echo'<span class="red">Languages:</span>';
            echo'<a href="#"><img src="images/au.gif" width="16" height="11" alt="AU" title="" border="0" /></a>';
                        echo'</div>';
                echo'<div class="currency">';
                echo'<span class="red">Currency: </span>';
                echo'<a href="#"><strong>AUD</strong></a>';
                echo'</div>';
                echo'<div class="currency">';
				echo'<h3>';
               echo' <span class="red" id="myDiv" style="color:red"> </span>';
				echo'</h3>';
				echo'</div>';
                
                
              echo'<div class="cart">';
                  echo'<div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>';
                  echo'<div class="home_cart_content">';
				  
                       echo writeShoppingCart();
					
                        echo showCart3();
						echo'</div>';
                  
                  echo'<a href="cart.php" class="view_cart">view cart</a>';
              
              echo'</div>';
        
             echo'<div class="title"><span class="title_icon"><img src="images/bullet3.gif" alt="" title="" /></span>About Our Shop</div>';
             echo'<div class="about">';
             echo'<p>';
             echo'<img src="images/about.gif" alt="" title="" class="right" />';
             echo'Welcome to our shopping center, here you can find either hot products or new products, our shop are including Apple, Sumang,HTC, and Nokia';
             echo'</p>';
             
             echo'</div>';
             
             echo'<div class="right_box">';
             
             	echo'<div class="title"><span class="title_icon"><img src="images/bullet4.gif" alt="" title="" /></span>Promotions</div> ';
                   echo' <div class="new_prod_box">';
                        echo'<a href="apple-Bluetooth Headset.php">Bluetooth Headset</a>';
                        echo'<div class="new_prod_bg">';
                        echo'<span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>';
                        echo'<a href="apple-Bluetooth Headset.php"><img src="images/thumb1.gif" alt="" title="" class="thumb" border="0" /></a>';
                        echo'</div>';           
                    echo'</div>';
                    
                    echo'<div class="new_prod_box">';
                        echo'<a href="apple -Charge Sync Cable.php">Charge Sync Cable</a>';
                        echo'<div class="new_prod_bg">';
                        echo'<span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>';
                        echo'<a href="apple -Charge Sync Cable.php"><img src="images/thumb2.gif" alt="" title="" class="thumb" border="0" /></a>';
                        echo'</div>';           
                    echo'</div> ';                   
                    
                    echo'<div class="new_prod_box">';
                        echo'<a href="apple -Wallet Clutch Case .php">Wallet Clutch</a>';
                        echo'<div class="new_prod_bg">';
                        echo'<span class="new_icon"><img src="images/promo_icon.gif" alt="" title="" /></span>';
                        echo'<a href="apple -Wallet Clutch Case .php"><img src="images/thumb3.gif" alt="" title="" class="thumb" border="0" /></a>';
                        echo'</div>';           
                   echo'</div>';                
             
             echo'</div>';
             
             echo'<div class="right_box">';
             	echo'<div class="title"><span class="title_icon"><img src="images/bullet5.gif" alt="" title="" /></span>Categories</div>'; 
                
                echo'<ul class="list">';
                echo'<li><a href="#">accesories</a></li>';
                echo'<li><a href="#">premium parts</a></li>';
                echo'<li><a href="#">specials</a></li>';
                echo'<li><a href="#">best deals</a></li>';
                echo'</ul>';
                
             	echo'<div class="title"><span class="title_icon"><img src="images/bullet6.gif" alt="" title="" /></span>Partners</div>'; 
                
                echo'<ul class="list">';
                echo'<li><a href="#">Apple</a></li>';
                echo'<li><a href="#">Samsung</a></li>';
                echo'<li><a href="#">Nokia</a></li>';
                echo'<li><a href="#">Motorola</a></li>';
                echo'</ul> ';     
             
         
        echo'</div><!--end of right content-->';
        
        echo'</div>';
       
       
       echo'<div class="clear"></div>';
       echo'</div><!--end of center content-->';
       
              
       echo'<div class="footer">';
       	echo'<div class="left_footer"><img src="images/footer_logo.gif" alt="" title="" /><br /> <a href="http://csscreme.com/freecsstemplates/" title="free css templates"><img src="images/csscreme.gif" alt="free css templates" border="0" /></a></div>';
        echo'<div class="right_footer">';
        echo'<a href="#">home</a>';
        echo'<a href="#">about us</a>';
        echo'<a href="#">services</a>';
        echo'<a href="#">privacy policy</a>';
        echo'<a href="#">contact us</a>';
       
        echo'</div>';
        
       
       echo'</div>';
   echo' ©Deakin University, School of Information Technology. This web page has been developed as a student assignment for the unit SIT203: Web Programming. Therefore it is not part of the University\'s authorised web site. DO NOT USE THE INFORMATION CONTAINED ON THIS WEB PAGE IN ANY WAY</div>';
    

echo'</body>';
echo'</html>';
 die( "</body></html>" ); 
}			
	?>		
			
	<div style="color:red"><h5> Field with * need to be field in properly.</h5></div>
		
                <div class="contact_form">
                <div class="form_subtitle">products </div>          
           
            	<div id="contents">
                <!--represent the shopping information in the order form -->
				<?php
				include("inc/global-connect.inc.php");
				include("inc/functions.inc.php");
				include('inc/cart1.php');
				echo showCart1();
				?>
				</div>  
				</div>
				<form name="RegForm" method="post" action="order1.php" onSubmit="return InputCheck(this)">
              	<div class="contact_form">
				
                <div class="form_subtitle">customer contact details </div>     
                				
                  
					<div class="form_row">
                    <label class="contact"><strong>Name:</strong></label>
                    <input type="text"  class="contact_input" name="username" id="username1" onblur="ckurname(this.value)"/>  
					<span id="urnamemsg" class="err">*</span>
                    </div>  
                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
					<!--auto-filled the shipping address -->
					<?php
                    echo'<input type="text" value="'.$email.'" class="contact_input" name="email" id="email"onblur="ckemail(this.value)" />';
                    ?>
					<span id="emailmsg"class="err">*</span>
				   </div>
                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
					<?php
                    echo '<input type="text"value="'.$phone.'" class="contact_input" name="tel" id="tel"onblur="cktel(this.value)"/>'
                      ?>
					  <span id="telmsg" class="err">*</span>
					  <div>(in format 0414321206)</div>
					</div>
                </div>  
		  <div class="contact_form" >
                <div class="form_subtitle">delivery address</div>          
                    <div class="form_row">
                    <label class="contact"><strong>unit number:</strong></label>
                    <input type="text" class="contact_input" name="number" id="number" onblur="cknumber(this.value)" />
                    <span id="numbermsg"class="err">*</span>
				   </div>  

                    <div class="form_row">
                    <label class="contact"><strong>street name:</strong></label>
                    <input type="text" class="contact_input" name="sname" id="sname" onblur="cksname(this.value)"/>
                   <span id="snamemsg"class="err">*</span>
				   </div>
                    <div class="form_row">
                       <label class="contact"><strong>city:</strong></label>
					   <?php
                       echo '<input type="text" value="'.$city.'"class="contact_input" name="city" id="city" onblur="ckcity(this.value)"/>';
                   ?>
				   <span id="citymsg"class="err">*</span>
					</div>  
                    <div class="form_row">
                       <label class="contact"><strong>country:</strong></label>
					   <?php
                       echo'<input type="text"value="'.$country.'" class="contact_input" name="coun" id="coun" onblur="ckcoun(this.value)"/>';
                     ?>
					 <span id="counmsg"class="err">*</span>
					</div>
                    <div class="form_row">
                    <label class="contact"><strong>code:</strong></label>
                    <input type="text" class="contact_input" name="pc" id="pc" onblur="ckpc(this.value)"/>
                    <span id="pcmsg"class="err">*</span>
					</div>
                </div>  
              <div class="contact_form">
                <div class="form_subtitle">payment methods </div>          
                    <div class="form_row">
                    <label class="contact"><strong>credit card number:</strong></label>
                    <input type="text" class="contact_input" name="cnum" id="cnum" onblur="ckcnum(this.value)"/>
                    <span id="cnummsg"class="err">*</span>
					</div>  

                    <div class="form_row">
                    <label class="contact"><strong>expiry date:(in format 01-01-2012)</strong></label>
                    <input type="text" class="contact_input" name="exdate" id="exdate" onblur="ckexdate(this.value)"/>
                    <span id="exdatemsg"class="err">*</span>
					</div>


                    <div class="form_row">
                    <label class="contact"><strong>card holder name:</strong></label>
                    <input type="text" class="contact_input" name="hname"id="hname" onblur="ckhname(this.value)"/>
                    <span id="hnamemsg"class="err">*</span>
					</div>
                    
					<div class="form_row">
                    <input type="submit" name="submit" class="register" value="submit"/>
              					
					</div> 
                </div>    
   </form>
        <div class="clear"></div>
        </div><!--end of left content-->
        </div>
		
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
				<!--display the username in a proprivate area -->
				<h3>
                <span class="red" id="myDiv" style="color:red"> </span>
				</h3>
				</div>
              <div class="cart">
                  <div class="title"><span class="title_icon"><img src="images/cart.gif" alt="" title="" /></span>My cart</div>
                  <div class="home_cart_content">
				  <!-- display the quatity and the total prices of the products-->
				  <?php
                       echo writeShoppingCart();
					
                        echo showCart3();
						?>
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
        </div><!--end of right content-->
        </div>
       
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
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			
			