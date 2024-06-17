<?php
// Check if data was sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Check if field2 is set
    if (isset($_POST["field2"]))  {
        // Retrieve data from POST
        $field2 = $_POST["field2"];

        // Print the data
        echo "Data received from form 2: " . $field2 . "<br>";
    } else {
        // Handle case if field2 is not set
        echo "Error: field2 not set.<br>";
    }
} else {
    // Handle case if request method is not POST
    echo "Error: Invalid request method.<br>";
}
?>
