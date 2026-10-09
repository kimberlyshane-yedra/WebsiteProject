<?php
$db_server = "localhost";
$db_user = "root";       
$db_pass = "";          
$db_name = "users"; 
$db_port = "3307";

$conn = mysqli_connect($db_server, $db_user, $db_pass, $db_name, $db_port);

// I-check kung may error sa connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error()."not yet connnected.");
}
?>