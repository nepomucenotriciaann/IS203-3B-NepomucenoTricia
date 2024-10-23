<?php 

require('./Read.php');

$searchQuery = '';
if (isset($_POST['search'])) {
    $searchQuery = $_POST['searchQuery'];
    $sqlAccount = mysqli_query($connection, "SELECT * FROM studenttbl1 WHERE FirstName LIKE '%$searchQuery%' OR MiddleName LIKE '%$searchQuery%' OR LastName LIKE '%$searchQuery%'");
} else {
    $sqlAccount = mysqli_query($connection, "SELECT * FROM studenttbl1");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Records</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: #f8d3e5; 
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
<body>

<div class="container">
    <button class="btn btn-dark back-button" onclick="window.location.href='index.php';">Back</button>
    
    <center>
        <h1>View Records</h1>
    </center>
    <br>

    <form action="" method="post" class="form-inline" style="margin-bottom: 20px;">
        <input type="text" name="searchQuery" class="form-control" placeholder="Search..." value="<?php echo htmlspecialchars($searchQuery); ?>">
        <button type="submit" name="search" class="btn btn-primary">Search</button>
    </form>
   

    <table class="table">
        <thead>
            <tr class="success">
                <th>ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
            </tr>
        </thead>
        <tbody>
        <?php if (mysqli_num_rows($sqlAccount) > 0): ?>
            <?php while ($results = mysqli_fetch_array($sqlAccount)) { ?>
                <tr class="danger">
                    <td><?php echo $results['ID'] ?></td>
                    <td><?php echo $results['FirstName'] ?></td>
                    <td><?php echo $results['MiddleName'] ?></td>
                    <td><?php echo $results['LastName'] ?></td>
                </tr>
            <?php } ?>
        <?php else: ?>
            <tr>
                <td colspan="4">No records found.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>