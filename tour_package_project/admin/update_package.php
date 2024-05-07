<?php
session_start();
include ('config.php');
include ('admin_header.php');
if (strlen($_SESSION['alogin']) == 0) { ?>
    <script>window.location.href = 'index.php';</script>

<?php } else {
    include ('config.php');

    $pid = intval($_GET['pid']);
    if (isset ($_POST['submit'])) {
        $pname = $_POST['packagename'];
        $ptype = $_POST['packagetype'];
        $plocation = $_POST['packagelocation'];
        $pprice = $_POST['packageprice'];
        $pfeatures = $_POST['packagefeatures'];
        $pdetails = $_POST['packagedetails'];
        $pimage = $_FILES["packageimage"]["name"];
        if (!empty ($pimage)) {
            move_uploaded_file($_FILES["packageimage"]["tmp_name"], "pacakgeimages/" . $_FILES["packageimage"]["name"]);
            $sql = "update TblTourPackages set PackageName='$pname',PackageType='$ptype',PackageLocation='$plocation',PackagePrice='$pprice',PackageFetures='$pfeatures',PackageDetails='$pdetails',PackageImage='$pimage' where PackageId=$pid";
        } 
        else {
            $sql = "update TblTourPackages set PackageName='$pname',PackageType='$ptype',PackageLocation='$plocation',PackagePrice='$pprice',PackageFetures='$pfeatures',PackageDetails='$pdetails' where PackageId=$pid";
        }
        if ($conn->query($sql)) { ?>
            <br>
            <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                Package Updated Successfully!
            </div>

            <?php
        } else { ?>
            <br>
            <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                Package Not Updated.
                <?php mysqli_error($conn) ?>
            </div>
        <?php }

    } ?>

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

        <br><h3 style="text-align:center">Update Package</h3>

        <?php

        $sql = "SELECT * FROM TblTourPackages WHERE PackageId=$pid";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                <br><form method="post" name="submit" style="width:81%;margin:auto;" enctype="multipart/form-data">

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Package Name</label>
                        <div class="col-sm-10">
                            <input type="text" name="packagename" class="form-control" id="inputPassword"
                                placeholder="Enter the package name" value="<?php echo $row['PackageName'] ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Package Type</label>
                        <div class="col-sm-10">
                            <input type="text" name="packagetype" class="form-control" id="inputPassword"
                                placeholder="Enter the package type" value="<?php echo $row['PackageType'] ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Package Location</label>
                        <div class="col-sm-10">
                            <input type="text" name="packagelocation" class="form-control" id="inputPassword"
                                placeholder="Enter the package location" value="<?php echo $row['PackageLocation'] ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Package Price</label>
                        <div class="col-sm-10">
                            <input type="text" name="packageprice" class="form-control" id="inputPassword"
                                placeholder="Enter the price for package" value="<?php echo $row['PackagePrice'] ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Package Features</label>
                        <div class="col-sm-10">
                            <input type="text" name="packagefeatures" class="form-control" id="inputPassword"
                                placeholder="Enter the package features" value="<?php echo $row['PackageFetures'] ?>">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Package Details</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" name="packagedetails" id="exampleFormControlTextarea1"
                                rows="3"><?php echo $row['PackageDetails'] ?></textarea>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="inputPassword" class="col-sm-2 col-form-label">Package Image</label>
                        <div class="col-sm-10">

                            <input type="file" name="packageimage" class="form-control" id="inputPassword"
                                placeholder="Enter the package features" style="width:50%"><br>
                            <img src="pacakgeimages/<?php echo ($row['PackageImage']); ?>" width="100"
                                style="position:relative;left:73px;top:-68px">
                        </div>
                    </div>

                    <button type="submit" name="submit" class="btn btn-outline-secondary"
                        style="width:40%;position:relative;left:20px;bottom:62px">Update Package</button>
                    <!-- </div> -->
                </form>
            <?php }
        } ?>
    </body>

    </html>





<?php } ?>