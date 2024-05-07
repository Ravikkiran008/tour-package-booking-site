<?php

session_start();
include ('admin_header.php');
if (strlen($_SESSION['alogin']) == 0) { ?>
    <!-- header('location:index.php'); -->
    <script>window.location.href = 'index.php';</script>

<?php } else {

    include ('config.php');
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'delete') {
            $id = intval($_GET['id']);
            $sql = "delete from tbltourpackages where PackageId=$id";
            if ($conn->query($sql)) {
                echo "<script>alert('Package deleted.');</script>";
                echo "<script>window.location.href='manage_packages.php'</script>";
            }

        }
    }
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Manage Pacakages</title>
        <style>

        </style>
    </head>
    <body>


        <br>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end" style="width:90%;margin:auto;">
            <h2 style="display: inline;margin:auto;" ;>Manage Packages</h2>
            <button class="btn btn-outline-warning" type="button" style="width:20%;">
                <a href="create_package.php" style="text-decoration:none;color:black;font-weight:bolder;">Create Package</a>
            </button>
            <!-- <button class="btn btn-primary" type="button">Button</button> -->
        </div>
        <br>
        <table class="table table-bordered table-striped" style="width:90%;margin:auto;">

            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Type</th>
                    <th scope="col">Location</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>

                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
                include ('config.php');
                $sql = "select * from tblTourPackages";
                $result = $conn->query($sql);
                $cnt = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>


                        <tr>
                            <th scope="row">
                                <?php echo $cnt ?>
                            </th>
                            <td>
                                <?php echo $row['PackageName'] ?>
                            </td>
                            <td>
                                <?php echo $row['PackageType'] ?>
                            </td>
                            <td>
                                <?php echo $row['PackageLocation'] ?>
                            </td>
                            <td>
                                <?php echo $row['PackagePrice'] ?>
                            </td>
                            <td style="width:20%;margin:auto;">
                                <a href="update_package.php?pid=<?php echo ($row['PackageId']); ?>"><button type="button"
                                        class="btn btn-outline-success">View Details</button></a>
                                <a href="manage_packages.php?action=delete&&id=<?php echo $row['PackageId']; ?>"
                                    onclick="return confirm('Do you really want to delete?')"
                                    class="btn btn-outline-danger">Delete</a>
                            </td>
                        </tr>

                        <?php $cnt = $cnt + 1;
                    }
                } else {
                    echo "No Packages Found";
                } ?>
            </tbody>
        </table>
    </body>

    </html>















<?php } ?>