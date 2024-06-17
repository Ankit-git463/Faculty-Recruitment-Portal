<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File Upload Form</title>
</head>
<body>
    <h1>Upload a File</h1>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="file">Choose a file:</label>
        <input type="file" name="file" id="file">
        <button type="submit">Upload</button>
    </form>

    <!-- Placeholder for the view link, will be populated by PHP -->
    <div id="view-file">
        <?php
        if (isset($_GET['file'])) {
            echo $fileUrl = htmlspecialchars($_GET['file']);
            //echo "<a href='$fileUrl' target='_blank'>View File</a>";
        }
        ?>
    </div>
</body>
</html>
