<?php
session_start();
include('../Assets/Connection/Connection.php');
if (isset($_POST['btn_submit'])) {
    $title = $_POST['txt_title'];
    $content = $_POST['txt_content'];
        $insertSql = "INSERT INTO tbl_complaint (complaint_title, complaint_content, user_id, complaint_date) 
                      VALUES ('$title', '$content', '".$_SESSION['uid']."', CURDATE())";
        if ($Con->query($insertSql)) {
            echo "<script>alert('Complaint submitted successfully!');</script>";
        } else {
            echo "<script>alert('Failed to submit complaint!');</script>";
        }
    } 
    
if (isset($_GET['did'])) {
        $deleteSql = "DELETE FROM tbl_complaint WHERE complaint_id = '".$_GET['did']."'";
        if ($Con->query($deleteSql)) {
            ?><script>
            alert('Complaint deleted successfully!');
            window.location='Complaint.php';
            </script><?php
        } else {
            echo "<script>alert('Failed to delete complaint!');</script>";
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
      <td>Title</td>
      <td><label for="txt_title"></label>
      <input type="text" name="txt_title" id="txt_title" /></td>
    </tr>
    <tr>
      <td>Content</td>
      <td><label for="txt_content"></label>
      <input type="text" name="txt_content" id="txt_content" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1" align = "center">
    <tr>
      <td>S.no</td>
      <td>Title</td>
      <td>Content</td>
      <td>Date</td>
      <td>Replay</td>
      <td>Action</td>
    </tr>
<?php
 $i = 0; 
$sql = "SELECT * FROM tbl_complaint WHERE user_id = '".$_SESSION['uid']."'";
$result = $Con->query($sql);
    while($row = $result->fetch_assoc()) {
      $i++;
      ?>
    <tr>
      <td><?php echo $i ?></td>
      <td><?php echo $row['complaint_title'] ?></td>
      <td><?php echo $row['complaint_content'] ?></td>
      <td><?php echo $row['complaint_date'] ?></td>
      <td>
        <?php
        if ($row['complaint_reply'] != '') {
            echo $row['complaint_reply'];
        } else {
            echo "No reply yet";
        }
        ?>
      </td>
      <td><a href="Complaint.php?did=<?php echo $row['complaint_id']?>">Delete</a></td>
    </tr>
    <?php
    }
    ?>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>