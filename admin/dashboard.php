<?php
session_start();

// Check if admin is not logged in, redirect to admin login page
if (!isset($_SESSION["admin_loggedin"]) || $_SESSION["admin_loggedin"] !== true) {
    header("location: admin.php");
    exit;
}

// Include config file
require_once "../php/config.php";

// Initialize variable to store admin name
$admin_name = "";

// Prepare a select statement
$sql = "SELECT username FROM admins WHERE id = ?";

if ($stmt = mysqli_prepare($conn, $sql)) {
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    // Set parameters
    $param_id = $_SESSION["admin_id"];

    // Attempt to execute the prepared statement
    if (mysqli_stmt_execute($stmt)) {
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if username exists, if yes then fetch the result
        if (mysqli_stmt_num_rows($stmt) == 1) {
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $admin_name);
            if (mysqli_stmt_fetch($stmt)) {
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
    <style>
        


.dashboard-container {
  position: relative;
  top: 131px;
  left: 65px;

}

.dashboard-container .card {
  display: flex;
  flex-direction: column;
  align-items: center;
  /* background-color: blanchedalmond; */
  width: 20%;
  border-radius: 15px;
  box-shadow: 0px 0px 5px 1px black;


}
.dashboard-container .card:hover{
 background-color: aliceblue;
 transition: ease-in 0.7s;
 
 


}
.dashboard-container img {
  height: 200px;
  width: 200px;
}

.dashboard-container a {
  display: block;
  margin-top: 10px;
  background-color: black;
  color: white;
  width: 100%;
  padding: 12px;
  border-radius: 23px;

}
.dashboard-container a:hover{
  background-color: darkorange;
  color: black;
}

    </style>

</head>

<body>
    <?php require_once '../includes/admin-header.php'; ?>
    <div class="dashboard-container">
        <div class="card">
            <img src="../images/add.png" alt="Card Image">
            <div class="card-content">

                <!-- Button to redirect to addevent.php -->
                <a href="addevent.php" class="button">Add Event</a>
            </div>
        </div>
    </div>
</body>

</html>