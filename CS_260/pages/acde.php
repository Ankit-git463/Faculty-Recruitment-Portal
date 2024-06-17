
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
        
        //header("location:".SITEURL.'login.php');
    }

    

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
        try {

            // inserting into table application_details
            
            //print_r($_POST);
    

            $acde_2a_institute= $_POST["acde_2a_institute"] ;
            $acde_2a_department= $_POST["acde_2a_department"] ;
            $acde_2a_supervisor= $_POST["acde_2a_supervisor"];
            $acde_2a_yoj_phd= $_POST["acde_2a_yoj_phd"] ;
            $acde_2a_date_thesis= $_POST["acde_2a_date_thesis"] ;
            $acde_2a_doa_phd= $_POST["acde_2a_doa_phd"] ;
            $acde_2a_title_phd= $_POST["acde_2a_title_phd"] ;

            // query 
            $sql1 = "INSERT INTO acde_2a (id , acde_2a_institute , acde_2a_department,acde_2a_supervisor ,acde_2a_yoj_phd ,acde_2a_date_thesis,acde_2a_doa_phd,acde_2a_title_phd) 
                VALUES ($id , '$acde_2a_institute' , '$acde_2a_department','$acde_2a_supervisor' ,'$acde_2a_yoj_phd' ,'$acde_2a_date_thesis','$acde_2a_doa_phd','$acde_2a_title_phd')" ; 

            // run query 
            $res1 = mysqli_query($conn , $sql1 );


            // if successfull all good 
            if ( $res1 ){
                //echo "Done";

            }

            else {
                echo "Error";
            }

            $acde_2b_degree = $_POST["acde_2b_degree"];
            $acde_2b_institute = $_POST["acde_2b_institute"];
            $acde_2b_branch = $_POST["acde_2b_branch"];
            $acde_2b_yoj = $_POST["acde_2b_yoj"];
            $acde_2b_duration = $_POST["acde_2b_duration"];
            $acde_2b_yoc = $_POST["acde_2b_yoc"];
            $acde_2b_cgpa = $_POST["acde_2b_cgpa"];
            $acde_2b_div = $_POST["acde_2b_div"];

            $sql2 ="INSERT INTO acde_2b(id,acde_2b_degree,acde_2b_institute,acde_2b_branch,acde_2b_yoj,acde_2b_duration,acde_2b_yoc,acde_2b_cgpa,acde_2b_div)
                    VALUES($id,'$acde_2b_degree','$acde_2b_institute','$acde_2b_branch','$acde_2b_yoj','$acde_2b_duration','$acde_2b_yoc','$acde_2b_cgpa','$acde_2b_div')";


            $res2= mysqli_query($conn , $sql2 );


            // if successfull all good 
            if ( $res2 ){
                //echo "Done";

            }

            else {
                echo "Error";
            }

            $acde_2c_degree = $_POST["acde_2c_degree"];
            $acde_2c_institute = $_POST["acde_2c_institute"];
            $acde_2c_branch = $_POST["acde_2c_branch"];
            $acde_2c_yoj = $_POST["acde_2c_yoj"];
            $acde_2c_duration = $_POST["acde_2c_duration"];
            $acde_2c_yoc = $_POST["acde_2c_yoc"];
            $acde_2c_cgpa = $_POST["acde_2c_cgpa"];
            $acde_2c_div = $_POST["acde_2c_div"];

            $sql3 = "INSERT INTO acde_2c(id,acde_2c_degree,acde_2c_institute, acde_2c_branch,acde_2c_yoj , acde_2c_duration, acde_2c_yoc,  acde_2c_cgpa, acde_2c_div )
                     VALUES($id,'$acde_2c_degree','$acde_2c_institute', '$acde_2c_branch','$acde_2c_yoj ',' $acde_2c_duration', '$acde_2c_yoc',  '$acde_2c_cgpa', '$acde_2c_div')";
            // when all queries are run go to emp-details.php 

            $res3 = mysqli_query($conn,$sql3);

            if($res3){
            // echo "Done";
            }
            else{
             echo "Error";
            }


            for ($i = 0; $i < count($_POST["add_degree"]); $i++) {
                $degree = $_POST["add_degree"][$i];
                $school = $_POST["add_school"][$i];
                $yop = $_POST["add_yop"][$i];
                $grade = $_POST["add_grade"][$i];
                $divi = $_POST["add_div"][$i];
        
                // Insert data into the database
                $sql = "INSERT INTO acde_2d (id,degree,school,yop,grade, divi) 
                        VALUES ($id,'$degree', '$school', '$yop', '$grade', '$divi')";

                $res4 =  mysqli_query($conn, $sql);

                if ($res4) {
                    //echo "Done";
                } else {
                    echo "Error";
                }
            }


            for ($i = 0; $i < count($_POST["add_degree2"]); $i++) {
                $degree2 = $_POST["add_degree2"][$i];
                $college2 = $_POST["add_college2"][$i];
                $branch2 = $_POST["add_branch2"][$i];
                $yoj2 = $_POST["add_yoj2"][$i];
                $yoc2 = $_POST["add_yoc2"][$i];
                $duration2 = $_POST["add_duration2"][$i];
                $cgpa2 = $_POST["add_cgpa2"][$i];
                $grade2 = $_POST["add_grade2"][$i];
        
                // Insert data into the database
                $sql5 = "INSERT INTO acde_2e (id,degree2,college2,branch2,yoj2,yoc2,duration2,cgpa2,grade2) 
                        VALUES ($id,'$degree2','$college2','$branch2','$yoj2','$yoc2','$duration2','$cgpa2','$grade2')";

                $res5 =  mysqli_query($conn, $sql5);

                if ($res5) {
                    //echo "Done";
                } else {
                    echo "Error";
                }
            }


            header("location:".SITEURL.'emp-details.php');



            
        } 
        catch (mysqli_sql_exception $e) {
            // Catch any database exceptions
        
            // Set error message in session variable
            $_SESSION['error'] = "An error occurred " ;
            echo  $e->getFile() . " on line " . $e->getLine() . ": " . $e->getMessage();
            
            // Redirect to a different URL
            //header("location:".SITEURL.'login.php');

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
    <title>Academic Details</title>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../samples/form-box.css">
    <link rel="stylesheet" href="../samples/form-table.css">
    
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
    <form action="acde.php" method="post" id="uni2" >
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


                    </form>
                </div>
            </div>

            <div class="section">

                <h4>2. Educational Qualifications</h4>



                <!-- Panel  -->
                <div class="panel ">
                    <div class="panel-heading">(A) Details of PhD *</div>

                    <!--form action="../php/acde.php" method="post">-->

                        <div class="panel-body">

                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details" >University/Institute</span>
                                    <input id="college_phd" value="" name="acde_2a_institute" type="text"
                                        placeholder="University/Institute" required="">
                                </div>




                                <div class="input-box">
                                    <span class="details " >Department</span>
                                    <input id="stream" value="" name="acde_2a_department" type="text" placeholder="Department"
                                        required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " >Name of PhD Supervisor</span>
                                    <input id="supervisor" name="acde_2a_supervisor" type="text"
                                        placeholder="Name of Ph. D. Supervisor" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " >Year of Joining</span>
                                    <input id="yoj_phd" value="" name="acde_2a_yoj_phd" type="text"
                                        placeholder="Year of Joining" required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " >Date of Successful Thesis Defence</span>

                                    <input id="" name="acde_2a_date_thesis" type="date"
                                        placeholder="Date of Defence" value=""
                                        required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " >Date of Award</span>
                                    <input id="doa_phd" name="acde_2a_doa_phd" type="date" 
                                        placeholder="Date of Award" value="" 
                                        required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " >Title of PhD Thesis</span>
                                    <input id="phd_title" value="" name="acde_2a_title_phd" type="text"
                                        placeholder="Title of PhD Thesis" required="">
                                </div>

                                <input type="hidden" name="id" value="<?php $id ?>">

                              


                            </div>

                        </div>


                    <!--/form>-->





                </div>
            </div>

            <div class="section">





                <div class="panel ">
                    <div class="panel-heading">(B) Academic Details - M. Tech./ M.E./ PG Details</div>

                    <!--form action="" method="post">-->

                        <div class="panel-body">

                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details" for="">Degree/Certificate</span>
                                    <input id="" value="" name="acde_2b_degree" type="text" placeholder="Degree/Certificate"
                                        required="">
                                </div>




                                <div class="input-box">
                                    <span class="details " for="">University/Institute</span>
                                    <input id="" value="" name="acde_2b_institute" type="text" placeholder="University/Institute"
                                        required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " for="">Branch/Stream</span>
                                    <input id="" name="acde_2b_branch" type="text" placeholder="Branch/Stream" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="">Year of Joining</span>
                                    <input id="" value="" name="acde_2b_yoj" type="text" placeholder="Year of Joining" required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " for="">Duration (in years)</span>
                                    <input id="" name="acde_2b_duration" type="text" data-provide="datepicker"
                                        placeholder="Date of Defence" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="">Year of Completion</span>
                                    <input id="" name="acde_2b_yoc" type="text" data-provide="datepicker"
                                        placeholder="Year of Completion" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="">Percentage/ CGPA</span>
                                    <input id="" value="" name="acde_2b_cgpa" type="text" placeholder="Percentage/ CGPA"
                                        required="">
                                </div>

                                <div class="input-box">
                                    <span class="details " for="">Division/Class</span>
                                    <input id="" value="" name="acde_2b_div" type="text" placeholder="Division/Class" required="">
                                </div>


                            </div>

                        </div>


                    <!--/form>-->


                </div>




            </div>

            <div class="section">

                <div class="panel ">
                    <div class="panel-heading">(C) Academic Details - B. Tech./ B.E./ UG Details</div>

                    <!--form action="" method="post">-->

                        <div class="panel-body">

                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details" for="">Degree/Certificate</span>
                                    <input id="" value="" name="acde_2c_degree" type="text" placeholder="Degree/Certificate"
                                        required="">
                                </div>




                                <div class="input-box">
                                    <span class="details" for="">University/Institute</span>
                                    <input id="" value="" name="acde_2c_institute" type="text" placeholder="University/Institute"
                                        required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " for="">Branch/Stream</span>
                                    <input id="" name="acde_2c_branch" type="text" placeholder="Branch/Stream" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="">Year of Joining</span>
                                    <input id="" value="" name="acde_2c_yoj" type="text" placeholder="Year of Joining" required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " for="">Duration (in years)</span>
                                    <input id="" name="acde_2c_duration" type="text" data-provide="datepicker"
                                        placeholder="Date of Defence" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="">Year of Completion</span>
                                    <input id="" name="acde_2c_yoc" type="text" data-provide="datepicker"
                                        placeholder="Year of Completion" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="">Percentage/ CGPA</span>
                                    <input id="" value="" name="acde_2c_cgpa" type="text" placeholder="Percentage/ CGPA"
                                        required="">
                                </div>

                                <div class="input-box">
                                    <span class="details " for="">Division/Class</span>
                                    <input id="" value="" name="acde_2c_div" type="text" placeholder="Division/Class" required="">
                                </div>


                            </div>

                        </div>


                    <!--/form>-->


                </div>
            </div>

            

            <div class="section">
                <div class="tbl-container">
                    
                    <div class="tbl-panel ">
                        <div class="tbl-panel-heading">
                            (D) Academic Details - School *
        
                            
        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                                
                                <table class="">
        
                                    <tr height="50px">
                                        <th class="tbl-head"> 10th/12th/HSC/Diploma </th>
                                        <th class="tbl-head"> School </th>
                                        <th class="tbl-head"> Year of Passing </th>
                                        <th class="tbl-head"> Percentage/ Grade</th>
                                        <th class="tbl-head"> Division/Class </th>
                                       
                                    </tr>
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            <input id="add_degree1" name="add_degree[]" type="text" value=""
                                                placeholder="10th/12th/HSC/Diploma" maxlength="10" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_college1" name="add_school[]" type="text" value=""
                                                placeholder="School" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_subjects1" name="add_yop[]" type="int" value=""
                                                placeholder="Year of Passing" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_yoj1" name="add_grade[]" type="text" value=""
                                                placeholder="Percentage/Grade" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_yog1" name="add_div[]" type="text" value=""
                                                placeholder="Division/Class" maxlength="10" required="">
                                        </td>
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            <input id="add_degree1" name="add_degree[]" type="text" value=""
                                                placeholder="10th/12th/HSC/Diploma" maxlength="10" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_college1" name="add_school[]" type="text" value=""
                                                placeholder="School" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_subjects1" name="add_yop[]" type="int" value=""
                                                placeholder="Year of Passing" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_yoj1" name="add_grade[]" type="text" value=""
                                                placeholder="Percentage/Grade" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_yog1" name="add_div[]" type="text" value=""
                                                placeholder="Division/Class" maxlength="10" required="">
                                        </td>
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            <input id="add_degree1" name="add_degree[]" type="text" value=""
                                                placeholder="10th/12th/HSC/Diploma" maxlength="10" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_college1" name="add_school[]" type="text" value=""
                                                placeholder="School" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_subjects1" name="add_yop[]" type="int" value=""
                                                placeholder="Year of Passing" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_yoj1" name="add_grade[]" type="text" value=""
                                                placeholder="Percentage/Grade" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_yog1" name="add_div[]" type="text" value=""
                                                placeholder="Division/Class" maxlength="10" required="">
                                        </td>
                                    </tr>
        
                                    
                                   
        
                                </table>
        
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>

            <div class="section">


                <div class="tbl-container">
                    <div class="tbl-panel ">
                        <div class="tbl-panel-heading">
                            (E) Additional Educational Qualification (If any)
        
                            <button class="add-more" id="addrow_12b" onclick='addRow_table12b()'>Add More</button> 
        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                                
                                <table class="" id="table_12b">
        
                                    <tr height="50px">
                                        <th class="tbl-head"> Degree/Certificate </th>
                                        <th class="tbl-head"> University/Institute </th>
                                        <th class="tbl-head"> Branch/Stream </th>
                                        <th class="tbl-head"> Year of Joining</th>
                                        <th class="tbl-head"> Year of Completion </th>
                                        <th class="tbl-head"> Duration (in years)</th>
                                        <th class="tbl-head"> Percentage/ CGPA </th>
                                        <th class="tbl-head"> Division/Class</th>
                                    </tr>


                                   

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            <input id="add_degree1" name="add_degree2[]" type="text" value=""
                                                placeholder="Degree" maxlength="10" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_college1" name="add_college2[]" type="text" value=""
                                                placeholder="College" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_branch1" name="add_branch2[]" type="text" value=""
                                                placeholder="Branch" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_yoj1" name="add_yoj2[]" type="text" value=""
                                                placeholder="Year of Joining" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_yoc1" name="add_yoc2[]" type="text" value=""
                                                placeholder="Year of Completion" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_duration1" name="add_duration2[]" type="text" value=""
                                                placeholder="Duration" maxlength="2" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_perce1" name="add_cgpa2[]" type="text" value=""
                                                placeholder="Percentage" maxlength="5" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_rank1" name="add_grade2[]" type="text" value=""
                                                placeholder="Rank" maxlength="5" required="">
                                        </td>
        
                                    </tr>

                                    
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            <input id="add_degree1" name="add_degree2[]" type="text" value=""
                                                placeholder="Degree" maxlength="10" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_college1" name="add_college2[]" type="text" value=""
                                                placeholder="College" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_branch1" name="add_branch2[]" type="text" value=""
                                                placeholder="Branch" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_yoj1" name="add_yoj2[]" type="text" value=""
                                                placeholder="Year of Joining" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_yoc1" name="add_yoc2[]" type="text" value=""
                                                placeholder="Year of Completion" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_duration1" name="add_duration2[]" type="text" value=""
                                                placeholder="Duration" maxlength="2" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_perce1" name="add_cgpa2[]" type="text" value=""
                                                placeholder="Percentage" maxlength="5" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_rank1" name="add_grade2[]" type="text" value=""
                                                placeholder="Rank" maxlength="5" required="">
                                        </td>
        
                                    </tr>

                                   
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            <input id="add_degree1" name="add_degree2[]" type="text" value=""
                                                placeholder="Degree" maxlength="10" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_college1" name="add_college2[]" type="text" value=""
                                                placeholder="College" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_branch1" name="add_branch2[]" type="text" value=""
                                                placeholder="Branch" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_yoj1" name="add_yoj2[]" type="text" value=""
                                                placeholder="Year of Joining" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  id="add_yoc1" name="add_yoc2[]" type="text" value=""
                                                placeholder="Year of Completion" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="add_duration1" name="add_duration2[]" type="text" value=""
                                                placeholder="Duration" maxlength="2" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_perce1" name="add_cgpa2[]" type="text" value=""
                                                placeholder="Percentage" maxlength="5" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="add_rank1" name="add_grade2[]" type="text" value=""
                                                placeholder="Rank" maxlength="5" required="">
                                        </td>
        
                                    </tr>
    
        

                                    
        
        
                                </table>
        
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>
            

            <div class="btns">
                <button id="backbtn">Back</button>
                <button id="saveNextBtn">Save And Next</button>
            </div>

        </div>
        


        <!-- Add more button working  -->
        
        
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to submit forms
                function submitForms() {
                    document.getElementById('uni2').submit();
                }

                // Add click event listener to the button
                document.getElementById('saveNextBtn').addEventListener('click', function() {
                    submitForms(); // Call the function to submit forms
                    window.location.href = 'emp-details.php'; // Change 'another_page.html' to the URL of the desired page
                });
            });
        </script>

        <script>
            document.getElementById('backbtn').addEventListener('click' , function() {
                window.location.href = 'faculty-panel.php';
            })
        </script>


        </div>
        
        </form>
</body>

<script >
    
    var items = 0;
    function addRow_table12b() {
        var table = document.getElementById("table_12b");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl">' +
            '<input name="add_degree2[]" type="text" value="" placeholder="Degree" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_college2[]" type="text" value="" placeholder="Branch" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_branch2[]" type="text" value="" placeholder="Branch" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_yoj2[]" type="text" value="" placeholder="Year Of Joining" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_yoc2[]" type="text" value="" placeholder="Year of Completion" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_duration2[]" type="text" value="" placeholder="Duration" maxlength="5" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_cgpa2[]" type="text" value="" placeholder="Percentage" maxlength="5" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_grade2[]" type="text" value="" placeholder="Rank" maxlength="5" required="">' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }
 
function deleteRow(button) {
    items--
    button.parentElement.parentElement.remove();
    // first parentElement will be td and second will be tr.
}
</script>





</html>