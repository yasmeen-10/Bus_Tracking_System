<?php

session_start();

require 'config.php';

if(isset($_POST['submit'])){

  $email = $_POST['email'];
  $pass = md5($_POST['password']);
  $busid = $_POST['busid'];
  $name = $_POST['name'];


  $sql = "SELECT * FROM drivers WHERE email = '$email'";
  $result = mysqli_query($con,$sql);

  if (!$result->num_rows > 0) {
    $sql = "INSERT INTO drivers (Name, Email, Password, Bus_ID) VALUES ('$name','$email','$pass', '$busid')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script> alert('User Registration Successfull, Now you can Login') </script>";
        echo "<script> window.location.href = 'login.php' </script>";
        $name = "";
        $email = "";
        $_POST['pass'] = "";
        $_POST['phno'] = "";
    } else {
        echo "<script> alert('Oops! Something went Wrong') </script>";
    }
} else {
    echo "<script> alert('Oops! Account Already Exists.') </script>";
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
                <h1 class="fst-italic lh-1 mb-4">Register for Drivers</h1>
                <p class="mb-5">Welcome to Bus Tracking System</p>

                <form id="contactForm" method="post">
                    <div class="row input-group-newsletter">
                        <div class="col">
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" name="name" type="text"
                                        placeholder="Enter full name" required />
                                </div>
                                <div class="col">
                                    <input class="form-control" name="busid" type="number"
                                        placeholder="Enter bus ID" required /><br>
                                </div>
                            </div>

                            <input class="form-control" name="email" type="email" placeholder="Enter email address"
                                required /><br>
                            <input class="form-control" name="password" type="password" placeholder="Enter password"
                                required /><br>

                            <button class="btn btn-primary" id="submitButton" name="submit" type="submit">Register
                                Now</button><br><br>
                            <hr>
                            <small>Already have an account, <a href="login.php" class="text-warning">Login Here!</a></small>
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