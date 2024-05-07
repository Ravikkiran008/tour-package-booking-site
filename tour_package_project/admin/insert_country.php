<?php
session_start();
include ('admin_header.php');
if (strlen($_SESSION['alogin']) == 0) { ?>
    <script>window.location.href = 'index.php';</script>

<?php } else {
    include ('config.php');
    if (isset($_POST["submit"])) {
        $country_name = $_POST["country"];
        $country_img = $_FILES["country_image"]["name"];
        move_uploaded_file($_FILES["country_image"]["tmp_name"], "pacakgeimages/" . $_FILES["country_image"]["name"]);

        $sql = "INSERT INTO country(country_name,country_image) VALUES('$country_name','$country_img')";

        if ($conn->query($sql)) { ?>
            <br>
            <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                Country has been Added Successfully!
            </div>

        <?php } else {
            echo "not added " . mysqli_error($conn);
        }
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Users</title>
    </head>

    <body>
        <br>
        <h1 style='text-align:center'>Add Country</h1><br>

        <form method="post" name="submit" style="width:81%;margin:auto;" enctype="multipart/form-data">

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Country Name</label>
                <div class="col-sm-10">
                    <input type="text" name="country" class="form-control" id="inputPassword"
                        placeholder="Enter the country name">
                </div>
            </div>

            <div class="mb-3 row">
                <label for="inputPassword" class="col-sm-2 col-form-label">Country Image</label>
                <div class="col-sm-10">
                    <input type="file" name="country_image" class="form-control" id="inputPassword">
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-outline-secondary" style="width:30%;">Add Country</button>

        </form>


    </body>

    </html>
<?php } ?>