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
  <table width="200" border="1"  align = "center">
    <tr>
      <td>S.No</td>
      <td>Content</td>
      <td>User</td>
    </tr>
    <?php
    $i = 0;
    $sql = "SELECT * FROM tbl_feedback f INNER JOIN tbl_user u ON f.user_id = u.user_id";
    $result = $Con->query($sql);
  while($row=$result->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['feedback_content']?></td>
      <td><?php echo $row['user_name']; ?>
   </td>
    </tr>
    <?php
    }
    ?>
  </table>
</form>
</body>
</html>
