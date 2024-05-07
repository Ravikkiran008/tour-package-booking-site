<?php
session_start();
include ('admin_header.php');
if (strlen($_SESSION['alogin']) == 0) { ?>
    <script>window.location.href = 'index.php';</script>

<?php } else { ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="ISO-8859-1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Dashboard</title>
        <link rel="preconnect" href="https://fonts.googleapis.com" />
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
        <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="css/signup.css">
        <link rel="stylesheet" href="css/main.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    </head>

    <body>
        <br>
        <h1 style="text-align:center">Dashboard</h1><br>
        <div class="row" style="width:70%;margin:auto;">
            <div class="col-sm-6 mb-3">
                <div class="card" style="background-color:#D6DAC8">
                    <div class="card-body">
                        <h5 class="card-title">Users</h5>
                        <p class="card-text">

                            <?php
                            include ('config.php');
                            $sql1 = "SELECT * FROM tblusers";
                            $results = $conn->query($sql1);
                            echo "<h3>" . (mysqli_num_rows($results)) . " Registered </h3>";
                            ?>
                        </p>
                        <a href="manage_users.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card" style="background-color:#D6DAC8">
                    <div class="card-body">
                        <h5 class="card-title">Packages</h5>
                        <p class="card-text">
                            <?php
                            include ('config.php');
                            $sql2 = "SELECT * FROM tbltourpackages";
                            $results = $conn->query($sql2);
                            echo "<h3>" . (mysqli_num_rows($results)) . " packages available </h3>";

                            ?>

                        </p>
                        <a href="manage_packages.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card" style="background-color:#D6DAC8">
                    <div class="card-body">
                        <h5 class="card-title"> Bookings</h5>
                        <p class="card-text">
                            <?php
                            include ('config.php');
                            $sql2 = "SELECT * FROM tblbooking";
                            $results = $conn->query($sql2);
                            echo "<h3>" . (mysqli_num_rows($results)) . " bookings done </h3>";

                            ?>

                        </p>
                        <a href="manage_bookings.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

            <div class="col-sm-6 mb-3">
                <div class="card" style="background-color:#D6DAC8">
                    <div class="card-body">
                        <h5 class="card-title">Countries</h5>
                        <p class="card-text">
                            <?php
                            include ('config.php');
                            $sql2 = "SELECT * FROM country";
                            $results = $conn->query($sql2);
                            echo "<h3>" . " packages in " . (mysqli_num_rows($results)) . " countries" . "</h3>";

                            ?>

                        </p>
                        <a href="insert_country.php" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>

        </div><br>





        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
            integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
            crossorigin="anonymous"></script>
    </body>

    </html>


<?php } ?>