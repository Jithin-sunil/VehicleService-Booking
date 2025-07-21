<?php
session_start();
include('../Assets/Connection/Connection.php');

if(isset($_POST['btn_login'])) {
    $email = $_POST['txt_email'];
    $password = $_POST['txt_password'];
	
	
    $selQryA = "SELECT * FROM tbl_admin WHERE admin_email = '$email' AND admin_password = '$password'";
    $resultadmin = $Con->query($selQryA);
	
	$selQryU = "SELECT * FROM tbl_user WHERE user_email = '$email' AND user_password = '$password'";
    $resultuser = $Con->query($selQryU);

    $SelQryS = "SELECT * FROM tbl_servicecenter WHERE servicecenter_email = '$email' AND servicecenter_password = '$password'";
    $resultservicecenter = $Con->query($SelQryS);
	

    
    if($rowadmin = $resultadmin->fetch_assoc()) {

            $_SESSION['aid'] = $rowadmin['admin_id'];
            $_SESSION['aname'] = $rowadmin['admin_name'];
            header('location:../Admin/HomePage.php');
    
        
    }
	else  if($rowuser = $resultuser->fetch_assoc()) {

            $_SESSION['uid'] = $rowuser['user_id'];
            $_SESSION['uname'] = $rowuser['user_name'];
            header('location:../User/Homepage.php');
    
        
    }
    else if($rowservicecenter = $resultservicecenter->fetch_assoc()) {

        if($rowservicecenter['servicecenter_status'] == 0) {
            ?>
            <script>alert('Your account is not active. Please contact admin.');</script>
            <?php

            $_SESSION['sid'] = $rowservicecenter['servicecenter_id'];
            $_SESSION['sname'] = $rowservicecenter['servicecenter_name'];
            header('location:../ServiceCenter/Homepage.php');
    
        }
        else if($rowservicecenter['servicecenter_status'] == 2) {
            ?>
            <script>alert('Your account is blocked. Please contact admin.');</script>
            <?php
        }
        else {
            $_SESSION['sid'] = $rowservicecenter['servicecenter_id'];
            $_SESSION['sname'] = $rowservicecenter['servicecenter_name'];
            header('location:../ServiceCenter/Homepage.php');
           
        }
    }
    else {
        ?>
        <script>alert('Invalid email or account not active');</script>
        <?php
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
    <form action="" method="post">
        <table align = "center">
            <tr>
                <td>Email</td>
                <td><input type="email" name="txt_email" id=""></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="txt_password" id=""></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><input type="submit" name="btn_login" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>