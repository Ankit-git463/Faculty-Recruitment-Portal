<?php include("../config/constants.php"); ?>
<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Final Declaration</title>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../samples/form-box.css">


    <link rel="stylesheet" href="../css/final-dec.css">

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

    <div class="main-container">


        <div class="form-box">

            <div class="">
                <div class="">

                    <div class="btn-container">

                    <div class="wlcm">
                        <h4>Welcome : <strong>
                        <?php
                        
                            // Check if firstname is set in the session
                            if(isset($_SESSION['firstname'])) {
                                $firstname = $_SESSION['firstname'];
                                echo " $firstname !";
                            } else {
                                // Vaapis jao login page pr 
                                header("location:".SITEURL.'login.php');
                            }

                        ?>
                        </strong></h4>
                    
                    </div>

                    <div class="logout-btn">
                        <a href="logout.php" class="">Logout</a>
                    </div>

                    


            
                    </div>
                </div>
            </div>

            <div class="section" >
               


               <div class="cent-div">

                    <div class="insider">
                        <div class="declaration">

                        
                        </div>


                    </div>
                    

               </div>
           

                

                
              
                
           
            </div>

            <div class="section">
            <h4> Final Declaration</h4>
        
                <div class="container">
                    <div class="panel-body">

                        <div class="user-details">
                            <div class="partition">
                                <div class="left-col">
                                    
                                    I hereby declare that I have carefully read and understood the instructions and particulars mentioned in the advertisment and this application form. I further declare that all the entries along with the attachments uploaded in this form are true to the best of my knowledge and belief.
                                    
                                </div>


                                <input type="checkbox" name="decl_status" value="1" required="" />  

                                <h5 style ="color:red">Note: The form can be edited till the cutoff date of the rolling advertisment.</h5>
                            </div>
                        </div>

                    </div>

                    
                </div>

                <div class="btns">
                <button id="backbtn">Back</button>
                <button id="submitBtn">Save And Submit</button>
            </div>

            </div>


        
        
        
        <script>
            document.getElementById('submitBtn').addEventListener('click', function() {
                window.location.href = 'generate-pdf.php'; // Change 'another_page.html' to the URL of the desired page
            });
        </script>

        <!-- <script>
            document.getElementById('saveNextBtn').addEventListener('click', function() {
                window.location.href = ''; // Change 'another_page.html' to the URL of the desired page
            });
        </script> -->

        <script>
            document.getElementById('backbtn').addEventListener('click' , function() {
                window.location.href = '';
            })
        </script>


    </div>

</div>
</body>

</html>