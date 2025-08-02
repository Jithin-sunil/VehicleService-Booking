<?php
include('../Assets/Connection/Connection.php');
if(isset($_POST['btn_submit'])) {
    $reply = $_POST['txt_reply'];
    $complaintId = $_GET['did'];
    
    $updateSql = "UPDATE tbl_complaint SET complaint_reply = '$reply',complaint_status=1 WHERE complaint_id = '$complaintId'";
    if ($Con->query($updateSql)) {
        ?>
        <script>
          alert('Reply submitted successfully!');
          window.location="ViewComplaint.php";
          </script>
          <?php
    } else {
        echo "<script>alert('Failed to submit reply!');</script>";
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
      <td>Reply</td>
      <td><label for="txt_reply"></label>
      <textarea name="txt_reply" id="txt_reply" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>