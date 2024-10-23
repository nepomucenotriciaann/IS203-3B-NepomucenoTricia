<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    // Redirect to the login page if not logged in
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main Page</title>
    <style>
        body {
            background-color: #f8d3e5;
            text-align: center;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .header {
            background-color: #fff;
            padding: 15px 0;
            margin: 0;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 20px;
        }
        .header a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            margin-left: auto;
            font-size: 18px;
        }
        h1 {
            font-size: 36px;
            margin: 20px 0;
            color: #333;
        }
        .button {
            display: inline-block;
            padding: 15px 30px;
            margin: 10px;
            background-color: #a9a9a9;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            font-size: 20px;
            transition: background-color 0.3s, transform 0.3s;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .button:hover {
            background-color: #808080;
            transform: translateY(-2px);
        }
        .services {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px;
        }
        .advertisement {
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 20px;
            margin: 20px auto;
            width: 80%;
            border-radius: 10px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }
        .book-button {
            background-color: #28a745;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s;
        }
        .book-button:hover {
            background-color: #218838;
        }
        .footer {
            margin-top: 40px;
            font-size: 14px;
            color: #666;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>Essbee Aesthetic Center</h2>
        <div>
            <a href="login.php">Login</a>
            <a href="registration.php">Sign Up</a>
        </div>
    </div>

    <h1>Our Services</h1>

    <div class="services">
        <a href="nails.php" class="button">Nails</a>
        <a href="lashes.php" class="button">Lashes</a>
        <a href="facial.php" class="button">Facial</a>
        <a href="hair.php" class="button">Hair</a>
    </div>

    <div class="advertisement">
        <h2>Special Offer!</h2>
        <p>Book any service today and get 20% off your first visit!</p>
        <p>Experience luxury and relaxation at Essbee Aesthetic Center.</p>
        <p>Call us now to book your appointment!</p>
        <a href="book.php" class="book-button">Book Now</a>
    </div>

    <div class="footer">
        &copy; 2024 Essbee Aesthetic Center. All Rights Reserved.
    </div>

</body>
</html>
