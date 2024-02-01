<?php
require 'connection-db.php';

// Define default admin user details
$adminUsername = "Boyet@gmail.com";
$adminPassword = password_hash("admin", PASSWORD_DEFAULT); // Hash the password

// Check if the admin user already exists
$checkQuery = "SELECT * FROM profiles WHERE email = '$adminUsername'";
$result = $con->query($checkQuery);

if ($result->num_rows === 0) {
    // Admin user does not exist, insert it into the database
    $insertQuery = "INSERT INTO profiles (email, password) VALUES ('$adminUsername', '$adminPassword')";

    if ($con->query($insertQuery) === TRUE) {
        echo "Default admin user added successfully.";
    } else {
        echo "Error adding default admin user: " . $con->error;
    }
} else {
    // Admin user already exists
    echo "Default admin user already exists.";
}

// Close connection
$con->close();
?>