<?php
// Start the session
session_start();

// Include config file
require_once '../php/config.php';

// Define variables and initialize with empty values
$email = $password = "";
$email_err = $password_err = "";

// Check if the user is not logged in, redirect to login page
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

// Retrieve user information from database
$user_id = $_SESSION['id'];
$sql = "SELECT id, first_name, last_name, email FROM users WHERE id = ?";
if ($stmt = $conn->prepare($sql)) {
    $stmt->bind_param("i", $user_id);
    if ($stmt->execute()) {
        $stmt->store_result();
        if ($stmt->num_rows == 1) {
            $stmt->bind_result($username, $first_name, $last_name, $email);
            $stmt->fetch();
        }
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php include '../includes/header.php'; ?>

    <div class="main-container">
        <div class="profile-container">
            <h2>User Profile</h2>
            <div class="profile-info">
               
                <p><strong>First Name:</strong> <?php echo htmlspecialchars($first_name); ?></p>
                <p><strong>Last Name:</strong> <?php echo htmlspecialchars($last_name); ?></p>
                <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                <p><a href="updateprofile.php">Update Profile</a></p>
            </div>
        </div>
    </div>

    <?php include '../includes/footer.php'; ?>
</body>
<script src="../js/script.js"></script>

</html>
