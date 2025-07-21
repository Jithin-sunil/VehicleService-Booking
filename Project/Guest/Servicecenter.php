<?php
include('../Assets/Connection/Connection.php');

if (isset($_POST['btn_submit'])) {
    $name = $_POST['txt_name'];
    $email = $_POST['txt_email'];
    $contact = $_POST['txt_contact'];
    $address = $_POST['txt_address'];
    $district = $_POST['sel_district'];
    $place = $_POST['sel_place'];
    $password = $_POST['txt_password'];

    $logo = $_FILES['file_logo']['name'];
    $path_logo = $_FILES['file_logo']['tmp_name'];
    move_uploaded_file($path_logo, "../Assets/Files/ServiceCenter/Logos/" . $logo);
    $proof = $_FILES['file_proof']['name'];
    $path_proof = $_FILES['file_proof']['tmp_name'];
    move_uploaded_file($path_proof, "../Assets/Files/ServiceCenter/Proofs/" . $proof);

    $query = "INSERT INTO tbl_servicecenter (servicecenter_name, servicecenter_email, servicecenter_contact, servicecenter_address, place_id, servicecenter_logo, servicecenter_proof, servicecenter_password) VALUES ('$name', '$email', '$contact', '$address',  '$place', '$logo', '$proof', '$password')";
    if($Con->query($query)) {
        echo "<script>alert('Service Center Registered successfully');
        window.location='Login.php';
        </script>";
    } else {
        echo "<script>alert('Error adding Service Center');</script>";
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
  <table width="200" border="1" align = "center">
    <tr>
      <td>Name</td>
      <td><label for="txt_name"></label>
      <input type="text" name="txt_name" id="txt_name" /></td>
    </tr>
    <tr>
      <td>Email</td>
      <td><label for="txt_email"></label>
      <input type="text" name="txt_email" id="txt_email" /></td>
    </tr>
    <tr>
      <td>Conatct</td>
      <td><label for="txt_contact"></label>
      <input type="text" name="txt_contact" id="txt_contact" /></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txt_address"></label>
      <textarea name="txt_address" id="txt_address" cols="45" rows="5"></textarea></td>
    </tr>
   <tr>
                <td>District</td>
                <td><select name="sel_district" id="sel_district" onchange="getPlace(this.value)">
                    <option value="">...Select...</option>
                    <?php
                    $selQry="SELECT * FROM tbl_district ";
                    $result = $Con->query($selQry);
                    while($row = $result->fetch_assoc()){
                    ?>
                    <option value="<?php echo $row['district_id']; ?>"><?php echo $row['district_name']; ?></option>
                    <?php
                    }
                    ?>
                </select></td>
            </tr>
            <tr>
                <td>Place</td>
                <td><select name="sel_place" id="sel_place">
                    <option value="">...Select...</option>
                </select></td>
            </tr>
    <tr>
      <td>Logo</td>
      <td><label for="file_logo"></label>
      <input type="file" name="file_logo" id="file_logo" /></td>
    </tr>
    <tr>
      <td>Proof</td>
      <td><label for="form_proof"></label>
        <label for="file_proof"></label>
      <input type="file" name="file_proof" id="file_proof" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_password"></label>
      <input type="text" name="txt_password" id="txt_password" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit" /></td>
    </tr>
  </table>
</form>
</body>
</html>
<script src="../Assets/JQ/jQuery.js"></script>
    <script>
        function getPlace(did) {
            $.ajax({
                url: "../Assets/AjaxPages/AjaxPlace.php?did=" + did,
                success: function (result) {
                    $("#sel_place").html(result);
                }
            });
        }
    </script>