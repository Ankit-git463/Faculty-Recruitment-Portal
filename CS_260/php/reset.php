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
        $u=$_POST['u'];    // firstname
        $p=$_POST['p'];    // newpassword 
        $p2=$_POST['p2'];  // confirmpassword 
        $e=$_POST['e'];    // email 
        
        if( strlen($u) < 5){
            
            //$error ="Your username must be atleast 5 characters";
            $_SESSION['message'] = "First Name must be atleast 5 characters";
        }


        else{
            //form is valid
            //connect to db
            $mysqli = $conn;

            // sanitize form data
            $u = $mysqli->real_escape_string($u);
            $p = $mysqli->real_escape_string($p);
            $p2 = $mysqli->real_escape_string($p2);
            $e = $mysqli->real_escape_string($e); 

            // We have new password and confirm password 

            if ($p == $p2 ){
                //$p=md5($p);

                $sql= "UPDATE users SET password = '$p' WHERE firstname='$u' AND email='$e'; " ; 
                $insert = mysqli_query($mysqli , $sql);
                


                if ($insert == True ) // means password is updated successfully
                {   
                    
                    // echo "Password Updated";
                    $_SESSION['message'] = "Password Updated Successfully";
                }

                else {
                    // echo "Password Update Failed";
                    $_SESSION['message'] = "Password Update Failed";
                }



            }

            else {
                $_SESSION['message'] = "Passwords do not match";
                //echo $error = "Passwords do not match" ;
            }

        

        }
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>Faculty Login</title>
    <link rel="stylesheet" href="../css/registration.css">

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
                    <img src="../resources/email.jpg" id="email-logo">
                    
                </div>


                <div class="right-col">

                    <h3><strong><u>RESET PASSWORD VIA EMAIL</u></strong></h3>

                    <?php
                        if(isset($_SESSION['message'])){
                            echo $_SESSION['message']; // session start
                            unset($_SESSION['message']); // removing session message 
                        }

                    ?>


                    <form method ="POST" action="">
                        
                        <table border ="0" align ="center" celllpadding ="5">
                            <tr>
                                <td align = "right">Email Address :</td>
                                <td><input type ="EMAIL" name="e" placeholder="Email" required/></td>
                            </tr>
                            <tr>
                                <td align = "right">Firstname:</td>
                                <td><input type ="TEXT" name="u" placeholder="Firstname" required/></td>
                            </tr>

                            <tr>
                                <td align = "right">New Password:</td>
                                <td><input type ="PASSWORD" name="p" placeholder="New Password" required/></td>
                            </tr>


                            <tr>
                                <td align = "right">Confirm Password:</td>
                                <td><input type ="PASSWORD" name="p2" placeholder = "Confirm Password" required/></td>
                            </tr>

                            
                            
                        </table>

                        <div class="btn-container">
                            <div class="btns" >
                                <button type="submit" name="submit" value="GO">GO</button>
                            </div>

                            </div>
                    </form>

                    <p>
                        <a href='../pages/login.php' class="">LOGIN HERE </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</body>

</html>