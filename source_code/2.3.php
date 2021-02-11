<?php
/*
require 'connection.php';

$sql = "INSERT INTO student (s_id) 
        VALUES ('10')";

if (mysqli_query($connection, $sql)) {
    echo "New record created successfully";
} else {
    $erm= "Error: " . $sql . "<br>" . mysqli_error($connection);
    $message = "wrong answer";
echo "<script type='text/javascript'>alert('$message');</script>";

}*/
?>


</!DOCTYPE html>
<html>
<head>
    <title></title>
</head>

<body style="background-image: url('img.jpg')">

    <form  style="margin-top: 100px;" method="post">
        <table align="center">
            

            <tr>
                <td><b>Enter Confirm Password:</b></td>
                <td><input type="text" placeholder="Confirm Password" name="pass1" id="txtConfirmPassword" required/></td>
            </tr>
        </table>
        <div align="center" style="margin-top: 50px;">
            <input type="submit" value="Register" id="btnSubmit" onclick="return Validate()" style="border-width: 10px; border-color: rgb(
            12,40,99);"/>
        </div>

        
    </form>

    <script type="text/javascript">
        function Validate() {
        
        var confirmPassword = document.getElementById("txtConfirmPassword").value;
        var str;
        str='017';
        str=str+' World';

        str=str+str[0];

        if(str=='hello')
        {
            alert(str.length);
        }

        else
        {
            alert(str.length);
        }


        /*

        if(/\S+@\S+\.\S+/.test(confirmPassword))
        {
            alert("hi");
        }

        else
        {
            alert("Hello");
        } */
    }

    </script>

</body>
</html>

<!--

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body >

<form> 
<input type="text" placeholder="Confirm Password" name="pass1" id="mail" required/>

<input type="submit" name="submit" value="Submit" onclick="return ValidateEmail()"/>

</form>



<script type="text/javascript">
function ValidateEmail()
{
var inputText=getElementById('mail').value;
alert("1");
var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
if(inputText.value.match(mailformat))
{
alert("Valid email address!");
return true;
}
else
{
alert("You have entered an invalid email address!");
return false;
}
}
</script>

</body>
</html>
-->