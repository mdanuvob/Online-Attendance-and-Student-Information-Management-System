<?php
session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';
  include 'navbar_student.php';

  $value=$_SESSION["user"];

$sql = "SELECT * FROM student where s_id='$value'";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Student Update</title>
</head>
<body>
    <div class="container" style="margin-top: 60px">

      <table align="center">
        <tr>
          <td align="center"  colspan="2"><img src="<?php echo $row['s_img']; ?>" alt="Student's Photo" height="120" width="120"></td>
        </tr>
      </table>

    <form>
    	<input type="hidden" name="id" value="<?php echo $row['s_id'] ?>">

      	<table align="center" style="margin-top: 20px" border="4">
 
	        <tr>
	          <td><b>Email: &nbsp; </b></td>
	          <td><input type="text" name="mail" id="mail" value="<?php echo $row['s_mail']?>"></td>
	        </tr>
	        <tr>
	          <td><b>Address: </b></td>
	          <td><input type="text" name="address" value="<?php echo $row['s_address']?>"></td>
	        </tr>

	        <tr>
	          <td><b>Phoen Number: </b></td>
	          <td><input type="text" name="phone_number" id="phone_number" value="<?php echo $row['phone_number']?>"></td>
	        </tr>

      	</table>

		  <div align="center" style="margin-top: 10px">
		  	<input type="submit" name="submit" onclick="return Validate()"  value="Update">
		  </div>
      	
    </form>


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

		if(isset($_REQUEST['id']))
		{
			$id=$_REQUEST['id'];
			$phone=$_REQUEST['phone_number'];
			$address=$_REQUEST['address'];
			$mail=$_REQUEST['mail'];

			$sql="update student set  s_mail='$mail', s_address='$address', phone_number='$phone' where s_id='$id'";

			if (mysqli_query($connection, $sql)) 
			{
				echo "<script>
					alert('Profile Updated');
					window.location.href='update_by_student.php';
					</script>";
			    
			} 
		}


  }//end of first if
  else
  {
    echo"<h3>Access Denined</h3>";
  }

?>