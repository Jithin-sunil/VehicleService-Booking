<?php
include("../Assets/Connection/Connection.php");
session_start();
$selQry = "SELECT * FROM tbl_user where user_id='" . $_SESSION['uid'] . "'";
$row = $Con->query($selQry);
$data = $row->fetch_assoc();

if(isset($_POST['btn_button'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_address'];

    $updateQry = "UPDATE tbl_user SET user_name='$name', user_email='$email', user_contact='$contact', user_address='$address' WHERE user_id='" . $_SESSION['uid'] . "'";
    if($Con->query($updateQry)) {
        echo "<script>alert('Profile updated successfully!');</script>";
        header("Location: Myprofile.php");
    } else {
        echo "<script>alert('Error updating profile.');</script>";
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
  <table width="414" border="1" align = "center">
    <tr>
      <td width="66">Name</td>
      <td width="336"><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" value="<?php echo $data['user_name']?>" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" value="<?php echo $data['user_email']?>" /></td>
    </tr>
    <tr>
      <td>Contact</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact"  value="<?php echo $data['user_contact']?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"><?php echo $data['user_address']?></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_button" id="btn_button" value="Update" /></td>
    </tr>
  </table>
</form>
</body>
</html>