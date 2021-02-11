<?php
  session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';
  include 'navbar_admin.php';

?>

<html>
<head></head>
<title>Delete Student</title>
<body>
	<div class="container" style="margin-top: 100px">
			<?php
				require 'connection.php';
				$sql_1 = "select * from student";
				$result_1= mysqli_query($connection, $sql_1);
				$resultCheck_1 = mysqli_num_rows($result_1);
			?>

			<form method="post">
				<table align="center" border="1">

					<tr>
						<th>Student Image</th>
						<th>Student Id</th>
						<th>Student Name</th>
						<th>Department Name</th>
						<th>Delete Status</th>
					</tr>

				<?php
				    for($i=1;$i<=$resultCheck_1;$i++)
				    {
				    	$row_1 = mysqli_fetch_assoc($result_1);

				    	?>
				    <tr>
				    	<td style="text-align: center;"><img src="<?php echo $row_1['s_img']; ?>" alt="Student's Photo" height="50" width="60"></td>
				    	<td style="text-align: center;"><?php echo $row_1['s_id'] ?></td>
				    	<td style="text-align: center;"><?php echo $row_1['s_name'] ?></td>
				    	<td style="text-align: center;"><?php echo $row_1['dept_name'] ?></td>
				    	<td style="text-align: center;"><input type="checkbox" name="chk[]" value="<?php echo $row_1['s_id'] ?>"></td>
				    </tr>

				<?php

				    }

				  ?>

				</table>

				<div align="center">
					<input type="submit" name="submit" onclick="return f()" value="Delete">
				</div>

			</form>

			<?php
			
			if(isset($_REQUEST["submit"]))
			{
				
				
				$chk=$_REQUEST["chk"];
				foreach($chk as $id)
				{
					$sql_2 = "delete from student where s_id='$id'";
				    $result_2= mysqli_query($connection, $sql_2);

				    $sql_3 = "delete from attendance where s_id='$id'";
				    $result_3= mysqli_query($connection, $sql_3);

				    $sql_4 = "delete from courses_takes where s_id='$id'";
				    $result_4= mysqli_query($connection, $sql_4);
				}

				header("Refresh:0");
			}

			?>

			<script>

			    function f() {
			        return confirm("Do you want to delete selected records?");
			    }
			</script>

	</div>



</body>
</html>

<?php
}

else
{
	echo"<h3>Access Denined</h3>";

}

?>