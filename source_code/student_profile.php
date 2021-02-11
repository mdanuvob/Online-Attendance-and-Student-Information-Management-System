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
  <title>Student Profile</title>
</head>
<body>
    <div class="container" style="margin-top: 60px">
      <table align="center">
        <tr>
          <td align="center"  colspan="2"><img src="<?php echo $row['s_img']; ?>" alt="Student's Photo" height="120" width="120"></td>
        </tr>
      </table>

      <table align="center" style="margin-top: 20px" border="4">
 
        <tr>
          <td><b>Student's Name: &nbsp; </b></td>
          <td style="text-align: center; font-weight: bold;"><?php echo $row['s_name']; ?></td>
        </tr>
        <tr>
          <td><b>Student's ID : </b></td>
          <td style="text-align: center; font-weight: bold;"><?php echo $row['s_id']; ?></td>
        </tr>

        <tr>
          <td><b>Department : </b></td>
          <td style="text-align: center; font-weight: bold;"><?php echo $row['dept_name']; ?></td>
        </tr>

        <tr>
          <td><b>Email : </b></td>
          <td style="text-align: center; font-weight: bold;"><?php echo $row['s_mail']; ?></td>
        </tr>

        <tr>
          <td><b>Address : </b></td>
          <td style="text-align: center; font-weight: bold;"><?php echo $row['s_address']; ?></td>
        </tr>

        <tr>
          <td><b>Phone Number: </b></td>
          <td style="text-align: center; font-weight: bold;"><?php echo $row['phone_number']; ?></td>
        </tr>
        
      </table>

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

