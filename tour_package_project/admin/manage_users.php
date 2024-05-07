<?php
session_start();
include ('admin_header.php');
if (strlen($_SESSION['alogin']) == 0) { ?>

    <script>window.location.href = 'index.php';</script>

<?php } else {
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
        <h1 style='text-align:center'>Manage Users</h1><br>

        <table class="table table-bordered table-striped" style="width:90%;margin:auto;">
            <thead class="table-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile Number</th>
                    <th scope="col">Email ID</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>

                <?php

                include ('config.php');
                $sql = "SELECT * FROM tblusers";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td scope="row">
                                <?php echo $row["id"] ?>
                            </td>
                            <th scope="row">
                                <?php echo $row["FullName"] ?>
                            </th>
                            <td>
                                <?php echo $row['MobileNumber'] ?>
                            </td>
                            <td>
                                <?php echo $row['EmailId'] ?>
                            </td>
                            <td><a href="user_bookings.php?uid=<?php echo $row['EmailId'] ?>&&uname=<?php echo $row["FullName"] ?>"
                                    class="btn btn-outline-success">User Bookings</a></td>
                        </tr>
                    <?php }
                } else {
                    echo "No users Found";
                } ?>
            </tbody>
        </table>
    </body>

    </html>







<?php } ?>