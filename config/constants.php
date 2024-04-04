



<?php

    // Start session 
    session_start();

    define("SITEURL",  'http://localhost/CS_260/pages/');

    // Selecting a database
    $server = 'localhost';
    $username = 'root';
    $password = 'iitpatna';
    $database = 'faculty_recruitment';
    $conn = new mysqli($server, $username, $password, $database , 3307) or die("not connected");
    //echo "connected" ; 


?>