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
    <div id="view-file1">
        <?php
        if (isset($_GET['file1'])) {
            $fileUrl1 = htmlspecialchars($_GET['file1']);
            echo "<a href='$fileUrl1' target='_blank'>View File 1</a>";
        }
        ?>
    </div>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file2">Choose file 2:</label>
        <input type="file" name="file2" id="file2">
        <button type="submit" name="upload2">Upload 2</button>
    </form>
    <div id="view-file2">
        <?php
        if (isset($_GET['file2'])) {
            $fileUrl2 = htmlspecialchars($_GET['file2']);
            echo "<a href='$fileUrl2' target='_blank'>View File 2</a>";
        }
        ?>
    </div>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file3">Choose file 3:</label>
        <input type="file" name="file3" id="file3">
        <button type="submit" name="upload3">Upload 3</button>
    </form>
    <div id="view-file3">
        <?php
        if (isset($_GET['file3'])) {
            $fileUrl3 = htmlspecialchars($_GET['file3']);
            echo "<a href='$fileUrl3' target='_blank'>View File 3</a>";
        }
        ?>
    </div>
    
    <form action="" method="post" enctype="multipart/form-data">
        <label for="file4">Choose file 4:</label>
        <input type="file" name="file4" id="file4">
        <button type="submit" name="upload4">Upload 4</button>
    </form>
    <div id="view-file4">
        <?php
        if (isset($_GET['file4'])) {
            $fileUrl4 = htmlspecialchars($_GET['file4']);
            echo "<a href='$fileUrl4' target='_blank'>View File 4</a>";
        }
        ?>
    </div>

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

    function handleFileUpload($fileKey, $buttonName, $conn) {
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
                        // Display the link to view the file
                        echo "<div id='view-file'>";
                        echo "<a href='" . htmlspecialchars($target_file) . "' target='_blank'>View File</a>";
                        echo "</div>";
                        // Redirect back to the form with the file URL as a query parameter
                        // header("Location: index.php?$buttonName=" . urlencode($filepath));
                        // exit();
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

    handleFileUpload('file1', 'file1', $conn);
    handleFileUpload('file2', 'file2', $conn);
    handleFileUpload('file3', 'file3', $conn);
    handleFileUpload('file4', 'file4', $conn);

    $conn->close();
    ?>
</body>
</html>
