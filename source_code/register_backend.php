<?php

if(isset($_POST['s_name']))
{
session_start();
include 'navbar_admin.php';
require 'connection.php';
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register Student</title>
</head>
<body>
	<div class="container" style="margin-top: 100px;">
		<?php
			$s_name=$_POST["s_name"];
			$dept_name=$_POST["dept_name"];
			$semester=$_POST["semester"];
			$s_address=$_POST["s_address"];
			$s_mail=$_POST["s_mail"];
			$phone=$_POST["number"];
			$name=$_FILES["uploadfile"]["name"];
			$tempname=$_FILES["uploadfile"]["tmp_name"];
			$folder="student/".$name;
			move_uploaded_file($tempname,$folder); 

			$year=date("Y");

			$sql_1="select serial from serial_number where curr_year='$year'and dept_name='$dept_name' and semester='$semester'";
			$result_1= mysqli_query($connection, $sql_1);
			$row_1 = mysqli_fetch_assoc($result_1);
			$curr_serial= $row_1["serial"];
			$next_serial=$curr_serial+1;
			$sql_2="update serial_number SET serial=$next_serial where curr_year='$year'and dept_name='$dept_name' and semester='$semester'";
			$result_2= mysqli_query($connection, $sql_2);

			//getting serial id
			if($curr_serial<10)
			{
				$serial_id='00'.$curr_serial;
			}

			else if($curr_serial<100)
			{
				$serial_id='0'.$curr_serial;
			}

			else
			{
				$serial_id=$curr_serial;
			}

			//getting semester id
			if($semester=='SUMMER')
			{
				$semester_id=2;
			}
			else if($semester=='FALL')
			{
				$semester_id=1;
			}
			else
			{
				$semester_id=3;
			}

			//getting department id
			if($dept_name=='CSE')
			{
				$dept_id=60;
			}
			else if($dept_name=='EEE')
			{
				$dept_id=50;
			}
			else if($dept_name=='ECE')
			{
				$dept_id=55;
			}

			else
			{
				$dept_id=70;
			}

			//getting students ID
			$s_id=$year."-".$semester_id."-".$dept_id."-".$serial_id;

			//creating a random 6 digit password 
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			        $randstring = '';
			        for ($i = 1; $i <=6; $i++) {
			            $randstring = $randstring.$characters[rand(0, strlen($characters))];
			        }
			//setting initial token
			$token=0;




			$sql_3="insert into  student(s_name,s_id,dept_name,s_img,s_pass,s_address,s_mail,phone_number,token)  values('$s_name','$s_id','$dept_name', '$folder', '$randstring' , '$s_address' , '$s_mail' , '$phone' , '$token')";
			if (mysqli_query($connection, $sql_3)) 
			{
			    echo "<h2>New student recorded. ID: ".$s_id." and the initial Password is : ".$randstring. "</h2>";

			    $sql_4="insert into courses_takes values('CSE480',2,'$s_id'),('CSE110',2,'$s_id'),('CSE411',2,'$s_id')";
				mysqli_query($connection, $sql_4);
			} 

			else 
			{
			    echo "Error: " . $sql_3 . "<br>" . mysqli_error($connection);

			}

	

		?>
		
	</div>

</body>
</html>

<?php
		}//end of first if
		
		else
		{
		echo"<h3>Access Denined</h3>";
		}

	?>
