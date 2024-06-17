<?php include("../config/constants.php"); ?>

<?php 

session_start();
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    // echo $id;
} 

else {
    // Vaapis jao login page pr 
    echo "Error ";
    //header("location:".SITEURL.'login.php');
}

   

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // print_r($_POST);

        

        try {

            // inserting into table application_details
            
            // print_r($_POST);
    

            for ($i = 0; $i < count($_POST["professional_society"]); $i++) {
                $professional_society = $_POST["professional_society"][$i];
                $mem_status = $_POST["mem_status"][$i];

                // query for inserting both professional_society and mem_status into the table
                $sql1 = "INSERT INTO acad_ind_9 (id ,professional_society, mem_status) VALUES ($id , '$professional_society', '$mem_status')";

                // run the query
                $res1 = mysqli_query($conn, $sql1);

                if ($res1) {
                    // echo "Done";
                } else {
                    echo "Error";
                }
            }

            // inserting into table 2e 

            for ($i = 0; $i < count($_POST["training_type"]); $i++) {
                
                $training_type = $_POST["training_type"][$i];
                $organisation = $_POST["organisation"][$i];
                $training_year = $_POST["training_year"][$i];
                $duration = $_POST["duration"][$i];
                

                // query for inserting training information into the table
                $sql2 = "INSERT INTO acad_ind_10 (id ,training_type, organisation, training_year, duration ) 
                        VALUES ($id ,'$training_type', '$organisation', '$training_year', '$duration')";

                // run the query
                $res2 = mysqli_query($conn, $sql2);

                if ($res2) {
                    // echo "Done";
                } else {
                    echo "Error";
                }
            }

            for ($i = 0; $i < count($_POST["award_name"]); $i++) {
                
                $award_name = $_POST["award_name"][$i];
                $granting_body = $_POST["granting_body"][$i];
                $year = $_POST["year"][$i];
                
                

                // query for inserting training information into the table
                $sql3 = "INSERT INTO acad_ind_11 (id , award_name, granting_body, year ) 
                        VALUES ($id , '$award_name', '$granting_body', '$year')";

                // run the query
                $res3 = mysqli_query($conn, $sql3);

                if ($res3) {
                    // echo "Done";
                } else {
                    echo "Error";
                }
            }


        
            
            for ($i = 0; $i < count($_POST["sponsors_spons"]); $i++) {
                
                $sponsors_spons = $_POST["sponsors_spons"][$i];
                $project_title_spons = $_POST["project_title_spons"][$i];
                $grant_amount_spons = $_POST["grant_amount_spons"][$i];
                $period_spons = $_POST["period_spons"][$i];
                $role_spons = $_POST["role_spons"][$i];
                $status_spons = $_POST["status_spons"][$i];
            
                // query for inserting sponsor information into the table
                $sql4 = "INSERT INTO acad_ind_12a (id , sponsors_spons, project_title_spons, grant_amount_spons, period_spons, role_spons, status_spons) 
                        VALUES ($id , '$sponsors_spons', '$project_title_spons', '$grant_amount_spons', '$period_spons', '$role_spons', '$status_spons')";
            
                // run the query
                $res4 = mysqli_query($conn, $sql4);
            
                if ($res4) {
                    // echo "Done";
                } else {
                    echo "Error";
                }
            }
            

            for ($i = 0; $i < count($_POST["sponsors_cons"]); $i++) {
                $sponsors_cons = $_POST["sponsors_cons"][$i];
                $project_title_cons = $_POST["project_title_cons"][$i];
                $grant_amount_cons = $_POST["grant_amount_cons"][$i];
                $period_cons = $_POST["period_cons"][$i];
                $role_cons=[];
                $role_cons = $_POST["role_cons"][$i];
                $status_cons = $_POST["status_cons"][$i];

                // query for inserting sponsor information into the table
                $sql5 = "INSERT INTO acad_ind_12b (id , sponsors_cons, project_title_cons, grant_amount_cons, period_cons, role_cons, status_cons) 
                        VALUES ($id , '$sponsors_cons', '$project_title_cons', '$grant_amount_cons', '$period_cons', '$role_cons', '$status_cons')";

                // run the query
                
                $res5 = mysqli_query($conn, $sql5);
                if ($res5) {
                    // echo "Done";
                } else {
                    echo "Error";
                }
            }


            header("location:".SITEURL.'thesis_course.php');



            
        } 
        catch (mysqli_sql_exception $e) {
            // Catch any database exceptions
        
            // Set error message in session variable
            $_SESSION['error'] = "An error occurred " ;
            echo  $e->getFile() . " on line " . $e->getLine() . ": " . $e->getMessage();
            
            // Redirect to a different URL
            // header("location:".SITEURL.'login.php');

            // jaise hi error aayega to id unset ho jayegi 
            // user logout ho jayega id reset ho jayegi 
            // unset($_SESSION['id']);
            exit;
        }


    }



    
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Details</title>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/acad_ind.css">
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


    <form action="" method="post" id="mainform">
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
                                        echo " $firstname !!";
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

                <h4>9. Membership of Professional Societies</h4>


                
                <div class="tbl-container">
        
        
                    <div class="tbl-panel ">
                       
        
        
                        <div class="tbl-panel-heading">
                            <h3> Fill the Details
                            <button class="add-more" onclick='addRow_table9()' >Add More</button>
                        </h3>
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                                
                                <table class="tbl-membership" id="table_9">
        
                                    <tr height="30px">
                                        <th class="tbl-head">S.No. </th>
                                        <th class="tbl-head">       Name of the Professional Society     </th>
                                        <th class="tbl-head">       Membership Status (Lifetime/Annual)     </th>
                                        
                                    </tr>
    
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="professional_society[]" type="text" value=""
                                                placeholder="Name of the Professional Society" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="mem_status[]" type="text" value=""
                                                placeholder="Membership Status (Lifetime/Annual)" maxlength="50" required="">
                                        </td>
        
                                    </tr>
        

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="professional_society[]" type="text" value=""
                                                placeholder="Name of the Professional Society" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="mem_status[]" type="text" value=""
                                                placeholder="Membership Status (Lifetime/Annual)" maxlength="50" required="">
                                        </td>
        
                                    </tr>
        
        
        
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3                                        
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="professional_society[]" type="text" value=""
                                                placeholder="Name of the Professional Society" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="mem_status[]" type="text" value=""
                                                placeholder="Membership Status (Lifetime/Annual)" maxlength="50" required="">
                                        </td>
        
                                    </tr>
        
                                    
        
        
                                </table>
        
                            </div>
                        </div>
                    </div>
        
                </div>



            </div>

            <div class="section">

                <h4>10. Professional Training</h4>

                <div class="tbl-container">
    
                    <div class="tbl-panel ">
                    
                        <div class="tbl-panel-heading">
                            <h3> Fill the Details
                            <button class="add-more" onclick="addRow_table10()">Add More</button>
                        </h3>
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                                
                                <table id="table_10">
        
                                    <tr height="30px">
                                        <th class="tbl-head">S.No. </th>
                                        <th class="tbl-head">Type of Training Received </th>
                                        <th class="tbl-head">Organisation</th>
                                        <th class="tbl-head">Year</th>
                                        <th class="tbl-head">Duration (in years & months)</th>
                                       
                                    </tr>
    
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="training_type[]" type="text" value=""
                                                placeholder="Types of Training Received" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="organisation[]" type="text" value=""
                                                placeholder="Organisation" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="training_year[]" type="text" value=""
                                                placeholder="Year" maxlength="4" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="duration[]" type="text" value=""
                                                placeholder="Duration" maxlength="20" required="">
                                        </td> 
        
                                    </tr>
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="training_type[]" type="text" value=""
                                                placeholder="Types of Training Received" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="organisation[]" type="text" value=""
                                                placeholder="Organisation" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="training_year[]" type="text" value=""
                                                placeholder="Year" maxlength="4" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="duration[]" type="text" value=""
                                                placeholder="Duration" maxlength="20" required="">
                                        </td> 
        
                                    </tr>
        
        
        
        
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="training_type[]" type="text" value=""
                                                placeholder="Types of Training Received" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="organisation[]" type="text" value=""
                                                placeholder="Organisation" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="training_year[]" type="text" value=""
                                                placeholder="Year" maxlength="4" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="duration[]" type="text" value=""
                                                placeholder="Duration" maxlength="20" required="">
                                        </td> 
        
                                    </tr>
        
        
                                    
        
                                </table>
        
                            </div>
                        </div>
                    </div>
        
                </div>



            </div> 



            <div class="section">

                <h4>11. Award(s) and Recognition(s)</h4>
                <div class="tbl-container">
                    <div class="tbl-panel ">
                        <div class="tbl-panel-heading">
                            <h3> Fill the Details
                            <button class="add-more" onclick="addRow_table11()">Add More</button>
                        </h3>
                        </div>

                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                                <table class="tbl-awards" id="table_11">
                                    <tr height="30px">
                                        <th class="tbl-head">S.No. </th>
                                        <th class="tbl-head">Name of Award </th>
                                        <th class="tbl-head">Awarded By</th>
                                        <th class="tbl-head">Year </th>
                                    
                                    </tr>
    
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="award_name[]" type="text" value=""
                                                placeholder="Name of Award" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="granting_body[]" type="text" value=""
                                                placeholder="Granting Body/Organisation" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="year[]" type="text" value=""
                                                placeholder="Year" maxlength="4" required="">
                                        </td>
    
                                    </tr>


                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="award_name[]" type="text" value=""
                                                placeholder="Name of Award" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="granting_body[]" type="text" value=""
                                                placeholder="Granting Body/Organisation" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="year[]" type="text" value=""
                                                placeholder="Year" maxlength="4" required="">
                                        </td>
    
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="award_name[]" type="text" value=""
                                                placeholder="Name of Award" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="granting_body[]" type="text" value=""
                                                placeholder="Granting Body/Organisation" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="year[]" type="text" value=""
                                                placeholder="Year" maxlength="4" required="">
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
                        <h4>12. Sponsored Projects/ Consultancy Details</h4>
                        <div class="tbl-panel-heading">

                        <h4>(A) Sponsored Projects   
                        
                            <button class="add-more" id="addrow_12a" onclick='addRow_table12a()'>Add More</button>
                        </h4>
                        </div>
                        
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                                
                                <table id="table_12a">
        
                                    <tr height="30px">
                                        <th class="tbl-head"> S.No. </th>
                                        <th class="tbl-head"> Sponsoring Agency </th>
                                        <th class="tbl-head"> Title of Project</th>
                                        <th class="tbl-head"> Sanctioned Amount(₹)</th>
                                        <th class="tbl-head">Period </th>
                                        <th class="tbl-head"> Role</th>
                                        <th class="tbl-head">Status(Completed/Ongoing)</th>
                                    </tr>
    
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                           1
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="sponsors_spons[]" type="text" value=""
                                                placeholder="Sponsoring Agency" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="project_title_spons[]" type="text" value=""
                                                placeholder="Title of Project" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="grant_amount_spons[]" type="text" value=""
                                                placeholder="Amount of Grant" maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="period_spons[]" type="text" value=""
                                                placeholder="Period" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <select  name="role_spons[]"  value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="PrincipalInvestigator">Principal Investigator</option>
                                                <option value="Coinvestigator">Co-investigator</option>
                                            </select>
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="status_spons[]" type="text" value=""
                                                placeholder="Status" maxlength="5" required="">
                                        </td>
        
                                    </tr>


                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                           2
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="sponsors_spons[]" type="text" value=""
                                                placeholder="Sponsoring Agency" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="project_title_spons[]" type="text" value=""
                                                placeholder="Title of Project" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="grant_amount_spons[]" type="text" value=""
                                                placeholder="Amount of Grant" maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="period_spons[]" type="text" value=""
                                                placeholder="Period" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <select  name="role_spons[]"  value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="PrincipalInvestigator">Principal Investigator</option>
                                                <option value="Coinvestigator">Co-investigator</option>
                                            </select>
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="status_spons[]" type="text" value=""
                                                placeholder="Status" maxlength="5" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                           3
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="sponsors_spons[]" type="text" value=""
                                                placeholder="Sponsoring Agency" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="project_title_spons[]" type="text" value=""
                                                placeholder="Title of Project" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="grant_amount_spons[]" type="text" value=""
                                                placeholder="Amount of Grant" maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="period_spons[]" type="text" value=""
                                                placeholder="Period" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <select  name="role_spons[]"  value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="PrincipalInvestigator">Principal Investigator</option>
                                                <option value="Coinvestigator">Co-investigator</option>
                                            </select>
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="status_spons[]" type="text" value=""
                                                placeholder="Status" maxlength="5" required="">
                                        </td>
        
                                    </tr>
        
        
        

                              
                                        
                                </table>
        
                            </div>
                        </div>



                        
                    </div>
            




                <div class="tbl-panel ">
        
                        <div class="tbl-panel-heading">
                           <h4> (B) Consultancy Projects
                            <button class="add-more" id="addrow_12b" onclick='addRow_table12b()'>Add More</button>
                        </h4>
        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                                
                                <table id="table_12b" class="tbl12b">
        
                                    <tr height="30px">
                                        <th class="tbl-head">S.NO. </th>
                                        <th class="tbl-head">Organisation</th>
                                        <th class="tbl-head">Title of Project </th>
                                        <th class="tbl-head"> Amount of Grant</th>
                                        <th class="tbl-head"> Period</th>
                                        <th class="tbl-head">Role</th>
                                        <th class="tbl-head">Status</th>
                                        
                                    </tr>




                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                           1
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="sponsors_cons[]" type="text" value=""
                                                placeholder="Sponsoring Agency" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="project_title_cons[]" type="text" value=""
                                                placeholder="Title of Project" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="grant_amount_cons[]" type="int" value=""
                                                placeholder="Amount of Grant" maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="period_cons[]" type="text" value=""
                                                placeholder="Period" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <select  name="role_cons[]"  value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="PrincipalInvestigator">Principal Investigator</option>
                                                <option value="Coinvestigator">Co-investigator</option>
                                            </select>
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="status_cons[]" type="text" value=""
                                                placeholder="Status" maxlength="5" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                           2
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="sponsors_cons[]" type="text" value=""
                                                placeholder="Sponsoring Agency" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="project_title_cons[]" type="text" value=""
                                                placeholder="Title of Project" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="grant_amount_cons[]" type="int" value=""
                                                placeholder="Amount of Grant" maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="period_cons[]" type="text" value=""
                                                placeholder="Period" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <select  name="role_cons[]"  value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="PrincipalInvestigator">Principal Investigator</option>
                                                <option value="Coinvestigator">Co-investigator</option>
                                            </select>
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="status_cons[]" type="text" value=""
                                                placeholder="Status" maxlength="5" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                           2
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="sponsors_cons[]" type="text" value=""
                                                placeholder="Sponsoring Agency" maxlength="30" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="project_title_cons[]" type="text" value=""
                                                placeholder="Title of Project" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="grant_amount_cons[]" type="int" value=""
                                                placeholder="Amount of Grant" maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="period_cons[]" type="text" value=""
                                                placeholder="Period" maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <select  name="role_cons[]"  value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="PrincipalInvestigator">Principal Investigator</option>
                                                <option value="Coinvestigator">Co-investigator</option>
                                            </select>
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input  name="status_cons[]" type="text" value=""
                                                placeholder="Status" maxlength="5" required="">
                                        </td>
        
                                    </tr>
    
        
        
                                </table>
        
                            </div>
                        </div>



                        
                    </div>
                  
                
                    
                 
                    
                </div>



            

                <div class="btns">
                    <button id="backbtn">Back</button>
                    <button id="saveNextBtn">Save And Next</button>
                </div>
    
            </div>
    
            <script>
                document.getElementById('saveNextBtn').addEventListener('click', function() {
                    window.location.href = 'thesis_course.php'; // Change 'another_page.html' to the URL of the desired page
                });
            </script>
    
            <script>
                document.getElementById('backbtn').addEventListener('click' , function() {
                    window.location.href = 'publish.php';
                })
            </script>

        </div>
        
    </div>
    </form>

        
                                  
</body>
<script>

    function addRow_table9(){
        // Getting the table instance 
        var table = document.getElementById("table_9");

        // count the number of rows 
        rowcount = table.rows.length;

        // defining the HTML for the row 
        var newrowHTML='<tr height="60px">'+
            '<td class="input-box-tbl">'+
            rowcount + 
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="professional_society[]" type="text" value="" placeholder="Name of the Professional Society" maxlength="30" required="">'+
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="mem_status[]" type="text" value="" placeholder="Membership Status (Lifetime/Annual)" maxlength="50" required="">'+
            '</td>'+
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
        '</tr>';

        table.innerHTML += newrowHTML;
    }

    

    function addRow_table10(){
        // Getting the table instance 
        var table = document.getElementById("table_10");

        // count the number of rows 
        rowcount = table.rows.length;

        // defining the HTML for the row 
        var newrowHTML='<tr height="60px">'+
            '<td class="input-box-tbl">'+
            rowcount +
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="training_type[]" type="text" value="" placeholder="Types of Training Received" maxlength="30" required="">'+
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="organisation[]" type="text" value="" placeholder="Organisation" maxlength="50" required="">'+
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="training_year[]" type="text" value="" placeholder="Year" maxlength="4" required="">'+
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="duration[]" type="text" value="" placeholder="Duration" maxlength="20" required="">'+
            '</td>'+
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
        '</tr>';

        table.innerHTML += newrowHTML;
    }

    function addRow_table11(){
        // getting the table element 
        var table = document.getElementById("table_11");
        // counting the number of rows present 
        var rowcount= table.rows.length; 

        // Defining the HTML content for the new row 

        var newRowHTML = '<tr height="60px">'+
            '<td class="input-box-tbl">'+
            rowcount +
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="award_name[]" type="text" value="" placeholder="Name of Award" maxlength="30" required="">'+
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="granting_body[]" type="text" value="" placeholder="Granting Body/Organisation" maxlength="50" required="">'+
            '</td>'+
            '<td class="input-box-tbl">'+
            '<input  name="year[]" type="text" value="" placeholder="Year" maxlength="4" required="">'+
            '</td>'+
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';
        
        table.innerHTML += newRowHTML; 

    }





    function addRow_table12a() {
        var table = document.getElementById("table_12a");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl"> '+ 
            rowCount + 
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="sponsors_spons[]" type="text" value="" placeholder="Sponsoring Agency" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="project_title_spons[]" type="text" value="" placeholder="Title of Project" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="grant_amount_spons[]" type="int" value="" placeholder="Amount of Grant" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="period_spons[]" type="text" value="" placeholder="Period" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<select name="role_spons[]" value="NULL" required="">' +
            '<option value="" disabled selected>Select</option>' +
            '<option value="PrincipalInvestigator">Principal Investigator</option>' +
            '<option value="Coinvestigator">Co-investigator</option>' +
            '</select>' +
             '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="status_spons[]" type="text" value="" placeholder="Status" maxlength="5" required="">' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }

    function addRow_table12b() {
        var table = document.getElementById("table_12b");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl"> '+ 
            rowCount + 
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="sponsors_cons[]" type="text" value="" placeholder="Sponsoring Agency" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="project_title_cons[]" type="text" value="" placeholder="Title of Project" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="grant_amount_cons[]" type="int" value="" placeholder="Amount of Grant" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="period_cons[]" type="text" value="" placeholder="Period" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<select name="role_cons[]" value="" required="">' +
            '<option value="" disabled selected>Select</option>' +
            '<option value="PrincipalInvestigator">Principal Investigator</option>' +
            '<option value="Coinvestigator">Co-investigator</option>' +
            '</select>' +
             '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="status_cons[]" type="text" value="" placeholder="Status" maxlength="5" required="">' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }


    

    function deleteRow(btn) {
        var row = btn.parentNode.parentNode;
        row.parentNode.removeChild(row);
    }
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to submit forms
        function submitForms() {
            document.getElementById('mainform').submit();
        }

        // Add click event listener to the button
        document.getElementById('saveNextBtn').addEventListener('click', function() {
            submitForms(); // Call the function to submit forms
            // window.location.href = 'thesis_course.php'; // Change 'another_page.html' to the URL of the desired page
        });
    });
</script>

</html>