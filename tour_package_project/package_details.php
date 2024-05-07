<?php
include ('header.php');
include ('user_config.php');

if (isset($_POST['submit2'])) {

    $pid = intval($_GET['pkgid']);
    $useremail = $_SESSION['login'];
    $fromdate = $_POST['fromdate'];
    $status = 0;

    $sql = "INSERT INTO tblbooking(PackageId,UserEmail,FromDate,status) VALUES('$pid','$useremail','$fromdate','$status')";

    if ($conn->query($sql)) { ?>
        <?php sleep(0.3); ?>
        <br>

        <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
            Your Package has been Booked Successfully!<br>Package ID :
            <?php echo " $pid"; ?><br>Package start Date :
            <?php echo "$fromdate"; ?>
        </div>

    <?php } else {
        echo "Package not Booked : " . $conn->error;
    }
} ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package details</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body style="background-color:#EEEEEE;">


    <?php
    $pid = intval($_GET['pkgid']);
    $sql = "SELECT * from tbltourpackages where PackageId=$pid";
    $results = $conn->query($sql);

    if ($results->num_rows > 0) {
        while ($row = $results->fetch_assoc()) { ?>
            <br>
            <form name="book" method="post" style="width: 80%;">
                <div class="card mb-3"
                    style="max-width: 80%;margin: auto;margin-top: 10vh;border: transparent;background-color: #4d4d4d;">
                    <br><img src="admin/pacakgeimages/<?php echo htmlentities($row["PackageImage"]); ?>" id="recipe_img"
                        class="img-fluid rounded-start" alt="..."
                        style='height:200px;width:500px;margin:auto;border-radius:10px'>

                    <div class="col-md-8" style="width: 80%;margin:auto;">
                        <div class="card-body">
                            <h5 class="card-title" style="color: white;font-weight:bolder">
                                <?php echo $row["PackageName"] ?>
                            </h5>
                            <h6 style="color: white;">
                                <?php echo $row["PackageType"] ?>
                            </h6>
                            <h6 style="color: white;">
                                <?php echo $row["PackageLocation"] ?>
                            </h6>
                            <p class="card-text" style="color: white;">
                                <?php echo $row["PackageFetures"] ?>
                            </p>

                            <div class="input-group flex-nowrap">
                                <span class="input-group-text" id="addon-wrapping">From Date</span>
                                <input required type="date" class="form-control" placeholder="From Date" aria-label="Username"
                                    name="fromdate" aria-describedby="addon-wrapping" min="<?php echo date('Y-m-d'); ?>">
                            </div><br>

                            <button type="button" class="btn btn-success">
                                <?php echo "Rs." . $row["PackagePrice"] ?>
                            </button>


                            <?php if (isset($_SESSION['login'])) {
                                ?>

                                <a href="package_details.php?pkgid=<?php echo $row['PackageId'] ?>"><input class="btn btn-primary"
                                        type="submit" name="submit2" value="Book Package" style="width:30%"></a>
                            <?php } else {
                                sleep(1);
                                echo "<script>window.location.href = 'signin.php';</script>";
                                exit;

                            }
                            ?>


                        </div>
                    </div>
                </div>
                </div>

            </form>
            <?php
        }

    } else {
        echo "No packages found";
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