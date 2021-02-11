<?php

session_start();
if(isset($_SESSION['user']))
{
	require 'connection.php';
  	include 'navbar_admin.php';

?>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<title>Student Registration Form</title>
	<body>
		<div class="container">
			  	<div class="my_div">
					<form action="register_backend.php" method="post" enctype="multipart/form-data">
					<table class="table">
							<tr>
								<td><b>Students's Name:</b></td>
								<td><input type="text" placeholder="enter name" name="s_name" required></td>
							</tr>

							<tr>
								<td><b>Department Name:</b></td>

								<td>
									<select Name="dept_name" size="1">
										<option value="CSE">CSE</option>
										<option value="EEE">EEE</option>
										<option value="ECE">ECE</option>
										<option value="PHA">PHARMACY</option>
									</select>
								</td>
							</tr>

							<tr>
								<td><b>Semester:</b></td>

								<td>
									<select Name="semester" size="1">
										<option value="SUMMER">SUMMER</option>
										<option value="FALL">FALL</option>
										<option value="SPRING">SPRING</option>
									</select>
								</td>
							</tr>

							<tr>
								<td><b>Student's Address:</b></td>
								<td><input type="address" placeholder="enter address" name="s_address"></td>
							</tr>

							
							<tr>
								<td><b>Student's Photo:</b></td>
								<td><input type="file" name="uploadfile" value="" required/></td>
							</tr>

							<tr>
								<td><b>Email Address:</b></td>
								<td><input type="mail" name="s_mail"id="mail" placeholder="enter email address" value="" required/></td>
							</tr>

							<tr>
								<td><b>Phone Number:</b></td>
								<td><input type="text" name="number" id="phone_number" placeholder="enter phone number" value="" required/></td>
							</tr>

							<tr>
								<td colspan="2" align="center"><input type="submit" onclick="return Validate()" name="submit" value="REGISTER"/></td>
							</tr>

						</table>
					</form>
				
				</div>
			
			</div>


	<script type="text/javascript">
	    function Validate() {
		        var phone_number = document.getElementById("phone_number").value;
		        var s_mail = document.getElementById("mail").value;
		        var sim_operator= phone_number[0]+phone_number[1]+phone_number[2];

		          var flag=1;


		          //Email Validation
		          if(!(/\S+@\S+\.\S+/.test(s_mail)))
		          {
		            alert("Invalid Email Address");
		            flag=0;
		            return false;

		          }

		          //Mobile Number Validation
		          else if(sim_operator=='017' || sim_operator=='019' || sim_operator=='018' || sim_operator=='014')
		          {
		            if(phone_number.length!=11)
		            {
		              alert("Invalid Mobile Number");
		              flag=0;
		              return false;

		            }
		            
		          }

		          //if mobile number doest't match with any mobile phone operator then else condition will be exicute
		          else
		          {
		            alert("Invalid Mobile Number");
		            flag=0;
		            return false;
		          }

		          if(flag==1)

		          {
		          	return true;
		          }

	    }
</script>

		
	</body>
</html>

<?php
		}//end of first if

		else
		 {
		 	echo"<h3>Access Denined</h3>";
		 }
		 
?>
