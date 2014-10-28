<?php
	//generating captcha images.
	session_start();
	
	include("captcha.php");

	Captchaz::Vcode();
?>