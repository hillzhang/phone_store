<?php
//session start
@session_start();
// display the username in a special area if user logged
echo $username;
if($username!="")
echo '<a href= logout.php style="color:green;">logout</a>'



?>