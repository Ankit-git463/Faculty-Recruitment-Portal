<?php include("../config/constants.php"); ?>

<?php
session_start();


// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = $conn->real_escape_string($email);
    $password =$conn->real_escape_string($password);

    // $password=md5($password);


    $sql = "SELECT * FROM users WHERE email = '$email' AND password='$password' ; ";

    $res = mysqli_query($conn , $sql);

    if ($res ){


        $count = mysqli_num_rows($res);
        if ($count>0 ){
            // session_start();
            $row = mysqli_fetch_assoc($res);
            $firstname = $row['firstname'];
            $id = $row['id'];

            $_SESSION['login-user']= "SUCCESSFULLY LOGGED IN";
            $_SESSION['firstname']=$firstname;
            $_SESSION['id']=$id;
            header("location:".SITEURL.'faculty-panel.php');
        }

        else{
            $_SESSION['login-user']= "<div class='error'>LOGIN FAILED</div>";
            header("location:".SITEURL.'login.php');
        }
    }

    else{
        $_SESSION['login-user']= "<div class='error'>LOGIN FAILED</div>";
        header("location:".SITEURL.'login.php');

    }

}
else {
    $_SESSION['login-user']= "<div class='error'>No such user found</div>";
    header("location:".SITEURL.'login.php');

}


$conn->close();
?>
