<?php
include('../Assets/Connection/Connection.php');

if(isset($_POST['btn_submit'])) {
    $photo = $_FILES['txt_photo']['name'];
    $temp = $_FILES['txt_photo']['tmp_name'];
    move_uploaded_file($temp,"../Assets/Files/User/".$photo);

    $insQry = "INSERT INTO tbl_user (user_name, user_email, user_password, user_contact, user_address, place_id, user_photo) 
                   VALUES ('".$_POST['txt_name']."','".$_POST['txt_email']."','".$_POST['txt_password']."','".$_POST['txt_contact']."','".$_POST['txt_address']."','".$_POST['sel_place']."','".$photo."')";
        
        if($Con->query($insQry)) {
            echo "<script>
                alert('Registration successful');
                window.location='User.php';
            </script>";
        }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post" enctype="multipart/form-data">
        <table  align = "center">
            <tr>
                <td>Name</td>
                <td><input type="text" name="txt_name" id="txt_name" /></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="txt_email" id="txt_email" /></td>
            </tr>
            <tr>
                <td>Contact</td>
                <td><input type="text" name="txt_contact" id="txt_contact" /></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea name="txt_address" id="txt_address" cols="10" rows="5"></textarea></td>
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
                <td>Photo</td>
                <td><input type="file" name="txt_photo" id="txt_photo" /></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txt_password" id="txt_password" /></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" /></td>
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