<?php
require 'connection.php';
date_default_timezone_set("Asia/Dhaka");
$time= date("G:i");
$sql = "select * from time_slot where course_code='CSE480'";
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
	echo "Invalid entry";

	$flag=0;
}



else
{

	if($curr_hour==$start_hour)
	{
		if($curr_minute<$start_minute)
		{
			echo "Invalid entry ";
			$flag=0;
		}

	}

	else if($curr_hour==$end_hour)
	{
		if($curr_minute>$end_minute)
		{
			echo "Invalid entry ";
			$flag=0;
		}
		
	}


}

if($flag==1)
{
	echo "valid entry";
}


?>