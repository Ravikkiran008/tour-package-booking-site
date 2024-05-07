<?php
session_start();
include ("admin_header.php");

if (strlen($_SESSION['alogin']) == 0) {  ?>
    <script>window.location.href = 'index.php';</script>

<?php } else {

    if (isset ($_POST['submit'])) {
        $pname = $_POST['packagename'];
        $ptype = $_POST['packagetype'];
        $plocation = $_POST['packagelocation'];
        $pprice = $_POST['packageprice'];
        $pfeatures = $_POST['packagefeatures'];
        $pdetails = $_POST['packagedetails'];
        $pimage = $_FILES["packageimage"]["name"];

        include ('config.php');
        
        move_uploaded_file($_FILES["packageimage"]["tmp_name"], "pacakgeimages/" . $_FILES["packageimage"]["name"]);

        $sql = "INSERT INTO tbltourpackages(PackageName,PackageType,PackageLocation,PackagePrice,PackageFetures,PackageDetails,PackageImage) 
        VALUES ('$pname','$ptype','$plocation','$pprice','$pfeatures','$pdetails','$pimage')";

        if ($conn->query($sql)) { ?>

            <br>
            <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                Package Created Successfully!
            </div>
        <?php } else { ?>
            <br>
            <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                Package Not Created
            </div>
        <?php }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Package</title>

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


<body style="background-color:#F8F6F4">
   <br> <h3 style="text-align:center">Create Package</h3>


   <br> <form method="post" name="submit" style="width:81%;margin:auto;" enctype="multipart/form-data">

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Package Name</label>
            <div class="col-sm-10">
                <input type="text" name="packagename" class=" form-control" id="inputPassword"
                    placeholder="Enter the package name">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Package Type</label>
            <div class="col-sm-10">
                <input type="text" name="packagetype" class="form-control" id="inputPassword"
                    placeholder="Enter the package type">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Package Location</label>
            <div class="col-sm-10">
                <input type="text" name="packagelocation" class="form-control" id="inputPassword"
                    placeholder="Enter the package location">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Package Price</label>
            <div class="col-sm-10">
                <input type="text" name="packageprice" class="form-control" id="inputPassword"
                    placeholder="Enter the price for package">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Package Features</label>
            <div class="col-sm-10">
                <input type="text" name="packagefeatures" class="form-control" id="inputPassword"
                    placeholder="Enter the package features">
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Package Details</label>
            <div class="col-sm-10">
                <textarea class="form-control" name="packagedetails" id="exampleFormControlTextarea1"
                    rows="3"></textarea>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="inputPassword" class="col-sm-2 col-form-label">Package Image</label>
            <div class="col-sm-10">
                <input type="file" name="packageimage" class="form-control" id="inputPassword"
                    placeholder="Enter the package features">
            </div>
        </div>

        <button type="submit" name="submit" class="btn btn-outline-secondary" style="width:30%;">Add Package</button>
        <!-- </div> -->
    </form>
</body> 

</html>