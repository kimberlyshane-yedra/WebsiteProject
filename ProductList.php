<?php

include 'dataconnection.php'; 

// Kukunin ang LAHAT ng produkto (Men at Women)
$sql = "SELECT product_name, gender, price FROM products ORDER BY gender, product_name";
$result = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Product List</title>
    <link rel="stylesheet" href="Second.css"> 
    <style>
        /* CSS para sa Table Styling */
        table { width: 80%; margin: 30px auto; border-collapse: collapse; background-color: white; box-shadow: 0 4px 8px rgba(0,0,0,0.2); }
        th, td { border: 1px solid #ddd; padding: 12px; text-align: left; }
        th { background-color: #000080; color: white; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body class="men-page"> 
    <h1>Full Product Listing (Database View)</h1>

    <div style="text-align:center; margin-bottom: 30px;">
        <a href="men.html" class="simple-back-link">Go to Men's Catalog (Pictures)</a>
        <a href="women.html" class="simple-back-link">Go to Women's Catalog (Pictures)</a>
    </div>

    <table>
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
        </tr>
        <?php
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
        ?>
        <tr>
            <td><?php echo $row['product_name']; ?></td>
            <td><?php echo ucfirst($row['gender']); ?></td>
            <td>₱<?php echo number_format($row['price'], 2); ?></td>
        </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="3">Walang produkto sa database.</td></tr>';
        }
        mysqli_close($conn); 
        ?>
    </table>
    <div class="positionoflink"> 
        <a href="admin.php" class="simple-back-link">Back</a>
    </div>
</body>
</html>