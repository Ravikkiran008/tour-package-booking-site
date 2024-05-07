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
    <title>Manage Bookings</title>
</head>
<body>
    <br><h1 style="text-align:center">User Bookings</h1><br />

    <table class="table table-bordered table-striped " style="width:90%;margin:auto;">
  <thead class="table-dark">
    <tr>
      <th scope="col">Booking ID</th>
      <th scope="col">Name</th>
      <th scope="col">Email ID</th>
      <th scope="col">Package Name</th>
      <th scope="col">From / To</th>
      <th scope="col">Status</th>
      
      

    </tr>
  </thead>
  <tbody class="table-group-divider">

    <?php  
    
    include('config.php');
    $sql="SELECT * FROM tblbooking,tbltourpackages,tblusers WHERE tblbooking.packageId=tbltourpackages.packageId and tblbooking.UserEmail=tblusers.EmailId";
    $result=$conn->query($sql);
    $cnt=1;
    
    if($result->num_rows>0){
        while( $row = $result->fetch_assoc()){ 
            ?>
    <tr>
      <th scope="row"><?php echo $row['BookingId']?></th>
      <td><?php echo $row['FullName']?></td>
      <td><?php echo $row['UserEmail']?></td>
      <td><?php echo $row['PackageName']?></td>
      <td><?php echo $row['FromDate']?>  </td>
      
      <td><span class="badge text-bg-success"><?php if($row['status']==0){ echo "Booked";}?></span></td>
    </tr>

    <?php }
}?>
  </tbody>
</table>
</body>
</html>


<?php } ?>