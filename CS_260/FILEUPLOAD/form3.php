<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
</head>
<body>
    <h1>Upload Files</h1>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file1">Choose file 1:</label>
        <input type="file" name="file1" id="file1">
        <button type="submit" name="upload1">Upload 1</button>
    </form>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file2">Choose file 2:</label>
        <input type="file" name="file2" id="file2">
        <button type="submit" name="upload2">Upload 2</button>
    </form>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file3">Choose file 3:</label>
        <input type="file" name="file3" id="file3">
        <button type="submit" name="upload3">Upload 3</button>
    </form>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file4">Choose file 4:</label>
        <input type="file" name="file4" id="file4">
        <button type="submit" name="upload4">Upload 4</button>
    </form>

    <h2>Uploaded Files</h2>
    <div id="uploaded-files">
        <?php
        // Display links to all uploaded files from the database
        $servername = "localhost";
        $username = "root";
        $password = "iitpatna";
        $dbname = "dbms";
        
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname, 3307);
        
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Retrieve uploaded files from the database
        $sql = "SELECT filename, filepath FROM uploads";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data for each row
            while($row = $result->fetch_assoc()) {
                echo "<div><a href='" . htmlspecialchars($row['filepath']) . "' target='_blank'>" . htmlspecialchars($row['filename']) . "</a></div>";
            }
        } else {
            echo "No files uploaded yet.";
        }

        $conn->close();
        ?>
    </div>

    <?php
    // Function to handle file uploads
    function handleFileUpload($fileKey, $conn) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES[$fileKey])) {
            $target_dir = "uploads/";
            $target_file = $target_dir . basename($_FILES[$fileKey]["name"]);
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file already exists
            if (file_exists($target_file)) {
                echo "Sorry, file already exists.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES[$fileKey]["size"] > 5000000) { // 5MB limit
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
                if (move_uploaded_file($_FILES[$fileKey]["tmp_name"], $target_file)) {
                    $filename = basename($_FILES[$fileKey]["name"]);
                    $filepath = $target_file;

                    // Insert file information into the database
                    $stmt = $conn->prepare("INSERT INTO uploads (filename, filepath) VALUES (?, ?)");
                    $stmt->bind_param("ss", $filename, $filepath);

                    if ($stmt->execute()) {
                        echo "The file " . htmlspecialchars($filename) . " has been uploaded.";
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }
    }

    // Handle file uploads
    if (isset($_POST['upload1'])) {
        handleFileUpload('file1', $conn);
    }
    if (isset($_POST['upload2'])) {
        handleFileUpload('file2', $conn);
    }
    if (isset($_POST['upload3'])) {
        handleFileUpload('file3', $conn);
    }
    if (isset($_POST['upload4'])) {
        handleFileUpload('file4', $conn);
    }
    ?>
</body>
</html>
