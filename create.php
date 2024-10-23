<?php
require('./Database.php'); // Ensure this points to your database connection file

if (isset($_POST['create'])) {
    // Sanitize input values
    $Fname = mysqli_real_escape_string($connection, $_POST['Fname']);
    $Mname = mysqli_real_escape_string($connection, $_POST['Mname']);
    $Lname = mysqli_real_escape_string($connection, $_POST['Lname']);

    // Create the insert query
    $queryCreate = "INSERT INTO studenttbl1 (FirstName, MiddleName, LastName) VALUES ('$Fname', '$Mname', '$Lname')";

    // Execute the query
    $sqlCreate = mysqli_query($connection, $queryCreate);

    if ($sqlCreate) {
        echo '<script>alert("Successfully Created")</script>';
        echo '<script>window.location.href = "/TRICIA3B/Index.php"</script>';
    } else {
        // Display an error message if the query fails
        echo "Error: " . mysqli_error($connection);
    }
}
?>
