<?php
// Check if data was sent via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if field1 is set
    if (isset($_POST["field1"]))  {
        // Retrieve data from POST
        $field1 = $_POST["field1"];

        // Print the data
        echo "Data received from form 1: " . $field1 . "<br>";
    } else {
        // Handle case if field1 is not set
        echo "Error: field1 not set.<br>";
    }

    
} else {
    // Handle case if request method is not POST
    echo "Error: Invalid request method.<br>";
}
?>
