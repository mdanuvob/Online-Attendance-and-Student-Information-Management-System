<?php
  session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';
  include 'navbar_admin.php';

?>

<html>
<head>
</head>
<title>Delete Student</title>
<body>
	<div class="container" style="margin-top:60px;">
		<div class="my_div">

			<div align="center">
				<form>
					<label><b>Search Student:</b></label>
					<input type="text" placeholder="student id" name="search_id">
					<input type="submit" name="submit" value="Search">
				</form>
			</div>
			
			<div style="margin-top: 10px">
				
			</div>
		
			<?php
			if(isset($_REQUEST["search_id"]))
			{
				$search_id=$_REQUEST["search_id"];
				$sql = "select * from student where s_id='$search_id'";
				$result= mysqli_query($connection, $sql);
				$resultCheck = mysqli_num_rows($result);
				if($resultCheck==1)
				{
					$row = mysqli_fetch_assoc($result);

				?>

				<table align="center" border="5">

					<tr>
						<th>Student Image</th>
						<th>Student Id</th>
						<th>Student Name</th>
						<th>Department Name</th>
						<th>Delete Status</th>
					</tr>

					<tr>
				    	<td style="text-align: center;"><img src="<?php echo $row['s_img']; ?>" alt="Student's Photo" height="50" width="60"></td>
				    	<td style="text-align: center;"><?php echo $row['s_id'] ?></td>
				    	<td style="text-align: center;"><?php echo $row['s_name'] ?></td>
				    	<td style="text-align: center;"><?php echo $row['dept_name'] ?></td>
				    	<input type="hidden" name="id" value="<?php echo $row['s_id']?>">
				    	<td style="text-align: center;"><a href="delete_backend.php? id=<?php echo $row['s_id'] ?>" onclick="return f()"><span class="glyphicon glyphicon-trash"></span></a></td>
				    </tr>
				</table>
			<?php	


				}
				else
				{
					echo "<script>
					alert('No Student found');
					window.location.href='delete_student.php';
					</script>";

				}
				
			}

			else
			{

				$sql_1 = "select * from student";
				$result_1= mysqli_query($connection, $sql_1);
				$resultCheck_1 = mysqli_num_rows($result_1);
			?>
				<table align="center" border="5" >

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
				    	<input type="hidden" name="id" value="<?php echo $row_1['s_id']?>">
				    	<td style="text-align: center;"><a href="delete_backend.php? id=<?php echo $row_1['s_id'] ?>" onclick="return f()"><span class="glyphicon glyphicon-trash"></span></a></td>
				    </tr>

				<?php

				    }

				}

				  ?>

				</table>

			<script>

			    function f() {
			        return confirm("Do you want to delete student Records?");
			    }
			</script>

	</div>
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