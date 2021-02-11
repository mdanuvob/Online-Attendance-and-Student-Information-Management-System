<?php

date_default_timezone_set("Asia/Dhaka");
/*
$a="000'";
$a="00"."2";//to concate string we need dot
echo date("Y");//to get current year.
echo "\n";
*/
//echo date("Y-m-d")." ".date("h:i:sa")." ".date('d-m-y h:i:s');//this current time is 4 hour lag to Bangladesh's current time.
/*
$a=date('d-m-y h:i:s');
$d=$a[0].$a[1];
echo $d+1;
*/
echo date("h:i:sa");

/*
$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 1; $i <=6; $i++) {
            $randstring = $randstring.$characters[rand(0, strlen($characters))];//generating random string
        }
echo $randstring;
*/
?>