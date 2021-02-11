<?php
include 'navbar_login.php';
?>

<html>
	<head>
	<meta charset="utf-8">
	</head>
	<title>Admin Login</title>
	<link rel="stylesheet" href="style.css">
	<body>
			<div class="login_div">
				<h1>Admin Login</h1>
				<form >
				<label><b>User &nbsp; ID    :</b></label>
				<input type="text" placeholder="enter id" name="user" value=""></br>
				<label><b>Password:</b></label>
				<input type="password" placeholder="enter password" name="pass" value=""></br></br>
				<input class="btn" type="submit" name="submit" value="Sign In">
				</form>
			</div>
	</body>
</html>

<?php
	
	if(isset($_REQUEST["submit"]))
	{
		require 'connection.php';

		$user=$_REQUEST["user"];
		$pass=$_REQUEST["pass"];
		$sql = "SELECT * FROM admin where admin_id='$user' and admin_password='$pass'";
	    $result = mysqli_query($connection, $sql);
	    $resultCheck = mysqli_num_rows($result);
		if($resultCheck==true)
		{	
			session_start();
			$_SESSION["user"]=$user;
			header('location:admin_profile.php');
			
			
		}
		
		else
			
			{
				echo "<script>
					alert('Your ID or Password must be wrong.Try again with correct ID and Password!');
				</script>";
			}

	}

	

?>