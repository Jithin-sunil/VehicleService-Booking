<?php
include('../Assets/Connection/Connection.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align = "center">
    <tr>
      <td>S.No</td>
      <td>Description</td>
      <td>Amount</td>
      <td>Photo</td>
      <td>Action</td>
    </tr>
<?php
$sql = "SELECT * FROM tbl_package WHERE servicecenter_id = '".$_GET['sid']."'";
$result = $Con->query($sql);
if ($result->num_rows > 0) {
    $i = 0;
    while($row = $result->fetch_assoc()) {
      $i++;
?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['package_description']; ?></td>
      <td><?php echo $row['package_amount']; ?></td>
      <td><img src="../Assets/Files/ServiceCenter/Package/<?php echo $row['package_photo']; ?>" width="50" height="50" /></td>
      <td><a href="BookDate.php?pid=<?php echo $row['package_id']; ?>">Book</a></td>
    </tr>
<?php
      
    }
} else {
    echo "<tr><td colspan='5'>No records found</td></tr>";
}
?>
  </table>
</form>
</body>
</html>