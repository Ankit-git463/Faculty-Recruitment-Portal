<?php
$servername = "localhost";
$username = "root";
$password = "iitpatna";
$dbname = "dbms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname,3307);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['file'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["file"]["size"] > 5000000) { // 5MB limit
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats (optional)
    $allowed_types = array("jpg", "png", "jpeg", "gif", "pdf", "docx", "xlsx");
    if (!in_array($fileType, $allowed_types)) {
        echo "Sorry, only JPG, JPEG, PNG, GIF, PDF, DOCX, & XLSX files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $filename = basename($_FILES["file"]["name"]);
            $filepath = $target_file;

            // Insert file information into the database
            $stmt = $conn->prepare("INSERT INTO uploads (filename, filepath) VALUES (?, ?)");
            $stmt->bind_param("ss", $filename, $filepath);

            if ($stmt->execute()) {
                // Redirect back to the form with the file URL as a query parameter
                header("Location: form.php?file=" . urlencode($target_file));
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }

            $stmt->close();
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

$conn->close();
?>