<?php
include("../Assets/Connection/Connection.php");
session_start();

if(isset($_POST['btn_submit'])) {
    $type = $_POST['sel_type'];
    $price = $_POST['txt_price'];

    $insertQry = "INSERT INTO tbl_serviceamount (servicetype_id, serviceamount_price,servicecenter_id) VALUES ('$type', '$price', '".$_SESSION['sid']."')";
    if ($Con->query($insertQry)) {
        echo "<script>alert('Service added successfully!');
        window.location.href='AddServices.php';</script>";
       
    } else {
        echo "<script>alert('Error adding service.');</script>";
    }
} 

if(isset($_GET['id'])) {
    $serviceId = $_GET['id'];
    $deleteQry = "DELETE FROM tbl_serviceamount WHERE serviceamount_id='$serviceId' ";
    if ($Con->query($deleteQry)) {
        echo "<script>alert('Service deleted successfully!');
        window.location='AddServices.php';</script>";
    } else {
        echo "<script>alert('Error deleting service.');</script>";
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
  <table width="200" border="1">
    <tr>
      <td>Type</td>
      <td><label for="sel_type"></label>
        <select name="sel_type" id="sel_type">
        <option>...Select...</option>
        <?php
        $qry = "SELECT * FROM tbl_servicetype";
        $result = $Con->query($qry);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='" . $row['servicetype_id'] . "'>" . $row['servicetype_name'] . "</option>";
            }
        } else {
            echo "<option>No service types available</option>";
        }
        ?>
      </select></td>
    </tr>
    <tr>
      <td>Price</td>
      <td><label for="txt_price"></label>
      <input type="text" name="txt_price" id="txt_price" /></td>
    </tr>
    <tr>
      <td height="26" colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table width="200" border="1">
    <tr>
      <td>S.No</td>
      <td>Type</td>
      <td>Price</td>
      <td>Action</td>
    </tr>
<?php
$selQry = "SELECT * FROM tbl_serviceamount sa INNER JOIN tbl_servicetype st ON sa.servicetype_id = st.servicetype_id WHERE sa.servicecenter_id = '".$_SESSION['sid']."'";
$result = $Con->query($selQry);
if ($result->num_rows > 0) {
    $i = 0;
    while($row = $result->fetch_assoc()) {
        $i++;
?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $row['servicetype_name']; ?></td>
      <td><?php echo $row['serviceamount_price']; ?></td>
      <td><a href="AddServices.php?id=<?php echo $row['serviceamount_id']; ?>">Delete</a></td>  
    </tr>
<?php
    }
} else {  
    echo "<tr><td colspan='4'>No services found</td></tr>";
}
?>
  </table>
  <p>&nbsp;</p>
</form>
</body>
</html>