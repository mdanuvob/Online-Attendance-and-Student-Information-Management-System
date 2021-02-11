<?php
session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';

?>
<html>
	<head>
	<link rel="stylesheet" href="style.css">
	</head>
	<title>Change Password</title>
	<body>
			<div class="login_div">
				<h1>Change Password</h1>
				<form >
				<label><b>Change Password  :</b></label>
				<input type="text" placeholder="new password" name="new_pass"></br>
				<label><b>Confirm Password:</b></label>
				<input type="text" placeholder="confirm password" name="confirm_pass"></br></br>
				<input class="btn" type="submit" name="submit" value="GO">	
				</form>
			</div>
	</body>
</html>

<?php
	
	if(isset($_REQUEST["submit"]))
	{
		$new=$_REQUEST["new_pass"];
		$confirm=$_REQUEST["confirm_pass"];

		if($new!=$confirm)
		{
			echo "<script>
					alert('Wrong confirm password');
				</script>";	
		}

		else if(strlen($new)<6)
		{
			echo "<script>
					alert('Invalid length of password');
				</script>";
		}


		else
		{
			require 'connection.php';
			session_start();
			if($_SESSION["user"]==true)
			{
				$value=$_SESSION["user"];
			}

			$sql="update student SET token=1, s_pass=$new where s_id='$value'";
			mysqli_query($connection, $sql);

			if (mysqli_query($connection, $sql)) 
				{
					header('location:after_change_pass.php');
				} 
			else
			 {
				echo "Error: " . $sql . "<br>" . mysqli_error($connection);
			 }
		}

	}


  }//end of first if
  
  else
  {
    echo"<h3>Access Denined</h3>";
  }

?>