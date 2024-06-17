<?php include("../config/constants.php"); ?>

<?php 

    // this is to retrieve id from the login page 
    session_start();
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        //echo $id;
    } 
    
    else {
        // Vaapis jao login page pr 
        echo "Error ";
        //header("location:".SITEURL.'login.php');
    }

    // this is removed 
    // if (isset($_POST['submit'])){
    //     print_r($_POST);}

    if ($_SERVER["REQUEST_METHOD"] == "POST") {


        try {

            // inserting into table application_details

            $adv_num= $_POST["adv_num"] ;
            $date_app= $_POST["date_app"] ;
            $app_num= filter_input(INPUT_POST , "app_num" , FILTER_VALIDATE_INT ) ;
            $applied_post= $_POST["applied_post"];
            $dept_school= $_POST["dept_school"] ;

            // query 
            $sql1 = "INSERT INTO application_details (id , adv_num , app_num , date_app , applied_post ,dept_school) 
                VALUES ($id , '$adv_num' ,$app_num , '$date_app' , '$applied_post' , '$dept_school')" ; 

            // run query 
            $res1 = mysqli_query($conn , $sql1 );


            // if successfull all good 
            if ( $res1 ){
                echo "Done";

            }

            else {
                echo "Error";
            }



            // inserting into table personal_info 

            $first_name= $_POST['first_name'];
            $middle_name = $_POST['middle_name']; 
            $last_name = $_POST['last_name'];
            $nationality = $_POST['nationality'];
            $dob = $_POST['dob'] ;
            $gender = $_POST['gender'];
            $mar_status = $_POST['mar_status'] ;
            $category = $_POST['category'] ;
            $id_proof = $_POST['id_proof'] ;
            $father_name = $_POST['father_name'] ;
            $mobile = $_POST['mobile'];
            $email = $_POST['email'];
            $alt_mobile = $_POST['alt_mobile'];
            $alt_email = $_POST['alt_email'];
            $landline = $_POST['landline'];

            $sql2 = "INSERT INTO personal_info (id, first_name, middle_name, last_name, nationality, dob, gender, mar_status, category, id_proof, father_name, mobile, email, alt_mobile,alt_email, landline) 
            VALUES ($id , '$first_name', '$middle_name', '$last_name', '$nationality', '$dob', '$gender', '$mar_status', '$category', '$id_proof', '$father_name', '$mobile', '$email', '$alt_mobile','$alt_email', '$landline')";
            
            $res2 = mysqli_query($conn , $sql2 );

            if ( $res2 ){
                echo "Done";

            }

            else {
                echo "Error";
            }


            // insert into address_details
            $corrs_street = $_POST['corrs_street'];
            $corrs_city = $_POST['corrs_city'];
            $corrs_state = $_POST['corrs_state'];
            $corrs_country = $_POST['corrs_country'];
            $corrs_pin = $_POST['corrs_pin'];
            $perm_street = $_POST['perm_street'];
            $perm_city = $_POST['perm_city'];
            $perm_state = $_POST['perm_state'];
            $perm_country = $_POST['perm_country'];
            $perm_pin = $_POST['perm_pin'];

            // query 
            $sql3 = "INSERT INTO address_details (id, corrs_street, corrs_city, corrs_state, corrs_country, corrs_pin, perm_street, perm_city, perm_state, perm_country, perm_pin) 
            VALUES ($id , '$corrs_street', '$corrs_city', '$corrs_state', '$corrs_country', '$corrs_pin', '$perm_street', '$perm_city', '$perm_state', '$perm_country', '$perm_pin')";
            

            $res3= mysqli_query($conn , $sql3 );


            // if successfull all good 
            if ( $res3 ){
                echo "Done";

            }

            else {
                echo "Error";
            }

            // when all queries are run go to acde.php 
            header("location:".SITEURL.'acde.php');


            
        } 
        catch (mysqli_sql_exception $e) {
            // Catch any database exceptions
        
            // Set error message in session variable
            $_SESSION['error'] = "An error occurred " ;
            echo  $e->getFile() . " on line " . $e->getLine() . ": " . $e->getMessage();
            
            // Redirect to a different URL
            ////header("location:".SITEURL.'login.php');

            // jaise hi error aayega to id unset ho jayegi 
            // user logout ho jayega id reset ho jayegi 
            //unset($_SESSION['id']);
            exit;
        }


    }


    else {

        
        
    }


?>





<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Faculty Panel</title>
    <link rel="stylesheet" href="../samples/form-box.css">
    <link rel="stylesheet" href="../samples/form-table.css">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/faculty-panel.css">
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



        <form action="faculty-panel.php" method="post" id="uni" >


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

            
                <div class="section">
                    <div class="panel">


                        <!-- <form id="form-application_details" action="" method="post"> -->

                            <div class="panel-body">

                                <div id="fp-user-details" class="user-details ">

                                    <div class="input-box">
                                        <span class="details" for="">Advertisement Number *</span>
                                        <input id="" value="" name="adv_num" type="text" placeholder="Advertisement Number"
                                            required="">
                                    </div>




                                    <div class="input-box">
                                        <span class="details" for="">Date Of Application</span>
                                        <input id="" value="" name="date_app" type="date" placeholder="Date Of Application"
                                            required="">
                                    </div>



                                    <div class="input-box">
                                        <span class="details " for="">Application Number</span>
                                        <input id="" name="app_num" type="number" placeholder="Application Number" value=""
                                            required="">
                                    </div>


                                    <div class="input-box">
                                        <span class="details " for="">Post Applied for *</span>
                                        <input id="" value="" name="applied_post" type="text" placeholder="Post Applied for"
                                            required="">
                                    </div>

                                    <div class="input-box">
                                        <span class="details " for="">Department/School *</span>
                                        <input id="" name="dept_school" type="text" data-provide="datepicker"
                                            placeholder="Department/School" value="" required="">
                                    </div>

                                    
                                    <!-- <button type ="submit" name ="submit" onClick> Submit</button> -->
                                    


                                    


                                </div>

                            </div>

                        <!-- </form> -->





                    </div>
                </div>

                


                <div class="section">
                    <div class="container">
                        <!-- <form id="form-personal_info" action="" method="post"> -->
                            <div class="panel-body">

                            

                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details" for="">First Name *</span>
                                        <input id="" value="" name="first_name" type="text" placeholder="First Name" required="">
                                    </div>




                                    <div class="input-box">
                                        <span class="details" for="">Middle Name</span>
                                        <input id="" value="" name="middle_name" type="text" placeholder="Middle Name" required>
                                    </div>



                                    <div class="input-box">
                                        <span class="details " for="">Last Name *</span>
                                        <input id="" name="last_name" type="text" placeholder="Last Name " value="" required="">
                                    </div>


                                    <div class="input-box">
                                        <span class="details " for="">Nationality *</span>
                                        <input id="" value="" name="nationality" type="text" placeholder="Nationality" required="">
                                    </div>



                                    <div class="input-box">
                                        <span class="details " for="">Date of Birth DD/MM/YYYY *</span>
                                        <input id="" name="dob" type="date" 
                                            value="" required="">
                                    </div>


                                    <div class="input-box">
                                        <span class="details " for="">Gender *</span>
                                        <select id="" name="gender" type="text" value="" required="">
                                            <option value disabled selected>Gender</option>
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>
                                            <option value="Others">Others</option>

                                        </select>

                                    </div>


                                    <div class="input-box">
                                        <span class="details" for="">Marital Status *</span>
                                        <select id="" name="mar_status" type="text" value="" required="">
                                            <option value disabled selected>Select</option>
                                            <option value="married">Married</option>
                                            <option value="unmarried">Unmarried</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </div>

                                    <div class="input-box">
                                        <span class="details" for="">Category</span>
                                        <input id="" value="" name="category" type="text" placeholder="Category" required>
                                    </div>

                                    <div class="input-box">
                                        <span class="details" for="">ID Proof *</span>
                                        <select id="" name="id_proof" type="text" value="" required="">
                                            <option value disabled selected>Select</option>
                                            <option value="married">AADHAR</option>
                                            <option value="pan card">PAN-CARD</option>
                                            <option value="driving license">DRIVING LICENSE</option>
                                            <option value="voter id">VOTER ID</option>
                                            <option value="passport">PASSPORT</option>
                                            <option value="ration card">RATION CARD</option>
                                            <option value="other">OTHER</option>

                                        </select>
                                    </div>

                                    <!-- <div class="input-box">
                                        <span class="details" for="">Upload Id Proof</span>
                                        <input id="" value="" name="id_file" type="file" placeholder="Category" >
                                    </div> -->

                                    <div class="input-box">
                                        <span class="details" for="">Father's Name</span>
                                        <input id="" value="" name="father_name" type="text" placeholder="Father's Name" required="">
                                    </div>

                                    <!-- <div class="input-box">
                                        <span class="details" for="">Profile Photo</span>
                                        <input id="" value="" name="prf_photo" type="file" placeholder="Category"  >
                                    </div> -->



                                </div>

                            </div>
                        <!-- </form> -->
                    </div>
                </div>



                <div class="section">
                    <div class="container">
                        <!-- <form id="form-address_details" action="" method="post"> -->
                            <div class="panel-body">
                                <div class="user-details">
                                    <div class="partition">
                                        <div class="left-half">
                                            <span class="control-label" for="cadd">Correspondence Address </span>
                                            <br />
                                            <br />

                                            <textarea placeholder="Street" class="text-box" name="corrs_street" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="City" class="text-box" name="corrs_city" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="State" class="text-box" name="corrs_state" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="Country" class="text-box" name="corrs_country" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="PIN/ZIP" class="text-box" name="corrs_pin"  maxlength="6"
                                                required=""></textarea>


                                        </div>


                                        <div class="right-half">
                                            <span class="control-label" for="padd">Permanent Address </span>
                                            <br />
                                            <br />
                                            <textarea placeholder="Street" class="text-box" name="perm_street" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="City" class="text-box" name="perm_city" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="State" class="text-box" name="perm_state" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="Country" class="text-box" name="perm_country" maxlength="200"
                                                required=""></textarea>

                                            <textarea placeholder="PIN/ZIP" class="text-box" name="perm_pin"  maxlength="6"
                                                required=""></textarea>


                                        </div>

                                    </div>


                                </div>
                            </div>
                        <!-- </form> -->




                        
                    </div>
                </div>

                <div class="section">
                    <div class="container">
                        <!-- <form id="form-contact_info" action="" method="post"> -->
                            <div class="panel-body">

                                <div class="user-details">
                                    <div class="input-box">
                                        <span class="details" for="">Mobile *</span>
                                        <input id="" value="" name="mobile" type="text" placeholder="Mobile " required="">
                                    </div>




                                    <div class="input-box">
                                        <span class="details" for="">Email</span>
                                        <input id="" value="" name="email" type="text" placeholder="Email" required="">
                                    </div>



                                    <div class="input-box">
                                        <span class="details " for="">Alternate Mobile</span>
                                        <input id="" name="alt_mobile" type="text" placeholder="Alternate Mobile" value="" required>
                                    </div>


                                    <div class="input-box">
                                        <span class="details " for="">Alternate Email</span>
                                        <input id="" value="" name="alt_email" type="text" placeholder="Alternate Email" required >
                                    </div>


                                    <div class="input-box">
                                        <span class="details " for="">Landline Number</span>
                                        <input id="" name="landline" type="text" placeholder="Landline Number" value="" required>
                                    </div>




                                </div>

                            </div>
                        <!-- </form> -->
                    
                    </div>
                </div>


                <div class="btns">
                    <button id="backbtn">Back</button>
                   
                    <button id="saveNextBtn" >Save And Next</button>
                </div>
                </div>
                
           
    
            <script>
                document.getElementById('backbtn').addEventListener('click' , function() {
                    window.location.href = 'login.php';
                })
            </script>

            <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to submit forms
                function submitForms() {
                    document.getElementById('uni').submit();
                }

                // Add click event listener to the button
                document.getElementById('saveNextBtn').addEventListener('click', function() {
                    submitForms(); // Call the function to submit forms
                    window.location.href = 'acde.php'; // Change 'another_page.html' to the URL of the desired page
                });
            });
            </script>
    
    
            </div>

            </form>

               

                

            </div>

        </div>

    


</body>

</html>