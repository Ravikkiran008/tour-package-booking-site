<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO-8859-1" />
    <title></title>
    <link rel="stylesheet" href="./login.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
</head>

<body>



    <?php if (!isset($_SESSION['login'])) { ?>

        <div id="navdiv" style="background-color:#eeeeee;">
            <nav>
                <div id="Logo">Tourism</div>
                <div id="menu">
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="package-list.php">Packages</a></li>
                        <li><a href="signup.php">Signup</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Login
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="signin.php">User Login</a></li>
                                <li><a class="dropdown-item" href="admin/index.php">Admin Login</a></li>

                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>

    <?php } else { ?>
        <div id="navdiv">
            <nav>

                <div id="Logo">Tourism</div>
                <div id="menu" style='width:60%'>
                    <ul>
                        <li><a href="index.php">Home</a></li>
                        <li><a href="package-list.php">Packages</a></li>
                        <li><a href="tour_history.php">Bookings</a></li>
                        <li><a href="logout.php">Logout</a></li>
                        <li style="color:red;">
                            User ID :
                            <?php echo ($_SESSION['login']); ?>
                        </li>

                        <li></li>

                    </ul>

                </div>
            </nav>
        </div>

    <?php }
    ?>
</body>

</html>