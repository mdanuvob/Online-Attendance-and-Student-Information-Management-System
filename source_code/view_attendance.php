<?php
  session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';
  include 'navbar_admin.php';

?>

<html>
<head></head>
<title>Attendance History</title>

	<body>
		<div class="container" style="margin-top: 60px">
			<form >
				<table align="center" top:50% border="5" >
					<tr>
						<td><b>Course Code:</b></td>

						<td>
							<select Name="List1" size="1">
								<option value="CSE480">CSE480</option>
								<option value="CSE411">CSE411</option>
								<option value="CSE110">CSE110</option>
							</select>
						</td>
					</tr>

					<tr>
						<td><b>Section:</b></td>
						<td>
							<select Name="List2" size="1">
								<option value="1">1</option>
								<option value="2">2</option>
							</select>
						</td>
					</tr>

					<tr>
						<td><b>Start Date:</b></td>
						<td><input type="Date" name="date1" required/></td>
					</tr>
					<tr>
						<td><b>End Date:</b></td>
						<td><input type="Date" name="date2" required/></td>
					</tr>
						
				</table>
				<div align="center">
					<input type="submit" name="submit_1" value="Get Attendance History">
				</div>
			</form>

			<?php
			require 'connection.php';

			if(isset($_REQUEST["submit_1"]))
			{
				$value_1=$_REQUEST["List1"];
				$value_2=$_REQUEST["List2"];
				$date1=$_REQUEST["date1"];
				$date2=$_REQUEST["date2"];

				$sql_1 = "select * from course_by_date where course_code='$value_1' and  course_section='$value_2' and class_date between '$date1' and '$date2'";
				$result_1= mysqli_query($connection, $sql_1);
				$resultCheck_1 = mysqli_num_rows($result_1);
				if($resultCheck_1>0)
				{
					echo  "<h4><b>Total class conducted of course: ".$value_1.", Section: ".$value_2." between ".$date1." and ".$date2." : ".$resultCheck_1."</b></h4>";
					
					$sql_2 = "select s_id from courses_takes where course_code='$value_1' and  course_section='$value_2'";
					$result_2= mysqli_query($connection, $sql_2);
					$resultCheck_2 = mysqli_num_rows($result_2);
				?>

				<table align="center" border="5">
					<tr>
						<th>Student ID</th>
						<th>Attendance count</th>
					</tr>

				<?php
				for($i=1;$i<=$resultCheck_2;$i++)
				{
					$row_1 = mysqli_fetch_assoc($result_2);
					$id=$row_1['s_id'];
					//getting the attendace count of each student
					$sql_3="select * from attendance where course_code='$value_1' and  course_section='$value_2' and s_id='$id' and attendance_date between  '$date1' and '$date2'";
					$result_3= mysqli_query($connection, $sql_3);
					$resultCheck_3 = mysqli_num_rows($result_3);

				?>

					<tr>
						<td style="text-align: center;"><?php echo $id; ?></td>
						<td style="text-align: center;"><?php echo $resultCheck_3 ?></td>
					</tr>

			<?php
				}
					?>

					</table>

					<?php

					}

					else
					{
						echo "<h4><b>No classes found of course: ".$value_1.", Section: ".$value_2." between the given dates</b></h4>";
					}

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
