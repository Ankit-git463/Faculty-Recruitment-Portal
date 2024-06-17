
<?php include("../config/constants.php");session_start(); ?>

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

                    <h3><strong><u>LOGIN HERE</u></strong></h3>

                    <?php
                        if(isset($_SESSION['login-user'])){
                            echo $_SESSION['login-user'];
                            unset($_SESSION['login-user']); // removing session message 
                        }

                    ?>


                    <form role="form" action="authenticate.php" method="post">

                        <div class="lgn-data">
                            <input type="text" name="email" placeholder="Your email" autofocus="" required />
                        </div>
                        

                        <div class="lgn-data">
                            
                            <input type="password" placeholder="Enter your password" name="password" required>
                        </div>
                        

                        <div class="btn-container">
                            <div class="btns">
                                <button type="submit" id="lgn-btn"
                                    name="submit" value="Submit">Login</button>
                            </div>

                    
                            <div class="btns">
                                <button type="button" class="cancelbtn pull-right" onclick="window.location.href = 'http://localhost/CS_260/pages/forget.php';">Reset Password</button>
                            </div>
                        </div>

                       


                    </form>
                    

                    <p>
                        <strong> NOT REGISTERED? </strong> 
                        <br >
                        <a href='registration.php' class="">SIGN UP</a>
                    </p>

                </div>
            </div>
        </div>
    </div>

    <!-- <script>
        document.getElementById('lgn-btn').addEventListener('click', function() {
            window.location.href = 'faculty-panel.html'; // Change 'another_page.html' to the URL of the desired page
        });
    </script> -->
</body>

</html>