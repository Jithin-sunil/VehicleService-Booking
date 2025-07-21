<?php
include('../Assets/Connection/Connection.php');
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1" align = "center">
    <tr>
      <td>S.No</td>
      <td>Description</td>
      <td>ServiceCenter</td>
      <td>Amount</td>
      <td>Photo</td>
      <td>Date</td>
      <td>ToDate</td>
      <td>Action</td>
    </tr>
    <?php
    $selQry="select * from tbl_packagebooking b inner join tbl_package p on b.package_id=p.package_id inner join tbl_user u on b.user_id = u.user_id where p.servicecenter_id='".$_SESSION['sid']."' order by packagebooking_date desc";
    $res=$Con->query($selQry);
    $i=0;
    while($row=$res->fetch_assoc())
    {
        $i++;
        ?>
        <tr>
          <td><?php echo $i; ?></td>
          <td><?php echo $row['package_description']; ?></td>
          <td>
          <?php echo $row['user_name']; ?> <br>
          <?php echo $row['user_email']; ?> <br>
          <?php echo $row['user_contact']; ?> <br>
          <?php echo $row['user_address']; ?> 
          </td>
          <td><?php echo $row['package_amount']; ?></td>
          <td><img src="../Assets/Files/ServiceCenter/Package/<?php echo $row['package_photo']; ?>" width="100" height="100" /></td>
          <td><?php echo $row['packagebooking_date']; ?></td>
          <td><?php echo $row['packagebooking_todate']; ?></td>
          <td>
          <?php if($row['packagebooking_status'] == 0) { ?>
            <a href="PackageBookingAction.php?bid=<?php echo $row['packagebooking_id']; ?>&action=accept">Accept</a> |
            <a href="PackageBookingAction.php?bid=<?php echo $row['packagebooking_id']; ?>&action=reject">Reject</a>
          <?php } else if($row['packagebooking_status'] == 1) { ?>
            Accepted
          <?php } else if($row['packagebooking_status'] == 2) { ?>
            Rejected
          <?php } ?>


          </td>
        </tr>
        <?php
    }
    ?>
    
  </table>
</form>
</body>
</html>
