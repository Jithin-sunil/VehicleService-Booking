<?php
include("../Assets/Connection/Connection.php");
session_start();
$selQry = "SELECT * FROM tbl_servicecenter where servicecenter_id='" . $_SESSION['sid'] . "'";
$row = $Con->query($selQry);
$data = $row->fetch_assoc();

if(isset($_POST['btn_changepassword'])) {
    $oldPassword = $_POST['txt_oldpassword'];
    $newPassword = $_POST['txt_newpassword'];
    $retypePassword = $_POST['txt_retypepassword'];


    if($data['servicecenter_password'] == $oldPassword) {
        if($newPassword == $retypePassword) {
       
            $updateQry = "UPDATE tbl_servicecenter SET servicecenter_password='$newPassword' WHERE servicecenter_id='" . $_SESSION['sid'] . "'";
            if($Con->query($updateQry)) {
                echo "<script>alert('Password changed successfully!');</script>";
                header("Location: Myprofile.php");
            } else {
                echo "<script>alert('Error changing password.');</script>";
            }
        } else {
            echo "<script>alert('New passwords do not match.');</script>";
        }
    } else {
        echo "<script>alert('Old password is incorrect.');</script>";
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
  <table width="200" border="1"  align = "center">
    <tr>
      <td>Old Password</td>
      <td><label for="txt_oldpassword"></label>
      <input type="text" name="txt_oldpassword" id="txt_oldpassword" /></td>
    </tr>
    <tr>
      <td>New Password</td>
      <td><label for="txt_newpassword"></label>
      <input type="text" name="txt_newpassword" id="txt_newpassword" /></td>
    </tr>
    <tr>
      <td>Re-Type Password</td>
      <td><label for="txt_retypepassword"></label>
      <input type="text" name="txt_retypepassword" id="txt_retypepassword" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_changepassword" id="btn_changepassword" value="Change Password" />
      <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" /></td>
    </tr>
  </table>
</form>
</body>
</html>