<?php
include('../Assets/Connection/Connection.php');
session_start();

if(isset($_POST['btn_submit'])) {
    $description = $_POST['txt_description'];
    $amount = $_POST['txt_amount'];
    
    $photo = $_FILES['file_photo']['name'];
    $photo_tmp = $_FILES['file_photo']['tmp_name'];
    move_uploaded_file($photo_tmp, "../Assets/Files/ServiceCenter/Package/" . $photo);

    $query = "INSERT INTO tbl_package (package_description, package_amount, package_photo,servicecenter_id) VALUES ('$description', '$amount',  '$photo','".$_SESSION['sid']."')";
    if($Con->query($query)) {
        echo "<script>alert('Package added successfully');
        window.location='Package.php';</script>";
        
    } else {
        echo "<script>alert('Error adding package');</script>";
    }
}

if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM tbl_package WHERE package_id='$id'";
    if($Con->query($query)) {
        echo "<script>alert('Package deleted successfully');
        window.location='Package.php';</script>";
    } else {
        echo "<script>alert('Error deleting package');</script>";
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
<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="200" border="1">
    <tr>
      <td>Description</td>
      <td><label for="txt_description"></label>
      <input type="text" name="txt_description" id="txt_description" /></td>
    </tr>
    <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
      <input type="file" name="file_photo" id="file_photo" /></td>
    </tr>
    <tr>
      <td>Amount</td>
      <td><label for="txt_amount"></label>
      <input type="text" name="txt_amount" id="txt_amount" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>S.No</td>
      <td>Description</td>
      <td>Photo</td>
      <td>Amount</td>
      <td>Action</td>
    </tr>
    <?php
    $query = "SELECT * FROM tbl_package WHERE servicecenter_id='".$_SESSION['sid']."'";
    $result = $Con->query($query);
    $i = 0;
    while($row = $result->fetch_assoc()) {
       $i++;
    ?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['package_description']; ?></td>
      <td><img src="../Assets/Files/ServiceCenter/Package/<?php echo $row['package_photo']; ?>" width="50" height="50" /></td>
      <td><?php echo $row['package_amount']; ?></td>
      <td><a href="Package.php?id=<?php echo $row['package_id']; ?>">Delete</a></td>
    </tr>
    <?php
   
    }
    ?>
   
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>
