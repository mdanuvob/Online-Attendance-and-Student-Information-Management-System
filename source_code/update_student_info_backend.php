<?php

if(isset($_POST['s_id']))
{
	require 'connection.php';

	$s_id=$_POST['s_id'];
	$dept_name=$_POST['dept_name'];
	$s_mail=$_POST['s_mail'];
	$s_address=$_POST['s_address'];
	$phone_number=$_POST['phone_number'];

	$sql= "update student set dept_name='$dept_name', s_mail='$s_mail', s_address='$s_address', phone_number='$phone_number' where s_id='$s_id'";

		if (mysqli_query($connection, $sql)) 
{
    
} 

else 
{
    echo "Error: " . $sql. "<br>" . mysqli_error($connection);

}

}

else
{
	echo"<h3>Access Denined</h3>";
}



?>