<?php
session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';
  include 'navbar_admin.php';
}

 else
 {
 	echo"<h3>Access Denined</h3>";
 }
?>