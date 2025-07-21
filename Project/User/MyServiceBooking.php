<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
include("../Assets/Connection/Connection.php");
session_start();
$uid = $_SESSION["uid"];
$selqry = "SELECT b.booking_id, b.booking_date, b.booking_todate, b.booking_amount, ss.singleservice_id, sa.serviceamount_price FROM tbl_booking b INNER JOIN tbl_singleservice ss ON b.booking_id = ss.booking_id INNER JOIN tbl_serviceamount sa ON ss.serviceamount_id = sa.serviceamount_id WHERE b.user_id = '$uid' ORDER BY b.booking_date DESC";
$result = $Con->query($selqry);
?>
<form id="form1" name="form1" method="post" action="">
  <table width="600" border="1" align="center">
    <tr>
      <th>S.No</th>
      <th>Date</th>
      <th>To Date</th>
      <th>Service Amount</th>
      <th>Booking Amount</th>
      <th>Action</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        $i = 1;
        while ($row = $result->fetch_assoc()) {
          ?>
           <tr>
           <td><?php echo  $i++ ?></td>
           <td> <?php echo $row["booking_date"] ?></td>
           <td><?php echo  $row["booking_todate"] ?></td>
           <td>₹<?php echo  $row["serviceamount_price"] ?></td>
           <td>₹ <?php echo $row["booking_amount"] ?></td>
           <td></td>
           </tr>
            <?php
        }
    } else {
        echo "<tr><td colspan='6'>No service bookings found.</td></tr>";
    }
    ?>
  </table>
</form>
</body>
</html>