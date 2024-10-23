<?php
session_start(); // Start the session
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Redirect to the registration page
header("Location: registration.php"); // Change 'registration.php' to your actual registration page file
exit();
?>
