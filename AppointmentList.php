<?php
include 'dataconnection.php'; 
// HANDLE USER DELETION 
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['done_client'])) {
    // Kukunin ang ID mula sa text field (POST data)
    $client_to_delete = mysqli_real_escape_string($conn, $_POST['client_name']);
    
    // Tiyakin na may ID at hindi ito blanko
    if (!empty($client_to_delete)) {
        $delete_sql = "DELETE FROM appointments WHERE client_name = '$client_to_delete'";
        
        if (mysqli_query($conn, $delete_sql)) {
            // Success
            $status_message = "Client " . $client_to_delete . " Done Service.";
        } else {
            $status_message = "Error deleting user: " . mysqli_error($conn);
        }
    } else {
        $status_message = "Please enter a user name to delete.";
    }
}
/*display*/
$sql = "SELECT client_name, contact_info,service_type, appointment_date, appointment_time FROM appointments ORDER BY appointment_date, appointment_time";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Appointment List</title>
    <link rel="stylesheet" href="Second.css"> 
    <style>
        /* CSS para sa Table Styling */
        table { width: 80%; margin: 30px auto; border-collapse: collapse; background-color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #000080; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
    <h1>Full Appoinment List (Database View)</h1>
 <?php 
    // Ipakita ang status ng Delete operation
    if (isset($status_message)) {
        echo "<p style='text-align: center; color: blue;'>$status_message</p>";
    }
    ?>

    <h2>Input Client Name; Done Appointment</h2>
    <form method="POST" action="AppointmentList.php"style="width: 50%; margin: 20px auto; padding: 20px; background-image:url('bag.png'); border-radius: 8px;">
        <input type="text" name="client_name" placeholder="Enter Client Name" required style="width: 70%; padding: 10px;">
        <input type="hidden" name="done_client" value="1">
        <button type="submit" style="width: 25%; padding: 10px; background-color: #dc3545; color: white;">Done</button>
    </form>
    <table>
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Service</th>
            <th>Appointment Dates</th>
            <th>AP Time</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo htmlspecialchars($row['client_name']); ?></td>
            <td><?php echo htmlspecialchars($row['contact_info']); ?></td>
            <td><?php echo htmlspecialchars($row['service_type']); ?></td>
            <td><?php echo date('F j, Y', strtotime($row['appointment_date'])); ?></td>
            <td><?php echo date('h:i A', strtotime($row['appointment_time'])); ?></td>
        </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="3">Invalid and cannot found.</td></tr>';
        }
        mysqli_close($conn); 
        ?>
    </table>
    <div class="positionoflink"> 
        <a href="admin.php" class="simple-back-link">Back</a>
    </div>
</body>
</html>