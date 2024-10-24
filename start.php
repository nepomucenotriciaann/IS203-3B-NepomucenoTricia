<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Essbee Aesthetic Center</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f8d3e5;
            font-family: Arial, sans-serif;
        }
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
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
            font-size: 24px;
        }
        .sub {
            text-align: center;
            color: black;
            font-size: 14px;
        }
        .button {
            border: none;
            outline: none;
            width: 100%;
            padding: 16px 10px;
            background-color: #f8d3e5;
            border-radius: 10px;
            box-shadow: 12.5px 12.5px 10px rgba(0, 0, 0, 0.015), 100px 100px 80px rgba(0, 0, 0, 0.03);
            color: #000;
            text-transform: uppercase;
            font-weight: bold;
            cursor: pointer;
        }
        .button:hover {
            background-color: #e0b3d1;
        }
    </style>
</head>
<body>
    <div class="container" action="registration.php">
        <span class="title">Welcome to Essbee Aesthetic Center</span>
        <span class="sub">Your journey to beauty begins here!</span>
        <a href="registration.php"><button class="button">Register</button></a>
        <a href="login.php"><button class="button">Login</button></a>
        <div align="center">
            <small>Programmed by: Tricia Ann M. Nepomuceno</small>
        </div>
    </div>
</body>
</html>
