<?php 
	require 'connection.php';
	session_start();
	session_unset();
	session_destroy();
	mysqli_close($connection);
	header('location:index.php');
?>
