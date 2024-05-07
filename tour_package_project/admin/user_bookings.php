<?php
session_start();
include ('admin_header.php');
if (strlen($_SESSION['alogin']) == 0) { ?>
    <!-- header('location:index.php'); -->
    <script>window.location.href = 'index.php';</script>

<?php } else {
    ?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>User Bookings</title>
    </head>

    <body>

        <!-- <h1>User Bookings</h1> -->
        <br>
        <h2>Manage
            <?php echo $_GET['uname']; ?>'s Bookings
        </h2>


        <br>
        <table class="table table-bordered table-striped" style="width:93%;margin:auto;">
            <thead class="table-dark">
                <tr>

                    <th scope="col">Booking ID</th>
                    <th scope="col">Name</th>
                    <th scope="col">Mobile No.</th>
                    <th scope="col">Email Id</th>
                    <th scope="col">Package Name</th>
                    <th scope="col">Travel Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody class="table-group-divider">

                <?php
                include ('config.php');
                $uid = $_GET['uid'];
                $sql = "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.ToDate as tdate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from  tblbooking
                         left join tblusers  on  tblbooking.UserEmail=tblusers.EmailId
                         left join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where tblbooking.UserEmail='$uid'";

                $result = $conn->query($sql);

                $cnt = 1;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {

                        ?>
                        <tr>
                            <th scope="row">#BK-
                                <?php echo $row['bookid'] ?>
                            </th>
                            <th scope="row">
                                <?php echo $row['fname'] ?>
                            </th>
                            <td>
                                <?php echo $row['mnumber'] ?>
                            </td>
                            <td>
                                <?php echo $row['email'] ?>
                            </td>
                            <td>
                                <?php echo $row['pckname'] ?>
                            </td>
                            <td>
                                <?php echo $row['fdate'] ?>
                            </td>

                            <td>
                                <?php

                                if ($row['status'] == 0) { ?>
                                    <span class="badge text-bg-success">
                                        <?php if ($row['status'] == 0) {
                                            echo "Booked";
                                        } ?>
                                    </span>
                                <?php }
                                ?>
                            </td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table><br>
        <?php } else { ?>
            <br>
            <div class="alert alert-primary" role="alert" style="width:40%;margin:auto">
                No Data Found.
            </div><br>
        <?php } ?>

    </body>

    </html>

<?php } ?>