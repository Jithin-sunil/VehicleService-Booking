<?php
include('../Assets/Connection/Connection.php');
$district = "";
$eid =0;
if(isset($_POST['btn_submit'])){
    $district = $_POST['txt_district'];
    $eid = $_POST['eid'];
    
    // Check if district already exists
    $checkQry = "SELECT * FROM tbl_district WHERE district_name = '$district'";
    if($eid > 0){
        $checkQry .= " AND district_id != '$eid'";
    }
    $checkResult = $Con->query($checkQry);
    
    if($checkResult->num_rows > 0){
        echo "<script>alert('District already exists');</script>";
    } else {
        if($eid == 0){
            $insQry = "INSERT INTO tbl_district (district_name) VALUES ('$district')";
            if($Con->query($insQry)){
                echo "<script>alert('District added successfully');
                window.location='District.php';
                </script>";
            }else{
                echo "<script>alert('District not added');</script>";
            }
        }
        else{
            $updQry = "UPDATE tbl_district SET district_name = '$district' WHERE district_id = '$eid'";
            if($Con->query($updQry)){
                echo "<script>alert('District updated successfully');
                window.location='District.php';
                </script>";
            }else{
                echo "<script>alert('District not updated');</script>";
            } 
        }
    }
}

if(isset($_GET['did'])){
    $did = $_GET['did'];
    $delQry = "DELETE FROM tbl_district WHERE district_id = $did";
    if($Con->query($delQry)){
        echo "<script>alert('District deleted successfully');
        window.location='District.php';
        </script>";
    }else{
        echo "<script>alert('District not deleted');</script>";
    }
}

if(isset($_GET['eid'])){
    $eid = $_GET['eid'];
    $selQry = "SELECT * FROM tbl_district WHERE district_id = '".$eid."'";
    $result = $Con->query($selQry);
    $row = $result->fetch_assoc();
    $district = $row['district_name'];
    $eid = $row['district_id'];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>District</title>
</head>

<body>
    <form action="" method="post">
        <h2>Add District</h2>
        <table align="center">
           
            <tr>
                <td>District Name</td>
                <td><input type="text" name="txt_district" placeholder="Enter District Name" required minlength="2" maxlength="50" pattern="[A-Za-z\s]+" title="Please enter only letters and spaces" value="<?php echo $district; ?>">
                <td><input type="hidden" name="eid" value="<?php echo $eid; ?>"></td>
            </td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit"  value="Add District"></td>
            </tr>
        </table>
    </form>
    <h2>District List</h2>
    <table>
        <tr>
            <th>#</th>
            <th>District Name</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry="SELECT * FROM tbl_district ";
        $result = $Con->query($selQry);
        $i=0;
        while($row = $result->fetch_assoc()){
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['district_name']; ?></td>
            <td>
                <a href="District.php?did=<?php echo $row['district_id']; ?>">Delete</a>
                <a href="District.php?eid=<?php echo $row['district_id']; ?>">Edit</a>
            </td>
        </tr>
        <?php
        }
        ?>
       
</body>

</html>