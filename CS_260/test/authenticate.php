<?php
session_start();

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
$password = $_POST['password']; // Hash the password before comparing it with the database

// Check if the username and password match any records in the database
$sql = "SELECT * FROM test WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $_SESSION['user_id'] = $row['id'];
    header("Location: main.php");
} else {
    echo "Invalid username or password";
}

$conn->close();
?>
