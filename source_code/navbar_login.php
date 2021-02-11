<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

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
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
        </div>
    </nav>


    <script src="jquery-3.5.1.slim.min.js"></script>
    <script src="popper.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>