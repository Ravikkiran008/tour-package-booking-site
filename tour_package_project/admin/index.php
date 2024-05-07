<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="ISO-8859-1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/signup.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body style="background-color:#EEEEEE;">
    <div id="form" method="post">
        <br>
        <h2>Admin-Login </h2>
        <form action="#" method="post">

            <input type="text" placeholder="Email" name="email" required /><br /><br>
            <input type="password" placeholder="Password" name="password" required /><br><br>

            <input type="submit" name='submit' value="submit"
                style="background-color:green;border:transparent;color:white;">
            <br />
            <br />
            <button class="otherbuttons"><a href="\tour_package_project\signin.php"
                    style="text-decoration:none ;color: white;">User Login</a></button>
            <button class="otherbuttons" type="reset"><a href=""
                    style="text-decoration:none ;color: white;">Cancel</a></button>

        </form>
    </div>
    <?php
    include ('config.php');
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $sql = "SELECT UserName,Password FROM admin WHERE UserName='$email' and Password='$password'";

            $result = $conn->query($sql);
            if ($result->num_rows > 0) { {

                    $_SESSION['alogin'] = $_POST['email'];
                    echo "<br><br><h3 style='text-align:center'>Login Success</h3>";
                    sleep(1);
                    header('Location: dashboard.php');
                    exit;
                }
            } else { ?>
                <br>
                <div class="alert alert-primary" role="alert" style="width:40%;margin:auto;text-align:center">
                    Invalid Details
                </div>
            <?php }
        }
    }
    ?>

</body>

</html>