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
  <table cellpadding="10" border="1" align = "center">
    <tr>
      <td>S.No</td>
      <td>Name</td>
      <td>Email</td>
      <td>Contact</td>
      <td>Address</td>
      <td>Logo</td>
      <td>District</td>
      <td>Place</td>
      <td>Action</td>
    </tr>
<?php
$sql = "SELECT * FROM tbl_servicecenter s 
INNER JOIN tbl_place p ON s.place_id = p.place_id
INNER JOIN tbl_district d ON p.district_id = d.district_id";
$result = $Con->query($sql);
if ($result->num_rows > 0) {
    $i = 0;
    while($row = $result->fetch_assoc()) {
      $i++;
?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['servicecenter_name']; ?></td>
      <td><?php echo $row['servicecenter_email']; ?></td>
      <td><?php echo $row['servicecenter_contact']; ?></td>
      <td><?php echo $row['servicecenter_address']; ?></td>
      <td><img src="../Assets/Files/ServiceCenter/Logos/<?php echo $row['servicecenter_logo']; ?>" width="50" height="50" /></td>
      <td><?php echo $row['district_name']; ?></td>
      <td><?php echo $row['place_name']; ?></td>
      <td>
        
        <a href="ViewPackage.php?sid=<?php echo $row['servicecenter_id']; ?>">View Packages</a> / 
        <a href="ViewServices.php?sid=<?php echo $row['servicecenter_id']; ?>">View Services</a> 
      </td>
    </tr>
<?php
      
    } 
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
} 
?>
  </table>
</form>
</body>
</html>