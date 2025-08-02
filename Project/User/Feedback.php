<?php
include('../Assets/Connection/Connection.php');
session_start();
if(isset($_POST['btn_Submit'])){
    $content = $_POST['txt_content'];
   
	
$insQry = "INSERT INTO tbl_feedback (feedback_content,user_id,feedback_date) VALUES ('$content','".$_SESSION['uid']."',curdate())";
            if($Con->query($insQry)){
                echo "<script>alert('feedback added successfully');
                window.location='feedback.php';
                </script>";
            }else{
                echo "<script>alert('feedback not added');</script>";
            }	
}

if(isset($_GET['did'])){
    $delQry = "DELETE FROM tbl_feedback WHERE feedback_id = '".$_GET['did']."'";
    if($Con->query($delQry)){
        echo "<script>alert('feedback deleted successfully');
        window.location='Feedback.php';
        </script>";
    }else{
        echo "<script>alert('feedback not deleted');</script>";
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
      <td>Content</td>
      <td><label for="txt_content"></label>
      <textarea name="txt_content" id="txt_content" cols="45" rows="5"></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_Submit" id="btn_Submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table border="1" align = "center">
    <tr>
      <td>S.No</td>
      <td>Content</td>
      <td>User</td>
    </tr>
    <?php
    $i = 0;
    $sql = "SELECT * FROM tbl_feedback where user_id = '".$_SESSION['uid']."'";
    $result = $Con->query($sql);
  while($row=$result->fetch_assoc())
  {
    $i++;
    ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['feedback_content']?></td>
      <td><a href="Feedback.php?did=<?php echo $row['feedback_id']?>">Delete</a>
   </td>
    </tr>
    <?php
    }
    ?>
</form>
</body>
</html>