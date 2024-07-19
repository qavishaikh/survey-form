<?php
// Database connection settings
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "swiftlead";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO survy (use_swiftlead, additional_feedback) VALUES (?, ?)");
$stmt->bind_param("ss", $use_swiftlead, $additional_feedback);

// Set parameters and execute
$use_swiftlead = $_POST['use_swiftlead'];
$additional_feedback = $_POST['additional_feedback'];

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
