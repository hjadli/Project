<?php
session_start();

// Include config file
include '../php/config.php';

// Define an empty array to store the fetched events
$events = [];

// Attempt to fetch events from the database
$sql = "SELECT event_name, hosted_by, venue, event_date, event_image FROM admin_events";
if ($result = mysqli_query($conn, $sql)) {
    // Fetch associative array
    while ($row = mysqli_fetch_assoc($result)) {
        $events[] = $row;
    }
    // Free result set
    mysqli_free_result($result);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <?php include '../includes/header.php'; ?>
    <div class="main-container">
        <div class="events-container">
            <?php foreach ($events as $event): ?>
                <div class="card">
                    <div class="image">
                        <img src="<?php echo htmlspecialchars($event['event_image']); ?>" alt="Event Image">
                    </div>
                    <div class="content">
                        <h2><?php echo htmlspecialchars($event['event_name']); ?></h2>
                        <div class="info">
                            <h3>Hosted by: <?php echo htmlspecialchars($event['hosted_by']); ?></h3>
                            <p>Venue: <?php echo htmlspecialchars($event['venue']); ?></p>
                            <p>Date: <?php echo htmlspecialchars($event['event_date']); ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <?php include '../includes/footer.php'; ?>
</body>
</html>
