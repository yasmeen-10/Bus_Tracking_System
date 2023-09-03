<?php

require "config.php";

$status = 'none';

if (isset($_POST['submit'])) {

    $busid = $_POST['busid'];

    $sql = "SELECT * FROM bus_location WHERE bus_id = '$busid'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    if (!$result->num_rows > 0) {
        $status = 'failed';
    } else {
        $status = 'success';
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
    <link rel="stylesheet" href="map/leaflet.css" />
    <script src="map/leaflet.js"></script>
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
                <h1 class="fst-italic lh-1 mb-4">Hello, Passenger</h1>
                <p class="mb-5">Welcome to Bus Tracking System</p>

                <form id="contactForm" method="post">
                    <div class="row input-group-newsletter">
                        <div class="col">
                            <div>
                                <input class="form-control" name="busid" type="number" placeholder="Enter Bus ID" required /><br>

                                <button class="btn btn-primary" id="submitButton" name="submit" type="submit">Search
                                    Bus</button><br><br>
                            </div>

                            <?php

                            if ($status == 'failed') {
                            ?>

                                <div class="alert alert-danger">
                                    <span>No bus found for the entered bus ID, please try again</span>
                                </div>

                            <?php } elseif ($status == 'success') { ?>

                                <div class="alert alert-success">
                                    <span>Here is a Location of Bus ID : <?php echo $busid ?></span>
                                </div>
                                <div class="mt-4 mb-4">
                                    <span>Latitude: <?php echo $row['Latitude'] ?></span><br>
                                    <span>Longitude: <?php echo $row['Longitude'] ?></span><br>
                                    <span>Current Place: <?php echo $row['Place'] ?></span><br>
                                    <span>Source: <?php echo $row['source'] ?></span><br>
                                    <span>Destination: <?php echo $row['destination'] ?></span><br>
                                    <span>Approximate Time: <?php echo $row['approximate_time'] ?></span><br>
                                </div>

                                <hr>
                                <small>Now you can see in map also, <a href="map.php?latitude=<?php echo $row['Latitude'] ?>&&longitude=<?php echo $row['Longitude'] ?>" class="text-warning">Click here to view on Map!</a></small>
                            <?php } ?>
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
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>