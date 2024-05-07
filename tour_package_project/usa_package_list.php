<?php


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tour";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo ("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Package List</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/main.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>


<?php
include('header.php'); 
include('includes/redirect.php')
?>

    <?php
 
 $sql='SELECT * from tbltourpackages where PackageLocation="USA"';
 $results = $conn->query($sql);

 if ($results->num_rows > 0) {
    while ($row = $results->fetch_assoc()){?>
<div class="card mb-3" style="max-width: 80%;margin: auto;margin-top: 10vh;border: transparent;background-color: #4d4d4d; display: flex; flex-direction: column;">
    <div class="row g-0" style="flex: 1;">
        <div class="col-md-3">
            <img src="admin/pacakgeimages/<?php echo htmlentities($row["PackageImage"]);?>" id="recipe_img" class="img-fluid rounded-start" alt="..." style='height:200px;width:200px;margin:20px;'>
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h3  style="color: white;font-weight:bolder"><?php echo $row["PackageName"]?></h3>
                <h6 class="badge text-bg-info" style="color: white;"><?php echo $row["PackageType"]?></h6>
                <h6 class="badge text-bg-warning" style="color: white;"><?php echo $row["PackageLocation"]?></h6>
                <p class="card-text" style="color: white;"><?php echo $row["PackageFetures"]?></p>
                
                <button type="button" class="btn btn-success">₹ <?php echo $row["PackagePrice"]?></button>

                <a href="package_details.php?pkgid=<?php echo  $row['PackageId']?>"><input class="btn btn-primary" type="submit" value="Package Details" style="width:30%"></a>
            </div>
        </div>
    </div>
</div> <?php


          }

 }else{
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
