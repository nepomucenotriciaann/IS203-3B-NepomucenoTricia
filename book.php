<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
require('./Database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Get the booking data
    $service = $_POST['service'];
    $date = $_POST['date'];
    $time = $_POST['time'];

    // Prepare the statement
    $stmt = $connection->prepare("INSERT INTO bookings (service, date, time) VALUES (?, ?, ?)");
    
    // Check if statement preparation was successful
    if ($stmt === false) {
        die("Error preparing the statement: " . $connection->error);
    }

    // Bind parameters (only service, date, time)
    $stmt->bind_param("sss", $service, $date, $time);
    
    if ($stmt->execute()) {
        $successMessage = "Booking successful! We will see you on $date at $time for your $service.";
    } else {
        $errorMessage = "Error: Unable to book your service. Please try again.";
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book a Service</title>
    <style>
        body {
            background-color: #f8d3e5;
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .form {
            display: inline-block;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        input[type="text"], input[type="date"], input[type="time"] {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .message {
            margin-top: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

    <h1>Book Your Service</h1>
    <form method="POST" action="book.php" class="form"> 
        <input type="text" name="service" placeholder="Service (e.g., Nails, Lashes)" required>
        <input type="date" name="date" required>
        <input type="time" name="time" required>
        <input type="submit" value="Book Now">
    </form>

    <?php if ($stmt->execute()) {
    // Insert notification for admin
    $notificationStmt = $connection->prepare("INSERT INTO notifications (message) VALUES (?)");
    $notificationMessage = "New booking for $service on $date at $time.";
    $notificationStmt->bind_param("s", $notificationMessage);
    $notificationStmt->execute();
    $notificationStmt->close();

    $successMessage = "Booking successful! We will see you on $date at $time for your $service.";
} else {
    $errorMessage = "Error: Unable to book your service. Please try again.";
}
?>
</body>
</html>
