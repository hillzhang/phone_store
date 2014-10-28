<?php
//session start
session_start();
//unset the username session
unset($_SESSION['username']);
echo"<script type='text/javascript'>alert('Thank you for visiting our shopping website');location='ass3.html';</script>";

?>