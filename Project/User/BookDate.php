<?php
include('../Assets/Connection/Connection.php');
session_start();

if (isset($_POST['btn_submit'])) {
    $date = $_POST['txt_date'];

    if (isset($_SESSION['bid'])) {
        $bookingId = $_SESSION['bid'];
        $updateSql = "UPDATE tbl_booking SET booking_todate = '$date' WHERE booking_id = '$bookingId'";
        if ($Con->query($updateSql)) {
            echo "<script>alert('Booking date updated!');
            window.location='Homepage.php';</script>";
        } else {
            echo "<script>alert('Update failed!');</script>";
        }
    } else if (isset($_GET['pid'])) {
        $packageId = $_GET['pid'];
        $insertSql = "INSERT INTO tbl_packagebooking (package_id, packagebooking_todate, user_id, packagebooking_date) 
                      VALUES ('$packageId', '$date', '".$_SESSION['uid']."', CURDATE())";
        if ($Con->query($insertSql)) {
            echo "<script>alert('Booking successful!');
            window.location='Homepage.php';</script>";
        } else {
            echo "<script>alert('Booking failed!');</script>";
        }
    }
}
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
      <td>Date</td>
      <td><label for="txt_date"></label>
      <input type="date" name="txt_date" id="txt_date" min="<?php echo date('Y-m-d')?>" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>