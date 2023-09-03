<?php

session_start();

require "config.php";

if (!$_SESSION['isloggedin']) {
    header("Location: index.php");
    exit();
}

$name = $_SESSION['username'];
$driveremail = $_SESSION['emailadd'];
$busid = $_SESSION['busid'];

if (isset($_POST['updatefirst'])) {

    $long = $_POST['longitude'];
    $lati = $_POST['latitude'];
    $place = $_POST['place'];
    $desti = $_POST['desti'];
    $source = $_POST['source'];
    $aprox = $_POST['aprox'];

    $sql = "INSERT INTO bus_location (Bus_ID, Driver_Email, Longitude, Latitude, Place, source, destination, approximate_time) VALUES ('$busid','$driveremail','$long', '$lati', '$place','$source', '$desti', '$aprox')";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script> alert('Location Updated Successfully') </script>";
    } else {
        echo "<script> alert('Oops! Something went Wrong') </script>";
    }
}


if (isset($_POST['updatemodel'])) {

    $long2 = $_POST['longitude2'];
    $lati2 = $_POST['latitude2'];
    $place2 = $_POST['place2'];
    $approx2 = $_POST['approx2'];

    $sql = "UPDATE bus_location SET Longitude = '$long2', Latitude= '$lati2', Place='$place2', approximate_time='$approx2' WHERE Bus_ID = '$busid'";
    $result = mysqli_query($con, $sql);
    if ($result) {
        echo "<script> alert('Location Updated Successfully') </script>";
    } else {
        echo "<script> alert('Oops! Something went Wrong') </script>";
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
    <link href="https://fonts.googleapis.com/css2?family=Tinos:ital,wght@0,400;0,700;1,400;1,700&amp;display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700&amp;display=swap" rel="stylesheet" />
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
                <h1 class="fst-italic lh-1 mb-4">Hello, <?php echo $name ?></h1>
                <p class="mb-5">Welcome to Bus Tracking System</p>

                <div class="row input-group-newsletter">
                    <div class="col">

                        <?php

                        $check = "SELECT * FROM bus_location WHERE Bus_ID = '$busid'";
                        $res = mysqli_query($con, $check);
                        if (!$res->num_rows > 0) {

                        ?>

                            <div>
                                <form action="" method="post">
                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control" name="latitude" type="text" placeholder="Enter Latitude" required />
                                        </div>
                                        <div class="col">
                                            <input class="form-control" name="longitude" type="text" placeholder="Enter Longitude" required /><br>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col">
                                            <input class="form-control" name="source" type="text" placeholder="Enter Bus Source" required /><br>
                                        </div>
                                        <div class="col">
                                            <input class="form-control" name="desti" type="text" placeholder="Enter Bus Destination" required />
                                        </div>
                                    </div>

                                    <input class="form-control" name="aprox" type="text" placeholder="Enter Approximate time" required /><br>
                                    <input class="form-control" name="place" type="text" placeholder="Enter Place" required /><br>

                                    <button class="btn btn-primary" id="submitButton" name="updatefirst" type="submit">Update
                                        Location</button><br><br>
                                </form>
                            </div>

                        <?php } else {

                            $busdata = "SELECT * FROM bus_location WHERE Bus_ID = '$busid'";
                            $resdata = mysqli_query($con, $check);
                            $row = mysqli_fetch_assoc($resdata);

                        ?>

                            <div>
                                <p>Latitude: <?php echo $row['Latitude'] ?></p>
                                <p>Longitude: <?php echo $row['Longitude'] ?></p>
                                <p>Current Place: <?php echo $row['Place'] ?></p>
                                <p>Source: <?php echo $row['source'] ?></p>
                                <p>Destination: <?php echo $row['destination'] ?></p>
                                <p>Approximate Time: <?php echo $row['approximate_time'] ?></p>
                                <button type="button" class="btn btn-primary mt-4 mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Update New Location</button>
                            </div>

                        <?php } ?>

                        <hr>
                        <small>If you want, you can <a href="logout.php" class="text-warning">Logout Here!</a></small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form action="" method="post">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Update New Location</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div>
                            <div class="row">
                                <div class="col">
                                    <input class="form-control" name="latitude2" type="text" placeholder="Enter Latitude" required />
                                </div>
                                <div class="col">
                                    <input class="form-control" name="longitude2" type="text" placeholder="Enter Longitude" required /><br>
                                </div>
                            </div>
                            <input class="form-control" name="place2" type="text" placeholder="Enter Place" required /><br>
                            <input class="form-control" name="approx2" type="text" placeholder="Enter Approximate Time" required />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="updatemodel" class="btn btn-primary">Update Location</button>
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
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>