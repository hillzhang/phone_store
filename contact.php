<?php
    //session start
	session_start();
	 //assignment 3
    // use HTML Entities to convert php special characters.
	$_SESSION['name']=htmlentities($_REQUEST['name'], ENT_QUOTES, 'UTF-8');
	$_SESSION['email']=htmlentities($_REQUEST['email'], ENT_QUOTES, 'UTF-8');
	$_SESSION['phone']=htmlentities($_REQUEST['phonenum'], ENT_QUOTES, 'UTF-8');
	$_SESSION['company']=htmlentities($_REQUEST['company'], ENT_QUOTES, 'UTF-8');
	$_SESSION['message']=htmlentities($_REQUEST['message'], ENT_QUOTES, 'UTF-8');
	
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
<script type="text/javascript" src="js/items.js"></script>
<style type="text/css">
.err{color:#ff0000;}
.ok{color:#009900;}
</style>

<script type="text/javascript">


// add function to check if the field information is empty
function InputCheck(RegForm)
{
  if (RegForm.name.value == "")
  {
    alert("the name can not be empty!");
    RegForm.name.focus();
    return (false);
  }
  
  if (RegForm.email.value == "")
  {
    alert("the email can not be empty!");
    RegForm.email.focus();
    return (false);
  }
  if (RegForm.phonenum.value=="")
  {
    alert("you must fill in the phone number!");
    RegForm.phonenum.focus();
    return (false);
  }
  if (RegForm.company.value == "")
  {
    alert("you must fill in the company!");
    RegForm.company.focus();
    return (false);
  }
   if (RegForm.message.value =="")
  {
    alert("you must fill in the contact message!");
    RegForm.message.focus();
    return (false);
  }
}
</script>
<script type="text/javascript">
//add function to transfer input information to ajax_navagation.js to check the input information

function ckemail(str) {open_url("php/ckemail.php?email="+str,"emailmsg");}
function cktel(str)   {open_url("php/cktel.php?tel="+str,"telmsg");}
//-->
</script>
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
            
              	<div class="contact_form">
                <div class="form_subtitle">all fields are requierd</div>   
                   <div>
				<?php
				//the validation of the email and the phone number
		   if(isset($_REQUEST['submit'])){
				if(!preg_match("/^[a-z0-9-_.]+@[\da-z][\.\w-]+\.[a-z]{2,4}$/i", $email) ){
					//error message
					 echo'<p style=color:red>Pleasw fill in the correct email!</p>';
					 }
				if(!ereg("^[0-9]{10}$", $phone)){
					//error message	 
					 echo'<p style=color:red>Please fill in the correct phone number!!</p>';
					  }
				}
			?>	
				
				</div>				
				<form action="contact.php" method="post" id="RegForm" name="RegForm" onSubmit="return InputCheck(this)">
                    <div class="form_row">
                    <label class="contact"><strong>Name:</strong></label>
                    <input type="text" class="contact_input" id="name" name="name"value="<?php echo $_SESSION['name'];?>" />
					<span id="urnamemsg"class="err">*</span>
                    </div>  

                    <div class="form_row">
                    <label class="contact"><strong>Email:</strong></label>
                    <input type="text" class="contact_input" id="email" name="email"value="<?php echo $_SESSION['email'];?>" onblur="ckemail(this.value)"/>
					  <span id="emailmsg"class="err">*</span>
                    </div>


                    <div class="form_row">
                    <label class="contact"><strong>Phone:</strong></label>
                    <input type="text" class="contact_input" id="phonenum" name="phonenum"value="<?php echo $_SESSION['phone'];?>"onblur="cktel(this.value)"/>
					 <span id="telmsg"class="err">*</span>
					<div>(in format 0414321206)</div>
                    </div>
                    
                    <div class="form_row">
                    <label class="contact"><strong>Company:</strong></label>
                    <input type="text" class="contact_input" id="company" name="company"value="<?php echo $_SESSION['company'];?>"/>
                    <span class="err">*</span>
					</div>


                    <div class="form_row">
                    <label class="contact"><strong>Message:</strong></label>
                   <textarea  class="contact_textarea" id="message" name="message" ><?php echo $_SESSION['message'];?></textarea>
                    <span class="err">*</span>
					</div>
                     <div class="form_row">
							
							 <label class="contact"><strong>Captcha:</strong></label>
							<input type="text" class="text" id="captcha" name="captcha" value=""/>
							<img src="get-image.php" alt="Captcha" /><br/>
							<span class="err"></span>
							<div>
							<!--add the captcha -->
							<?
							if(isset($_REQUEST['submit'])){
							// obtain the value of the captchas
							$code=strtolower($_SESSION["VerifyCode"]);
							//obtain the input captchas by user
							// use of HTML Entities to convert php special input characters.
							$input=strtolower(htmlentities($_REQUEST['captcha'], ENT_QUOTES, 'UTF-8'));
							//compare the random captcha and the captcha filled in by user
							if($code==$input){
							// if matched, there will be a response page for user to check
							echo '<script type=text/javascript>location="contactmsg.php"</script>';
							}
							else
							// error message
							echo '<p style=color:red>The captcha is wrong, please try again!!</p>';
							}
							else echo '';
							?>
				
				         </div>
				   
				   
                    </div>
                    
                    <div class="form_row">
                    <input type="submit" id="submit" name="submit" value="send" class="register"></input>                 
					</div>    
                    </form>					
 				
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