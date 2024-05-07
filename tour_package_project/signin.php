<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1" />
    <title>Login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="includes/signin.css">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

</head>
<?php
include ('header.php');
?>

<body style="background-color:#EEEEEE;">
    <div id="form" method="post">
        <br>
        <h2>Login </h2><br>
        <form action="#" method="post">

            <input type="email" placeholder="Email" name="email" required /><br><br>
            <input type="password" placeholder="Password" name="password" required /><br><br>

            <input type="submit" name='submit' value="submit"
                style="background-color:green;border:transparent;color:white;">
            <br />
            <br />
            <button class="otherbuttons" type="reset"><a href=""
                    style="text-decoration:none ;color: white;">Cancel</a></button>

        </form>
    </div>

    <?php

    include ('user_config.php');

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = md5($_POST['password']);
            $sql = "SELECT EmailId,Password FROM tblusers WHERE EmailId='$email' and Password='$password'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) { {

                    $_SESSION['login'] = $_POST['email'];
                    echo "<h1>Login Success</h1>";
                    sleep(1);
                    header('Location: package-list.php');
                    exit;
                }
            } else { ?>
                <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                    Invalid Details .
                </div>
            <?php }
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>