<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Signup</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="../css/style.css">

</head>

<body>
    <!-- header -->
    <?php
    include '../includes/header.php';

    // Define variables and initialize with empty values
    $first_name = $last_name = $email = $password = $confirm_password = "";
    $first_name_err = $last_name_err = $email_err = $password_err = $confirm_password_err = "";

    // Define signup success variable
    $signup_success = false;

    // Include config file
    include '../php/config.php';

    // Process form data when form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Validate first name
        if (empty(trim($_POST["first_name"]))) {
            $first_name_err = "Please enter your first name.";
        } else {
            $first_name = trim($_POST["first_name"]);
        }

        // Validate last name
        if (empty(trim($_POST["last_name"]))) {
            $last_name_err = "Please enter your last name.";
        } else {
            $last_name = trim($_POST["last_name"]);
        }

        // Validate email
        if (empty(trim($_POST["email"]))) {
            $email_err = "Please enter your email.";
        } else {
            // Prepare a select statement
            $sql = "SELECT id FROM users WHERE email = ?";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_email);

                // Set parameters
                $param_email = trim($_POST["email"]);

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Store result
                    $stmt->store_result();

                    if ($stmt->num_rows == 1) {
                        $email_err = "This email is already taken.";
                    } else {
                        $email = trim($_POST["email"]);
                    }
                } else {
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }

        // Validate password
        if (empty(trim($_POST["password"]))) {
            $password_err = "Please enter your password.";
        } elseif (strlen(trim($_POST["password"])) < 6) {
            $password_err = "Password must have at least 6 characters.";
        } else {
            $password = trim($_POST["password"]);
        }

        // Validate confirm password
        if (empty(trim($_POST["confirm_password"]))) {
            $confirm_password_err = "Please confirm your password.";
        } else {
            $confirm_password = trim($_POST["confirm_password"]);
            if (empty($password_err) && ($password != $confirm_password)) {
                $confirm_password_err = "Password did not match.";
            }
        }

        // Check input errors before inserting into database
        if (empty($first_name_err) && empty($last_name_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)) {

            // Prepare an insert statement
            $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES (?, ?, ?, ?)";

            $stmt = $conn->prepare($sql);

            if ($stmt) {
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssss", $param_first_name, $param_last_name, $param_email, $param_password);

                // Set parameters
                $param_first_name = $first_name;
                $param_last_name = $last_name;
                $param_email = $email;
                $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

                // Attempt to execute the prepared statement
                if ($stmt->execute()) {
                    // Signup successful, set flag for notification
                    $signup_success = true;
                } else {
                    echo "Oops! Something went wrong";
                }

                // Close statement
                $stmt->close();
            } else {
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
    ?>
    <div class="main-container">
    <div class="signup-container">
            <h2>User Signup</h2><br><br>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="text" name="first_name" placeholder="First Name"
                    value="<?php echo isset($first_name) ? $first_name : ''; ?>">
                <span class="error">
                    <?php echo isset($first_name_err) ? $first_name_err : ''; ?>
                </span>
                <input type="text" name="last_name" placeholder="Last Name"
                    value="<?php echo isset($last_name) ? $last_name : ''; ?>">
                <span class="error">
                    <?php echo isset($last_name_err) ? $last_name_err : ''; ?>
                </span>
                <input type="email" name="email" placeholder="Email"
                    value="<?php echo isset($email) ? $email : ''; ?>">
                <span class="error">
                    <?php echo isset($email_err) ? $email_err : ''; ?>
                </span>
                <input type="password" name="password" placeholder="Password">
                <span class="error">
                    <?php echo isset($password_err) ? $password_err : ''; ?>
                </span>
                <input type="password" name="confirm_password" placeholder="Confirm Password">
                <span class="error">
                    <?php echo isset($confirm_password_err) ? $confirm_password_err : ''; ?>
                </span>
                <input type="checkbox" id="chkbx" name="agree" required>  I agree to the terms and conditions<br>
                <button class="btn" type="submit " value="Signup">Signup</button>
                <a href="login.php"><u>Back to Login</a>
                <?php
                // Display notification if signup is successful
                if ($signup_success) {
                    echo '<div class="notification">Signup successful.</div> <span> You can now <a href="login.php">login</a>.</span>';
                } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && !$signup_success) {
                    echo '<div class="notification error">Signup failed. Please try again later.</div>';
                }
                ?>
            </form>
        </div>
    </div>
</body>

<?php
include '../includes/footer.php';
?>
<script src="../js/script.js"></script>
</html>
