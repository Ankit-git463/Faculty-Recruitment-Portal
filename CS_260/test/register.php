<?php
// Connect to your database
$servername = "localhost";
$username = "root";
$password = "iitpatna";
$dbname = "faculty_recruitment";

$conn = new mysqli($servername, $username, $password, $dbname,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password']; // Hash the password before saving it to the database
$email = $_POST['email'];

// Insert user data into the database
$sql = "INSERT INTO test (username, password, email) VALUES ('$username', '$password', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "User registered successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
