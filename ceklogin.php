<?php
// Include the database connection file
include "koneksi.php";

// Get values from the form
$EMAIL = $_POST['email'];
$PASSWORD = $_POST['password'];

// Perform SQL injection prevention
$EMAIL = mysqli_real_escape_string($db, $EMAIL);
$PASSWORD = mysqli_real_escape_string($db, $PASSWORD);

// Hash the password (assuming you are storing hashed passwords in the database)
$hashedPassword = password_hash($PASSWORD, PASSWORD_DEFAULT);

// Example SQL query to check if the user exists
$query = "SELECT * FROM `users` WHERE `email`='$EMAIL'";
$result = mysqli_query($db, $query);

if (!$result) {
    die("Query failed: " . mysqli_error($db));
}

// Check if the user exists
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Verify the password
    if (password_verify($PASSWORD, $row['password'])) {
        // Password is correct
        header("Location:bootstrapdashboard/home.php");
    } else {
        // Password is incorrect
        echo "Incorrect password";
    }
} else {
    // User does not exist
    echo "User not found";
}

// Close the database connection
mysqli_close($db);
?>
