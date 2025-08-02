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
  <a href="ViewBookedServices.php">View Bookng</a>
<form id="form1" name="form1" method="post" action="">
  <table border="1" align = "center">
    <tr>
      <td>S.No</td>
      <td>Amount</td>
      <td>Type</td>
      <td>Action</td>
    </tr>
<?php
$sql = "SELECT * FROM tbl_serviceamount s INNER JOIN tbl_servicetype t ON 
s.servicetype_id = t.servicetype_id
 where servicecenter_id = '".$_GET['sid']."'";
$result = $Con->query($sql);
if ($result->num_rows > 0) {
    $i = 0;
    while($row = $result->fetch_assoc()) {
      $i++;
?>
    <tr>  
      <td><?php echo $i; ?></td>
      <td><?php echo $row['serviceamount_price']; ?></td>
      <td><?php echo $row['servicetype_name']; ?></td>
      <td><a href="" onclick="bookservice(<?php echo $row['serviceamount_id']?>)">Book</a></td>
    </tr>
<?php
      
    } 
} else {
    echo "<tr><td colspan='4'>No records found</td></tr>";
}
?>
  </table>
</form>
</body>
</html>
<script src="../Assets/JQ/JQuery.js"></script>
    <script>
        function bookservice(bid) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxBook.php?bid=" + bid,
                success: function (result) {
                    alert(result);
                }
            });
        }
    </script>