<?php

				// Include database connection
				include("inc/global-connect.inc.php");
				// Include functions
				include("inc/functions.inc.php");
				// Start the session
		        session_start();
				$username=$_SESSION['username'];
				if($username=="")
				echo"<script type='text/javascript'>alert('You haven\'t logged in yet, please log in before continue');location='myaccount.html';</script>";
				else{
				echo showCart2();
				
			echo"<script type='text/javascript'>alert('congratuation you have purchased successfully, please login my account to see your account');location='myaccount.html';</script>";
		    }
		
	 ?>
        