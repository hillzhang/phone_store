
      <?php
	        //create my salt;
	        $_SESSION['salt']= "Random_KUGBJVY";
	  
			if(!isset($_REQUEST['submit'])){
				exit('illegale!');
			}
			// session start
			@session_start();
			// unset the user session before register
			unset($_SESSION['username']);
			//get the values of the register form
			// assignment 3
			// use HTML Entities to convert php special input characters.
			$username = htmlentities($_REQUEST['username'], ENT_QUOTES, 'UTF-8');
			$password = htmlentities($_REQUEST['password'], ENT_QUOTES, 'UTF-8');
			$email    = htmlentities($_REQUEST['email'], ENT_QUOTES, 'UTF-8');
            $phone   = htmlentities($_REQUEST['tel'], ENT_QUOTES, 'UTF-8');
			$city  = htmlentities($_REQUEST['city'], ENT_QUOTES, 'UTF-8');
			$country   = htmlentities($_REQUEST['coun'], ENT_QUOTES, 'UTF-8');
			//check the values in the register form
			//check the username
			if(!preg_match('/^[\w\x80-\xff]{3,15}$/', $username)){
			
			echo"<script type='text/javascript'>alert('The username is invalid, please try again');history.back();</script>";
			exit;
			
			}
			//check the password
			 if(strlen($password) < 3){

				echo"<script type='text/javascript'>alert('The password is invalid,please try again');history.back();</script>";
				exit;
			}
			//check the email
          else if(!preg_match("/^[a-z0-9-_.]+@[\da-z][\.\w-]+\.[a-z]{2,4}$/i", $email)){

				echo"<script type='text/javascript'>alert('The emial is invalid,please try again');history.back();</script>";
				exit;
			}
			//check the phone number
			else if(!ereg("^[0-9]{10}$", $phone)){

				echo"<script type='text/javascript'>alert('The phone is invalid,please try again');history.back();</script>";
				exit;
			}
			//check the city name
			else if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $city)){

				echo"<script type='text/javascript'>alert('The city is invalid,please try again');history.back();</script>";
				exit;
			}
			//check the conutry name
			else if(!preg_match("/^[\x80-\xffa-zA-Z0-9]{3,30}$/", $country)){

				echo"<script type='text/javascript'>alert('The password is invalid,please try again');history.back();</script>";
				exit;
			}
          else{
		 
			
			
			//connect to the database
			include('conn.php');
            
			$sql= "select username from us where username='$username'";
			$stmt = OCIParse($db, $sql);
             
			if(!$stmt)  {
					echo "An error occurred in parsing the sql string.\n"; 
					
				  }
				  
			OCIExecute($stmt); 
			//check if the username is exist
			OCIFetch($stmt);
			//assignment 3
			//use HTML Entities to convert php special characters from the database.
			$username= htmlentities(OCIResult($stmt,"USERNAME"), ENT_QUOTES, 'UTF-8');
			if($username!="")
			
			 echo"<script type='text/javascript'>alert('the username is exist, please click here to reset your username');history.back();</script>";
			else {
			$username = htmlentities($_REQUEST['username'], ENT_QUOTES, 'UTF-8');
			//assignment 3
			//salted md5 to encrypt login password 
			$salt = $_SESSION['salt'];
            $password = md5($salt.$_REQUEST['password']);
			//assignment 3
			// use of HTML Entities to convert php special input characters.
			$email    = htmlentities($_REQUEST['email'], ENT_QUOTES, 'UTF-8');
			$phone   = htmlentities($_REQUEST['tel'], ENT_QUOTES, 'UTF-8');
			$city  = htmlentities($_REQUEST['city'], ENT_QUOTES, 'UTF-8');
			$country   = htmlentities($_REQUEST['coun'], ENT_QUOTES, 'UTF-8');
			
			//insert the register information to the database
			$sq = "INSERT INTO us VALUES('$username','$password','$email','$phone','$city','$country')";
			$stmt1 = OCIParse($db, $sq);
			 //execute the database
			 OCI_Execute($stmt1); 
			 if(OCIParse($db, $sq))
			 {
			 $_SESSION['username'] = $username;
			 echo "<h3 style=color:red>";
			 echo"<script type='text/javascript'>alert('congratuation you have registerd successfully');location='ass3.html';</script>";
			 echo "</h3>";
			 echo "</br>";
			 
			 }
			 else{
			 echo "error";
			 }
			 }
 
			
			
			}
			
			
			
 


?>
          
              

            

     