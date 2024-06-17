
<?php include("../config/constants.php"); ?>

<?php

    $error = NULL;
    if(isset($_POST['submit']))
    {
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $category = $_POST['category'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirm_password = $_POST['confirm_password'];
    
        if(strlen($password)<5){
            $error ="Password must be atleast 5 characters";
        }


        else if($password != $confirm_password){
            $error .= "Your passwords do not match";
        }
        
        
        else{
            
            $firstname = $conn->real_escape_string($firstname);
            $lastname = $conn->real_escape_string($lastname);
            $category = $conn->real_escape_string($category);
            $email = $conn->real_escape_string($email);
            $password =$conn->real_escape_string($password);
            $confirm_password = $conn->real_escape_string($confirm_password);

            // generate vkey
            $vkey = md5(time().$firstname);


            // echo $vkey;

            //$password=md5($password);
            $sql = $conn->query("INSERT INTO users (firstname,lastname ,category,  email, password ,vkey) VALUES ('$firstname','$lastname','$category',  '$email', '$password','$vkey')");

            if ($sql ){
                $_SESSION['add-user']= "User Registered Successfully";
                // echo "User registered Successfully";
            }
            else{
                $_SESSION['add-user']= "User Registeration Failed";
                
            }

        }

        if ($error!=NULL){
            $_SESSION['add-user'] = $error;
        }
    }
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
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
                    <img src="../resources/IITP.png" id="login-logo">

                </div>


                <div class="right-col">

                    <h3><strong><u>REGISTER HERE</u></strong></h3>

                    <?php
                        if(isset($_SESSION['add-user'])){
                            echo $_SESSION['add-user'];
                            unset($_SESSION['add-user']); // removing session message 
                        }

                    ?>


                    <form id="reg-form" method="post" action="">

                        <div class="reg-input-bx">

                            <div class="lgn-data">
                                <input type="text" name="firstname" placeholder="First Name" required />
                            </div>

                            <div class="lgn-data">
                                <input type="text" name="lastname" placeholder="Last Name" required />
                            </div>

                            <div class="lgn-data">
                                <select type="text" name="category" placeholder="Last Name" required>
                                    <option value disabled selected>Select</option>
                                    <option value="GENERAL">GENERAL</option>
                                    <option value="OBC">OBC</option>
                                    <option value="SC">SC</option>
                                    <option value="ST">ST</option>
                                    <option value="PWD">PWD</option>
                                    <option value="EWS">EWS</option>
                                </select>
                            </div>


                            <div class="lgn-data">
                                <input type="text" name="email" placeholder="Email" required />
                            </div>

                            <div class="lgn-data">
                                <input type="password" placeholder="Password" name="password" required>
                            </div>
                            <div class="lgn-data">
                                <input type="password" placeholder="Confirm Password" name="confirm_password" required>
                            </div>


                        </div>


                        <div class="btn-container">
                            <div class="btns">
                                <button type="submit" name="submit" value="Submit">Register</button>
                            </div>

                        </div>


                    </form>


                    <p>
                        <strong> Already Registered !! </strong>
                        <br>
                        <a href='login.php' class="">LOGIN HERE </a>
                    </p>

                </div>
            </div>
        </div>
    </div>
</body>

</html>