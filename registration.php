<?php

// Database configuration
$host = 'localhost'; // Database host
$db = 'db1'; // Database name
$user = 'root'; // Default username for XAMPP
$pass = ''; // Default password for XAMPP (usually empty)

// Create a connection
$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values and sanitize
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password for security

    // Check if username or email already exists
    $checkSql = "SELECT * FROM regis WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($checkSql);

    if ($result->num_rows > 0) {
        // Username or email already exists
        echo '<script>alert("Username or Email is already in use. Please choose another.");</script>';
    } else {
        // Insert into database
        $sql = "INSERT INTO regis (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($sql) === TRUE) {
            // Redirect to login page on successful registration
            header('Location: login.php');
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8d3e5;
        }
        .form {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 300px;
            background-color: #fff;
            border-radius: 20px;
            padding: 30px 20px;
            box-shadow: 100px 100px 80px rgba(0, 0, 0, 0.03);
        }
        .title {
            color: black;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            margin-bottom: 4px;
        }
        .sub {
            text-align: center;
            color: black;
            font-size: 14px;
            width: 100%;
        }
        .form button {
            align-self: flex-end;
        }
        .input, button {
            border: none;
            outline: none;
            width: 100%;
            padding: 16px 10px;
            background-color: rgb(247, 243, 243);
            border-radius: 10px;
            box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015), 100px 100px 80px rgba(0, 0, 0, 0.03);
        }
        button {
            margin-top: 12px;
            background-color: #f8d3e5;
            color: #000000;
            text-transform: uppercase;
            font-weight: bold;
        }
        .input:focus {
            border: 1px solid rgb(23, 111, 211);
        }
        .show-password {
            display: flex;
            align-items: center;
            gap: 5px;
        }
    </style>
    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const checkbox = document.getElementById("showPassword");
            passwordInput.type = checkbox.checked ? "text" : "password";
        }
    </script>
</head>
<body>
    <form class="form" method="POST" action="">
        <span class="title">Essbee Aesthetic Center</span>
        <span class="sub mb">Register Now</span>
        <input type="text" class="input" name="username" placeholder="Username" required>
        <input type="email" class="input" name="email" placeholder="Email" required>
        <input type="password" class="input" name="password" id="password" placeholder="Password" required>
        <div class="show-password">
            <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()">
            <label for="showPassword">Show Password</label>
        </div>
        <span class="sub">Already have an account? <a href="login.php">Sign in</a></span>
        <button type="submit">Register</button>
    </form>
    
</body>
</html>
