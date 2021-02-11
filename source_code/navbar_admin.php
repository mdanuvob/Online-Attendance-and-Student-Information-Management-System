<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>  
        <span class="icon-bar"></span>                      
      </button>
      <img class="navbar-brand" src="https://upload.wikimedia.org/wikipedia/en/a/a5/East_West_University_Logo.jpg" alt="EWU logo" height="150" width="80">
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#">Home</a></li>
        <li><a href="register_student.php">Register Student</a></li>
        <li><a href="take_attendance.php">Take Attendance</a></li>
        <li><a href="view_attendance.php">View Attendance</a></li>
        <li><a href="update_student_info.php">Update/Add student Info</a></li>
        <li><button onclick="window.location.href='delete_student.php'" class="btn btn-danger navbar-btn">Delete Student</button></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li><a href=logout.php><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
      </ul>
    </div>
  </div>
</nav>

<div style="margin-top: 60px" align="center">
  <img alt="logo" src="https://4.bp.blogspot.com/-3lG22JMCu2M/TsHeHK05MGI/AAAAAAAAAAY/8Ec-lYP1SCo/s1600/ewubd+logo.jpg" style="max-height:60px; width: 70%">
</div>


</body>
</html>


