<?php

include ('header.php');
if (strlen($_SESSION['login']) == 0) {
    header('location:index.php');
} else {
?>
<br><h2>Current Bookings</h2>


        <table class="table table-bordered table-striped" style="width:91%;margin:auto;">
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
                include ('user_config.php');
                $uemail=$_SESSION['login'];
                $sql = "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.FromDate as fdate,tblbooking.ToDate as tdate,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from  tblbooking
 left join tblusers  on  tblbooking.UserEmail=tblusers.EmailId
 left join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where tblbooking.UserEmail='$uemail'";
                
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

                                if ($row['status'] == 0) {?>
                                    <span class="badge text-bg-success"><?php if($row['status']==0){ echo "Booked";}?></span>
                               <?php }
                               
                                ?>
                            </td>

                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else {
                    echo "<h3>No Data Found</h3>";
                } ?>

    </body>

    </html>













<?php  }?>