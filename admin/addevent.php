<?php
session_start();

// Include config file
include '../php/config.php';

// Define variables and initialize with empty values
$event_name = $hosted_by = $venue = $event_date = "";
$event_name_err = $hosted_by_err = $venue_err = $event_date_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate event name
    if (empty(trim($_POST["event_name"]))) {
        $event_name_err = "Please enter the event name.";
    } else {
        $event_name = trim($_POST["event_name"]);
    }

    // Validate hosted by
    if (empty(trim($_POST["hosted_by"]))) {
        $hosted_by_err = "Please enter the hosting entity.";
    } else {
        $hosted_by = trim($_POST["hosted_by"]);
    }

    // Validate venue
    if (empty(trim($_POST["venue"]))) {
        $venue_err = "Please enter the event venue.";
    } else {
        $venue = trim($_POST["venue"]);
    }

    // Validate event date
    if (empty(trim($_POST["event_date"]))) {
        $event_date_err = "Please select the event date.";
    } else {
        $event_date = trim($_POST["event_date"]);
    }

    // Check input errors before inserting into database
    if (empty($event_name_err) && empty($hosted_by_err) && empty($venue_err) && empty($event_date_err)) {
        // Prepare an insert statement
        $sql = "INSERT INTO admin_events (event_name, hosted_by, venue, event_date, event_image) VALUES (?, ?, ?, ?, ?)";

        if ($stmt = mysqli_prepare($conn, $sql)) {
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssss", $param_event_name, $param_hosted_by, $param_venue, $param_event_date, $param_event_image);

            // Set parameters
            $param_event_name = $event_name;
            $param_hosted_by = $hosted_by;
            $param_venue = $venue;
            $param_event_date = $event_date;

            // Process image upload
            $target_dir = "../uploads/";
            $target_file = $target_dir . basename($_FILES["event_image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["event_image"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
                echo "File is not an image.";
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $uploadOk = 0;
                echo "Sorry, file already exists.";
            }
            // Check file size
            if ($_FILES["event_image"]["size"] > 500000) {
                $uploadOk = 0;
                echo "Sorry, your file is too large.";
            }
            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                && $imageFileType != "gif") {
                $uploadOk = 0;
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                // if everything is ok, try to upload file
            } else {
                if (move_uploaded_file($_FILES["event_image"]["tmp_name"], $target_file)) {
                    $param_event_image = $target_file;
                    // Attempt to execute the prepared statement
                    if (mysqli_stmt_execute($stmt)) {
                        // Redirect to events page after successful submission
                        header("location: addevent.php");
                        exit;
                    } else {
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <!-- Include header -->
    <?php include '../includes/admin-header.php'; ?>

    <div class="main-container">
        <div class="container">
            <h2>Add Event</h2>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <div class="form-group <?php echo (!empty($event_name_err)) ? 'has-error' : ''; ?>">
                    <label>Event Name</label>
                    <input type="text" name="event_name" class="form-control" value="<?php echo $event_name; ?>">
                    <span class="help-block"><?php echo $event_name_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($hosted_by_err)) ? 'has-error' : ''; ?>">
                    <label>Hosted By</label>
                    <input type="text" name="hosted_by" class="form-control" value="<?php echo $hosted_by; ?>">
                    <span class="help-block"><?php echo $hosted_by_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($venue_err)) ? 'has-error' : ''; ?>">
                    <label>Venue</label>
                    <input type="text" name="venue" class="form-control" value="<?php echo $venue; ?>">
                    <span class="help-block"><?php echo $venue_err; ?></span>
                </div>
                <div class="form-group <?php echo (!empty($event_date_err)) ? 'has-error' : ''; ?>">
                    <label>Event Date</label>
                    <input type="date" name="event_date" class="form-control" value="<?php echo $event_date; ?>">
                    <span class="help-block"><?php echo $event_date_err; ?></span>
                </div>
                <div class="form-group">
                    <label>Event Image</label>
                    <input type="file" name="event_image" class="form-control" accept="image/*">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary" value="Add Event">
                </div>
            </form>
        </div>
    </div>

    <!-- Include footer -->
    <?php include '../includes/footer.php'; ?>

</body>

</html>
