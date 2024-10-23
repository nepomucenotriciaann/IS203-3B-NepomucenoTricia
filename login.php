<?php

require('./Database.php');

// Start the session
session_start();

$error = '';

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Fetch the user from the database
    $stmt = $connection->prepare("SELECT password FROM regis WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashedPassword);
        $stmt->fetch();

        // Verify the password
        if (password_verify($password, $hashedPassword)) {
            // Successful login
            $_SESSION['username'] = $username; // Store username in session

            // Redirect based on the username
            if ($username === 'admin') {
                header("Location: index.php"); // Redirect to index for admin
            } else {
                header("Location: main.php"); // Redirect for regular clients
            }
            exit();
        } else {
            $error = 'Incorrect password. Please try again.';
        }
    } else {
        $error = 'Username does not exist.';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
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
        .sub a {
            color: rgb(23, 111, 211);
        }
        .input {
            border: none;
            outline: none;
            width: 100%;
            padding: 16px 10px;
            background-color: rgb(247, 243, 243);
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .input:focus {
            border: 1px solid rgb(23, 111, 211);
        }
        button {
            margin-top: 12px;
            background-color: #f8d3e5;
            color: #000000;
            text-transform: uppercase;
            font-weight: bold;
            border: none;
            outline: none;
            width: 100%;
            padding: 16px 10px;
            border-radius: 10px;
            cursor: pointer;
        }
        .alert {
            text-align: center;
            margin-top: 15px;
            color: red;
        }
    </style>
</head>
<body>
    <form class="form" method="POST" action="">
        <span class="title">Welcome Back!</span>
        <span class="sub">Login to your account</span>
        <input type="text" class="input" name="username" placeholder="Username" required>
        <input type="password" class="input" name="password" placeholder="Password" required>
        
        <?php if ($error): ?>
            <div class="alert">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <button type="submit" name="login">Login</button>
        <span class="sub">Don't have an account? <a href="registration.php">Register here</a></span>
    </form>
</body>
</html>
