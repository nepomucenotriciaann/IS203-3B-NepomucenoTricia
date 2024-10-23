<?php

require('./Database.php');

// Start the session
session_start();

$error = '';

if (isset($_POST['edit'])) {
    $editID = $_POST['editID'];
    $editF = $_POST['editF'];
    $editM = $_POST['editM'];
    $editL = $_POST['editL'];
}

if (isset($_POST['update'])) {
    $updateID = $_POST['updateID'];
    $updateF = $_POST['updateF'];
    $updateM = $_POST['updateM'];
    $updateL = $_POST['updateL'];

    // Use prepared statements for security
    $stmt = $connection->prepare("UPDATE studenttbl1 SET FirstName = ?, MiddleName = ?, LastName = ? WHERE ID = ?");
    $stmt->bind_param("sssi", $updateF, $updateM, $updateL, $updateID);

    if ($stmt->execute()) {
        echo '<script>alert("Successfully Edited!")</script>';
        echo '<script>window.location.href = "/TRICIA3B/Index.php"</script>';
    } else {
        $error = 'Update failed. Please try again.';
    }

    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Information</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8d3e5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            border-radius: 20px;
            padding: 30px 20px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 400px;
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: black;
        }
        .alert {
            text-align: center;
            margin-top: 15px;
            color: red;
        }
        .input {
            border: none;
            outline: none;
            width: 100%;
            padding: 16px 10px;
            background-color: rgb(247, 243, 243);
            border-radius: 10px;
            margin-bottom: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        button {
            background-color: #f8d3e5;
            color: #000;
            text-transform: uppercase;
            font-weight: bold;
            border: none;
            outline: none;
            width: 100%;
            padding: 16px 10px;
            border-radius: 10px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit User Info</h1>
        <form method="POST" action="">
            <input type="text" class="input" name="updateF" placeholder="First Name" value="<?php echo htmlspecialchars($editF); ?>" required />
            <input type="text" class="input" name="updateM" placeholder="Middle Name" value="<?php echo htmlspecialchars($editM); ?>" required />
            <input type="text" class="input" name="updateL" placeholder="Last Name" value="<?php echo htmlspecialchars($editL); ?>" required />
            <?php if ($error): ?>
                <div class="alert">
                    <?php echo htmlspecialchars($error); ?>
                </div>
            <?php endif; ?>
            <input type="hidden" name="updateID" value="<?php echo htmlspecialchars($editID); ?>" />
            <button type="submit" name="update">Edit</button>
        </form>
    </div>
</body>
</html>
