<?php
  session_start();
if(isset($_SESSION['user']))
{
  require 'connection.php';
  include 'navbar_admin.php';

?>
<html>
<head>
	<title>Studenut Attendance</title>
</head>
	<body>
			<div class="container" style="margin-top: 60px">

				<form  method="GET">
					<table align="center" top:50% border="1" >
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

							
					</table>
					<div align="center">
						<input type="submit"  name="submit_1" value="Get Student list">
					</div>
				</form>

				<?php
				require 'connection.php';
				date_default_timezone_set("Asia/Dhaka");//setting time zone

				if(isset($_REQUEST["submit_1"]))
				{
					$L_1=$_GET["List1"];
					$L_2=$_GET["List2"];
					$date=date("Y-m-d");

					//checking whether the attendane has already taken or not
					$sql="select * from course_by_date where class_date='$date' and course_code='$L_1' and course_section='$L_2'";
					$result= mysqli_query($connection, $sql);
				     $resultCheck = mysqli_num_rows($result);
				     if($resultCheck>0)
				     {
				     	echo "<h4><b>Attendance for ".$L_1." Section:".$L_2." has already taken</b></h4>";
				     }

				     else
				     {
				     	//checking time

							$time= date("G:i");
							$sql = "select * from time_slot where course_code='$L_1' and course_section='$L_2'";
							$result= mysqli_query($connection, $sql);
							$row=mysqli_fetch_assoc($result);


							//assigning class start time and end time 
							$start_hour=$row['start_time'][0].$row['start_time'][1];
							$start_minute=$row['start_time'][3].$row['start_time'][4];
							$end_hour=$row['end_time'][0].$row['end_time'][1];
							$end_minute=$row['end_time'][3].$row['end_time'][4];



							if($time[1]==":")
							{
								$curr_hour=$time[0];
								$curr_minute=$time[2].$time[3];

							}

							else
							{
								$curr_hour=$time[0].$time[1];
								$curr_minute=$time[3].$time[4];
							}


							$flag=1;

							if($curr_hour<$start_hour || $curr_hour>$end_hour)
							{
								echo"<h3><b>You are not allowed to take attendance of ".$L_1." Section ".$L_2." at this time</b></h3>";

								$flag=0;
							}

							else
							{
								if($curr_hour==$start_hour)
								{
									if($curr_minute<$start_minute)
									{
										echo"<h3><b>You are not allowed to take attendance at this time</b></h3>";
										$flag=0;
									}

								}

								else if($curr_hour==$end_hour)
								{
									if($curr_minute>$end_minute)
									{
										echo"<h3><b>You are not allowed to take attendance at this time</b></h3>";
										$flag=0;
									}
									
								}


							}

				     	if($flag==1)
				     	{

						     echo "<h4><b>Course Code: ".$L_1." Section: ".$L_2."</b></h4>";


						//Getting the list of students of that course
							 $sql_1 = "select * from courses_takes where course_code='$L_1' and course_section='$L_2'";
						     $result_1= mysqli_query($connection, $sql_1);
						     $resultCheck_1 = mysqli_num_rows($result_1);
				?>

						<form method="post">
							<table align="center" border="5">
								<tr>
									<th>Student ID</th>
									<th>Attendance Status</th>
								</tr>

								<?php
									for($i=1;$i<=$resultCheck_1;$i++)
									{

										$row_1 = mysqli_fetch_assoc($result_1);

								?>
								<tr>
									<td style="text-align: center;"><?php echo $row_1['s_id'] ?></td>
									<td style="text-align: center;"><input type="checkbox" name="chk[]" value="<?php echo $row_1['s_id'] ?>"></td>
								</tr>

								<?php
									}
								?>
							</table>

							<div align="center">
								<input type="submit" name="submit_2" value="Submit Attendance">
							</div>
						</form>

					<?php


					 if(isset($_REQUEST["submit_2"]))
					{
						
						$value_1=$_GET["List1"];
						$value_2=$_GET["List2"];
						$value_3=date("Y-m-d");
						$chk=$_REQUEST["chk"];


						$sql_2 = "insert into course_by_date  values('$value_1','$value_2','$value_3')";
						$result_2= mysqli_query($connection, $sql_2);

						foreach($chk as $id)
							{
								$sql_2 = "insert into attendance  values('$value_1','$value_2','$id', '$value_3')";
								$result_2= mysqli_query($connection, $sql_2);

							}

						echo "<h4><b>Attendance recorded for the course ".$value_1." Section: ".$value_2."</b></h4>";
					}

				}

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