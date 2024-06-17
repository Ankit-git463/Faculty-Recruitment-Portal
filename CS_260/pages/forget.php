
<?php include("../config/constants.php"); ?>

<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../PHPMailer/src/Exception.php';
    require '../PHPMailer/src/PHPMailer.php';
    require '../PHPMailer/src/SMTP.php';
    $error = NULL;

    

    
    if(isset($_POST['submit']))
    {   

        // Using the first name and email to reset the paasword 
        $firstname=$_POST['firstname'];
        $email = $_POST['email'];

        $firstname = $conn->real_escape_string($firstname);
        $email = $conn->real_escape_string($email);
        
        // writing the SQL query 
        $sql = "SELECT * FROM users WHERE email = '$email' and firstname='$firstname' ; ";

        // Running the sql query
        $res = mysqli_query($conn , $sql);
        

        if ($res ){
            
            $count = mysqli_num_rows($res);

            if ($count>0 ){

                $row = mysqli_fetch_assoc($res);
                $vkey = $row['vkey'] ;
                //echo $vkey ;   


                // Sending the mail 
                $mail = new PHPMailer(true);

                // Enable SMTP debugging
                $mail->SMTPDebug = 0; // Set to 2 for more detailed debugging

                // Set mailer to use SMTP
                $mail->isSMTP();

                // Specify SMTP server
                $mail->Host = 'smtp.gmail.com'; // Your SMTP server address for Gmail

                // Enable SMTP authentication
                $mail->SMTPAuth = true;

                // SMTP username (your Gmail email address)
                $mail->Username = 'dvermahapur@gmail.com'; // Your Gmail email address

                // SMTP password (generated app password)
                $mail->Password = 'ddzj fevb xgsi ohdd'; // Your generated app password

                // Enable TLS encryption
                $mail->SMTPSecure = 'tls';

                // TCP port to connect to
                $mail->Port = 587; // Your SMTP port for Gmail

                $mail->SMTPOptions = array(
                    'ssl' => array(
                        'verify_peer' => false,
                        'verify_peer_name' => false,
                        'allow_self_signed' => true
                    )
                );

                // Set sender and recipient
                $mail->setFrom('faculty-rec.iitp@gmail.com', 'Recruitment Office');
                $mail->addAddress($email); // Add a recipient

                // Email subject and body
                $mail->Subject = 'Reset Password';
                $mail->isHTML(true);

                $mail->Body = "You're receiving this e-mail because you or someone  has requested a password reset for your user account.
                If you did not request a password reset you can safely ignore this email. '\n\n'
                <a href='http://localhost/CS_260/php/reset.php?vkey=$vkey'>Click Reset Password Link</a>";

                // Send email

                $mail->send();

                if (!$mail->send()) {

                    $error= 'Message could not be sent.';
                    //echo 'Mailer Error: ' . $mail->ErrorInfo;
                } 
                else {

                    header('location:thankyou.php');
                } 
            }
            
            else{
                $error= "No such record found";

            }
        }
        else{
            $error= "No such record found";
            // echo $mysqli->error;
        }

        if ($error != NULL ){
            $_SESSION['message']="$error";
            //echo $error; 
        }

        
    }
?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Login</title>
    <link rel="stylesheet" href="../css/login.css">

</head>

<body>

    <div class="intstname">
        <div style="margin-bottom:10px; ">
            <div>
                <h3 class="hindi-name">भारतीय प्रौद्योगिकी संस्थान पटना</h3>
                <h3 class="eng-name">Indian Institute of Technology Patna</h3>


            </div>
        </div>

    </div>


    <div class="container">

        <div class="box-container">

            <div class="">

                <div class="left-col">
                    <img src="../resources/IITP.png" id="login-logo">
                    
                </div>



                <div class="right-col">

                    <h3><strong><u>SEND RESET LINK</u></strong></h3>

                    <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message'];
                            unset($_SESSION['message']); // removing session message 
                        }

                    ?>


                    <form  action="" method="post">

                        <div class="lgn-data">
                            <input type="text" name="email" placeholder="Email" autofocus="" required />
                        </div>
                        

                        <div class="lgn-data">
                            <input type="text" name="firstname" placeholder="Firstname"  required>
                        </div>
                        

                        <div class="btn-container">
                            <div class="btns">
                                <button type="submit" name="submit"  >Send Link On Mail </button>
                            </div>
                        </div>

                
                    </form>
                    

                    

                </div>
            </div>
        </div>
    </div>
</body>

</html>