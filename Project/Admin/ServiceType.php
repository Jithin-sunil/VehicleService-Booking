<?php
include('../Assets/Connection/Connection.php');
$servicetype = "";
$eid =0;
if(isset($_POST['btn_submit'])){
    $servicetype = $_POST['txt_servicetype'];
    $eid = $_POST['eid'];
    
    // Check if servicetype already exists
    $checkQry = "SELECT * FROM tbl_servicetype WHERE servicetype_name = '$servicetype'";
    if($eid > 0){
        $checkQry .= " AND servicetype_id != '$eid'";
    }
    $checkResult = $Con->query($checkQry);
    
    if($checkResult->num_rows > 0){
        echo "<script>alert('servicetype already exists');</script>";
    } else {
        if($eid == 0){
            $insQry = "INSERT INTO tbl_servicetype (servicetype_name) VALUES ('$servicetype')";
            if($Con->query($insQry)){
                echo "<script>alert('servicetype added successfully');
                window.location='ServiceType.php';
                </script>";
            }else{
                echo "<script>alert('servicetype not added');</script>";
            }
        }
        else{
            $updQry = "UPDATE tbl_servicetype SET servicetype_name = '$servicetype' WHERE servicetype_id = '$eid'";
            if($Con->query($updQry)){
                echo "<script>alert('servicetype updated successfully');
                window.location='ServiceType.php';
                </script>";
            }else{
                echo "<script>alert('servicetype not updated');</script>";
            }
        }
    }
}

if(isset($_GET['did'])){
    $did = $_GET['did'];
    $delQry = "DELETE FROM tbl_servicetype WHERE servicetype_id = $did";
    if($Con->query($delQry)){
        echo "<script>alert('servicetype deleted successfully');
        window.location='ServiceType.php';
        </script>";
    }else{
        echo "<script>alert('servicetype not deleted');</script>";
    }
}

if(isset($_GET['eid'])){
    $eid = $_GET['eid'];
    $selQry = "SELECT * FROM tbl_servicetype WHERE servicetype_id = '".$eid."'";
    $result = $Con->query($selQry);
    $row = $result->fetch_assoc();
    $servicetype = $row['servicetype_name'];
    $eid = $row['servicetype_id'];

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ServiceType</title>
</head>

<body>
    <form action="" method="post">
        <h2>Add ServiceType</h2>
        <table align = "center">
           
            <tr>
                <td>ServiceType Name</td>
                <td><input type="text" name="txt_servicetype" placeholder="Enter servicetype Name" required minlength="2" maxlength="50" pattern="[A-Za-z\s]+" title="Please enter only letters and spaces" value="<?php echo $servicetype; ?>">
                <td><input type="hidden" name="eid" value="<?php echo $eid; ?>"></td>
            </td>
            </tr>

            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_submit"  value="Add servicetype"></td>
            </tr>
        </table>
    </form>
    <h2>ServiceType List</h2>
    <table align = "center">
        <tr>
            <th>#</th>
            <th>ServiceType Name</th>
            <th>Action</th>
        </tr>
        <?php
        $selQry="SELECT * FROM tbl_servicetype ";
        $result = $Con->query($selQry);
        $i=0;
        while($row = $result->fetch_assoc()){
            $i++;
        ?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $row['servicetype_name']; ?></td>
            <td>
                <a href="ServiceType.php?did=<?php echo $row['servicetype_id']; ?>">Delete</a>
                <a href="ServiceType.php?eid=<?php echo $row['servicetype_id']; ?>">Edit</a>
            </td>
        </tr>
        <?php
        }
        ?>
       
</body>

</html>