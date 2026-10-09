<?php
// I-include ang connection file
include 'dataconnection.php';

if (isset($_POST['submit_signup'])) {
    // Kunin ang input at linisin
    $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if ($password !== $confirm_password) {
        die("Error: Passwords do not match!");
    }

    $raw_password = mysqli_real_escape_string($conn, $password); 
    $role = 'user';
    $sql = "INSERT INTO web_user (fullname, username, email, password, role) 
             VALUES ('$fullname', '$username', '$email', '$raw_password', '$role')";

    if (mysqli_query($conn, $sql)) {
       header("Location: Choices.html"); 
    exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
    
    mysqli_close($conn);

} else {
    echo "Invalid request.";
}
?>