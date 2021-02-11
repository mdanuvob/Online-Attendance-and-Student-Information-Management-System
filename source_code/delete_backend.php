<?php
if(isset($_GET['id']))
{
	require 'connection.php';

	$id=$_GET['id'];
	

	$sql_1 = "delete from student where s_id='$id'";
	$result_1= mysqli_query($connection, $sql_1);

	$sql_2 = "delete from attendance where s_id='$id'";
	$result_2= mysqli_query($connection, $sql_2);

	$sql_3 = "delete from courses_takes where s_id='$id'";
	$result_3= mysqli_query($connection, $sql_3);

	header('location:delete_student.php');

}


else
{
	echo"<h3>Access Denined</h3>";
}


				    

?>