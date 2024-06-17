
<?php include("../config/constants.php"); ?>

<?php

    print_r($_POST);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process registration form
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $category = $_POST['category'];
    $email = $_POST['email'];
    $password = md5($_POST['password'], PASSWORD_DEFAULT);
    $confirm_password = md5($_POST['confirm_password'], PASSWORD_DEFAULT);
    

    $sql = "INSERT INTO users (firstname,lastname ,category,  email, password) VALUES ('$firstname','$lastname','$category',  '$email', '$password')";

    if ($conn->query($sql) === TRUE) {

        // Send verification email

        $verificationCode = md5($email);
        $verificationLink = "https://iitp.faculty-rec.com/verify.php?code=$verificationCode";
        $subject = "Verify Your Email Address";
        $message = "Click the link below to verify your email address:\n$verificationLink";
        
        // mail($email, $subject, $message);
        
        echo "Registration successful. Please check your email for verification.";
    }
}
     
// Close database connection
$conn->close();
?>