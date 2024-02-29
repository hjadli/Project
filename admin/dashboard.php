<?php
session_start();

// Check if admin is not logged in, redirect to admin login page
if(!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true){
    header("location: admin.php");
    exit;
}

// Include config file
require_once "../php/config.php";

// Initialize variable to store admin name
$admin_name = "";

// Prepare a select statement
$sql = "SELECT username FROM admins WHERE id = ?";

if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    // Set parameters
    $param_id = $_SESSION["admin_id"];

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then fetch the result
        if(mysqli_stmt_num_rows($stmt) == 1){
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $admin_name);
            if(mysqli_stmt_fetch($stmt)){
                // Admin name fetched successfully
            }
        }
    }
    // Close statement
    mysqli_stmt_close($stmt);
}
// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/style.css">
    
</head>

<body>
    <?php require_once '../includes/admin-header.php'; ?>
    <div class="container">
            <div class="card">
                <img src="https://via.placeholder.com/400x200" alt="Card Image">
                <div class="card-content">
                    <h3>Card 1</h3>
                    <p>Description of Card 1</p>
                    <!-- Button to redirect to addevent.php -->
                    <a href="addevent.php" class="button">Add Event</a>
                </div>
            </div>
    </div>
</body>

</html>
