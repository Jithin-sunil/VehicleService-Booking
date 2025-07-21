<?php
$Servername = "localhost";
$Username = "root";
$Password = "";
$DB="db_service";

$Con = mysqli_connect($Servername, $Username, $Password, $DB);

if(!$Con){
    die("Connection failed" );
}


?>