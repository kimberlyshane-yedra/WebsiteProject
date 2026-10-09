<?php
// I-include ang connection file
include 'dataconnection.php';

// Tiyakin na ang form ay na-submit
if (isset($_POST['submit_appointment'])) {
    
    // Kunin ang input at linisin
    $client_name = mysqli_real_escape_string($conn, $_POST['client_name']);
    $contact_info = mysqli_real_escape_string($conn, $_POST['contact_info']);
    $service_type= mysqli_real_escape_string($conn, $_POST['service_type']);
    $appointment_date= mysqli_real_escape_string($conn, $_POST['appointment_date']);
    $appointment_time= mysqli_real_escape_string($conn, $_POST['appointment_time']);
    
    $sql = "INSERT INTO appointments (client_name, contact_info, service_type, appointment_date, appointment_time) 
            VALUES ('$client_name', '$contact_info', '$service_type', '$appointment_date', '$appointment_time')";
    
    
   if (mysqli_query($conn, $sql)) {
    // I-redirect sa BookNow.php na may status=success
    header("Location: BookNow.html?status=success");
    exit(); // Importante ang exit() para matigil ang script execution
    
} else {
    // I-redirect sa BookNow.php na may status=error
    header("Location: BookNow.html?status=error");
    exit();
}}
?>