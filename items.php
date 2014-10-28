<?php
// Include database connection
require_once('inc/global-connect.inc.php');
// Include functions
require_once('inc/functions.inc.php');
// Start the session
//session start
@session_start();
echo writeShoppingCart();
					
echo showCart3();
?>