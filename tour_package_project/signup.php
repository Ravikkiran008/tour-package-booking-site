<!DOCTYPE html>
<html>

<head>
    <meta charset="ISO-8859-1" />
    <title>Signup</title>
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
<?php
include ('header.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $mnumber = $_POST['mobilenumber'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);


        $sql1 = "SELECT EmailId FROM tblusers WHERE EmailId='$email'";
        $result1 = $conn->query($sql1);
        if ($result1->num_rows == 0) {

            $sql = "INSERT INTO  tblusers(FullName,MobileNumber,EmailId,Password) VALUES('$fname','$mnumber','$email','$password')";

            if ($conn->query($sql)) {
                $_SESSION['msg'] = "You are Scuccessfully registered. Now you can login ";
                ?> <br>
                <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                    Account Created Successfully! <a href="signin.php" class="alert-link">Login Now</a>.
                </div>


                <?php
            } else {
                
                $_SESSION['msg'] = "Something went wrong. Please try again.";
                echo "<h2>Something went wrong. Please try again.</h2>";
                echo "Error: " . $sql . "<br>" . $conn->error;

            }

        } else { ?>
            <br>
            <div class="alert alert-danger" role="alert" style="width:40%;margin:auto">
                Account Already Exists with this Email! <a href="signin.php" class="alert-link">Login Now</a>.
            </div>
        <?php }
    }
}
?>




<body style="background-color:#EEEEEE;">
    <div id="form" method="post">
        <br>
        <h2>Signup</h2><br>
        <form action="#" method="post">

            <input type="text" placeholder="Name" name="fname" required /><br><br>


            <input type="email" placeholder="Email" name="email" required /><br><br>


            <input type="number" placeholder="Mobile" maxlength="4" required name="mobilenumber" /><br><br>


            <input type="password" placeholder="Password" name="password" required /><br><br>

            <input type="submit" name='submit' value="submit"
                style="background-color:green;border:transparent;color:white;">
            <br />
            <br />
            <button class="otherbuttons" name="submit" type="reset"><a href=""
                    style="text-decoration:none ;color: white;">Cancel</a></button>

        </form>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>