<?php
include 'dataconnection.php';
session_start();

if (isset($_POST['submit_login'])) {
    // Kunin ang input at linisin
    $user_input = mysqli_real_escape_string($conn, $_POST['username_or_email']);
    $password_input = mysqli_real_escape_string($conn, $_POST['password']); 

    $sql = "SELECT * FROM web_user 
            WHERE (username = '$user_input' OR email = '$user_input')
            AND password = '$password_input'";

    $result = mysqli_query($conn, $sql);

    //  I-check kung may nakitang user (Ibig sabihin, tama ang username AT password)
    if (mysqli_num_rows($result) === 1) {
        $user_row = mysqli_fetch_assoc($result);
        
        // Login Success!
        $role = $user_row['role'];
        // I-set ang session variables
        $_SESSION['user_id'] = $user_row['id'];
        $_SESSION['username'] = $user_row['username'];
        $_SESSION['role'] = $role;

        // Redirection Logic
        if ($role === 'admin') {
            header("Location: admin.php");
            exit();
        } else { 
            header("Location: Choices.html");
            exit();
        }
            
    } else {
        // Walang nakitang user sa database (Mali ang username O password)
        echo "Login failed: Invalid username or password.";
    }

    mysqli_close($conn);

} else {
    echo "Invalid request.";
}
?>