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
  <table width="200" border="1" align = "center">
    <tr>
      <td>S.No</td>
      <td>Title</td>
      <td>Content</td>
      <td>Date</td>
      <td>User</td>
      <td>Action</td>
    </tr>
    <?php
    $i = 0;
    $sql = "SELECT * FROM tbl_complaint c INNER JOIN tbl_user u ON c.user_id = u.user_id";
    $result = $Con->query($sql);
  while($data=$result->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data['complaint_title']; ?></td>
      <td><?php echo $data['complaint_content']; ?></td>
      <td><?php echo $data['complaint_date']; ?></td>
      <td><?php echo $data['user_name']; ?>
    <?php echo $data['user_email']; ?>
  <?php echo $data['user_contact']; ?></td>
      <td><?php
        if ($data['complaint_reply'] != '') {
            echo $data['complaint_reply'];
        } else {
          ?>
           <a href="Reply.php?did=<?php echo $data['complaint_id']; ?>">Reply</a>
           <?php
        }
      
        ?>
         </td>
    </tr>
    <?php 
  }
  ?>
  </table>
</form>
</body>
</html>