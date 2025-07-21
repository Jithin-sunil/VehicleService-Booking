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
    $selQry="select * from tbl_packagebooking b inner join tbl_package p on b.package_id=p.package_id inner join tbl_servicecenter s on p.servicecenter_id = s.servicecenter_id where b.user_id='".$_SESSION['uid']."' order by packagebooking_date desc";
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
          <?php echo $row['servicecenter_name']; ?> <br>
          <?php echo $row['servicecenter_email']; ?> <br>
          <?php echo $row['servicecenter_contact']; ?> <br>
          <?php echo $row['servicecenter_address']; ?> 
          </td>
          <td><?php echo $row['package_amount']; ?></td>
          <td><img src="../Assets/Files/ServiceCenter/Package/<?php echo $row['package_photo']; ?>" width="100" height="100" /></td>
          <td><?php echo $row['packagebooking_date']; ?></td>
          <td><?php echo $row['packagebooking_todate']; ?></td>
          <td></td>
        </tr>
        <?php
    }
    ?>
    
  </table>
</form>
</body>
</html>
