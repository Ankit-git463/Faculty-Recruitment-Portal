
<?php

 
    

    define("SITEURL",  'http://localhost/CS_260/pages/');
    define("MAINSITEURL",  'http://localhost/CS_260/');

    // Selecting a database
    $server = 'localhost';
    $username = 'root';
    $password = 'iitpatna';
    $database = 'faculty_recruitment';
    $conn = new mysqli($server, $username, $password, $database, 3307) or die("not connected");



?>