<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<title>EWU</title>

<body style="margin-bottom: 100px;">

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <img class="navbar-brand" src="https://upload.wikimedia.org/wikipedia/en/a/a5/East_West_University_Logo.jpg" alt="EWU logo" height="70" width="80">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact Us</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        User
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="admin_login.php">Admin</a>
                        <a class="dropdown-item" href="student_login.php">Student</a>
                        <a class="dropdown-item" href="#">Guest</a>
                        <div class="dropdown-divider"></div>
                    </div>
                </li>

                

                <li class="nav-item">
                    <button onclick="window.location.href='https://www.who.int/health-topics/coronavirus'" class="btn btn-danger navbar-btn">Coronavirus Info</button>
                </li>
                
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div>
    </nav>

    <div class="container">

        <!-- carousel -->

        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="ewu.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="ewu1.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                </div>
                <div class="carousel-item">
                    <img src="ewu2.jpg" class="d-block w-100" alt="..." style="height: 400px;">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>


    <div  style="margin-top: 50px; text-align: center;">
      <h1><b>Welcome to East West University</b></h1>
    </div> 

        
    </div>

    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>