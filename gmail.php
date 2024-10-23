<!DOCTYPE html>
<html lang="en" dir="ltr"> 
<head>
    <meta charset="UTF-8">
    <title>Send Email</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
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
            margin: 0 auto; /* Center the form */
            position: relative; /* For positioning the button */
        }
        .title {
            color: black;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            margin-bottom: 4px;
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
        .btn-dark {
            background-color: #9e9e9e; /* Darker gray */
            color: white; /* White text */
            font-size: 1.5em; /* Bigger text */
            padding: 3px 7px; /* More padding for a bigger button */
        }
        .back-button {
            position: absolute; /* Positioning it at the upper left */
            top: 20px;
            left: 20px;
            width: 100px;
        }
    </style>
</head>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<body>
    <div class="container">
        <button class="btn btn-dark back-button" onclick="window.location.href='index.php';">Back</button>
        <form class="form" method="POST" action="send.php">
            <span class="title">Send Email</span>
            <input type="email" class="input" name="email" placeholder="Email" required>
            <input type="text" class="input" name="subject" placeholder="Subject" required>
            <input type="text" class="input" name="message" placeholder="Message" required>
            <button type="submit" name="send">Send</button>
        </form>
    </div>
</body>
</html>
