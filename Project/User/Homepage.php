<?php
include("../Assets/Connection/Connection.php");
session_start();
$selQry="select * from tbl_user where user_id='".$_SESSION['uid']."'";
$row=$Con->query($selQry);
$data=$row->fetch_assoc();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<p>welcome <?php echo $data['user_name']?>
  <a href="Myprofile.php">MyProfile</a>
</p>

<p>&nbsp;</p>
</body>
</html>