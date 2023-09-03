<?php

session_start();

require "config.php";

if(isset($_POST['login'])){

    $email = $_POST['email'];
    $pass = md5($_POST['password']);

    $sql = "SELECT * FROM drivers WHERE Email = '$email' AND Password = '$pass'";
    $result = mysqli_query($con,$sql);
  
    if ($result->num_rows > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['username'] = $row['Name'];
      $_SESSION['emailadd'] = $row['Email'];
      $_SESSION['busid'] = $row['Bus_ID'];
      $_SESSION['isloggedin'] = true;
      // echo '<script>alert("Success.")</script>';
      header("Location: home.php");
    } else {
      echo '<script>alert("Oops! Email or Password is Wrong.")</script>';
      echo "<script>window.location.replace('login.php')</script>";
    }

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Bus Tracking System</title>
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap"
        rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet" />
</head>

<body>
    <!-- Background Video-->
    <video class="bg-video" playsinline="playsinline" autoplay="autoplay" muted="muted" loop="loop">
        <source src="assets/mp4/bg.mp4" type="video/mp4" />
    </video>
    <!-- Masthead-->
    <div class="masthead">
        <div class="masthead-content text-white">
            <div class="container-fluid px-4 px-lg-0">
                <h1 class="fst-italic lh-1 mb-4">Login for Drivers</h1>
                <p class="mb-5">Welcome to Bus Tracking System</p>

                <form id="contactForm" method="post">
                    <div class="row input-group-newsletter">
                        <div class="col">
                            <input class="form-control" name="email" type="email" placeholder="Enter email address..."
                                required /><br>
                            <input class="form-control" name="password" type="password" placeholder="Enter Password..."
                                required /><br>
                            <button class="btn btn-primary" id="submitButton" name="login" type="submit">Login Now</button><br><br>
                            <hr>
                            <small>Don`t have an account <a href="register.php" class="text-warning">Register Here!</a></small>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Social Icons-->
    <div class="social-icons">
        <div class="d-flex flex-row flex-lg-column justify-content-center align-items-center h-100 mt-3 mt-lg-0">
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-twitter"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-facebook-f"></i></a>
            <a class="btn btn-dark m-3" href="#!"><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>