<?php include("../config/constants.php"); ?>
<?php 

    session_start();
   // this is to retrieve id from the login page 
   if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    //echo $id;
    } 

    else{
            // Vaapis jao login page pr 
            
            //header("location:".SITEURL.'login.php');
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    try {

        // inserting into table application_details


        $position= $_POST["position"] ;
        $organisation_3a= $_POST["organisation_3a"] ;
        $status_= $_POST["status_"];
        $doj= $_POST["doj"] ;
        $dol= $_POST["dol"] ;
        $duration= $_POST["duration"] ;
     

        // query 
        $sql1 = "INSERT intO emp_3a (id , position, organisation_3a,status_ ,doj,dol,duration) 
            VALUES ($id , '$position', '$organisation_3a','$status_' ,'$doj','$dol','$duration')" ; 

        // run query 
        $res1 = mysqli_query($conn , $sql1 );


        // if successfull all good 
        if ( $res1 ){
            //echo "Done";

        }

        else {
            echo "Error";
        }


        for ($i = 0; $i < count($_POST["add_position_3b"]); $i++) {
            $position_3b = $_POST["add_position_3b"][$i];
            $organisation = $_POST["add_organisation"][$i];
            $doj_3b= $_POST["add_doj_3b"][$i];
            $dol_3b = $_POST["add_dol_3b"][$i];
            $duration_3b = $_POST["add_duration_3b"][$i];
    
            // Insert data into the database
            $sql2= "INSERT intO emp_3b (id, position_3b,  organisation,doj_3b,dol_3b ,duration_3b ) 
                    VALUES ($id, '$position_3b',  '$organisation','$doj_3b','$dol_3b' ,'$duration_3b')";

            $res2 =  mysqli_query($conn, $sql2);

            if ($res2) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }

        for ($i = 0; $i < count($_POST["add_position_3c"]); $i++) {
            $position_3c = $_POST["add_position_3c"][$i];
            $employer = $_POST["add_employer"][$i];
            $course_taught = $_POST["add_course_taught"][$i];
            $UG_PG = $_POST["add_UG_PG"][$i];
            $no_of_students = $_POST["add_no_of_students"][$i];
            $doj_3c= $_POST["add_doj_3c"][$i];
            $dol_3c = $_POST["add_dol_3c"][$i];
            $duration_3c = $_POST["add_duration_3c"][$i];
    
            // Insert data into the database
            $sql3= "INSERT intO emp_3c (id, position_3c,  employer,course_taught,UG_PG,no_of_students,doj_3c,dol_3c ,duration_3c ) 
                    VALUES ($id, '$position_3c',  '$employer','$course_taught','$UG_PG','$no_of_students','$doj_3c','$dol_3c' ,'$duration_3c')";

            $res3 =  mysqli_query($conn, $sql3);

            if ($res3) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }


        for ($i = 0; $i < count($_POST["add_position_3d"]); $i++) {
            $position_3d = $_POST["add_position_3d"][$i];
            $institute = $_POST["add_institute"][$i];
            $supervisor = $_POST["add_supervisor"][$i];
            $doj_3d= $_POST["add_doj_3d"][$i];
            $dol_3d = $_POST["add_dol_3d"][$i];
            $duration_3d = $_POST["add_duration_3d"][$i];
    
            // Insert data into the database
            $sql4= "INSERT intO emp_3d (id, position_3d,institute,supervisor,doj_3d,dol_3d ,duration_3d ) 
                    VALUES ($id, '$position_3d','$institute','$supervisor','$doj_3d','$dol_3d' ,'$duration_3d')";

            $res4 =  mysqli_query($conn, $sql4);

            if ($res4) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }

        for ($i = 0; $i < count($_POST["add_organisation_3e"]); $i++) {
            $organisation_3e = $_POST["add_organisation_3e"][$i];
            $work_profile = $_POST["add_work_profile"][$i];
            $doj_3e= $_POST["add_doj_3e"][$i];
            $dol_3e = $_POST["add_dol_3e"][$i];
            $duration_3e = $_POST["add_duration_3e"][$i];
    
            // Insert data into the database
            $sql5= "INSERT intO emp_3e (id, organisation_3e,work_profile,doj_3e,dol_3e ,duration_3e) 
                    VALUES ($id, '$organisation_3e','$work_profile','$doj_3e','$dol_3e' ,'$duration_3e')";

            $res5 =  mysqli_query($conn, $sql5);

            if ($res5) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }


        $area_of_specialization= $_POST["area_of_specialization"] ;
        $current_research= $_POST["current_research"] ;
        // query 
        $sql6 = "INSERT intO emp_4(id , area_of_specialization , current_research) 
            VALUES ($id , '$area_of_specialization','$current_research')" ; 

        // run query 
        $res6 = mysqli_query($conn , $sql6 );


        // if successfull all good 
        if ( $res6 ){
            //echo "Done";

        }

        else {
            echo "Error";
        }
        header("location:".SITEURL.'publish.php');



        
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
    <title>Employee Details</title>

    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../css/emp-details.css">
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
    <form action="emp-details.php" method="post" id="uni3" >

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

                <h4>3. Employment Details</h4>
                <div class="panel">
                    <div class="panel-heading">(A) Present Employment</div>
                
                    
                        <div class="panel-body">
                
                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details" for="">Position</span>
                                    <input  name="position" type="text"
                                        placeholder="Position"  required="">
                                </div>
                
                
                
                
                                <div class="input-box">
                                    <span class="details" for="">Organisation/Institution</span>
                                    <input name="organisation_3a" type="text" placeholder="Organisation/Institution" required="" >
                                </div>
                
                
                
                                <div class="input-box">
                                    <span class="details " for="">Status</span>
                                    <input name="status_" type="text" placeholder="Status" value="" required="">
                                </div>
                
                
                                <div class="input-box">
                                    <span class="details " for="">Date Of Joining</span>
                                    <input  name="doj" type="date" placeholder="Date Of Joining"  required="">
                                </div>
                
                
                
                                <div class="input-box">
                                    <span class="details " for="">Date Of Leaving</span>
                                    <input name="dol" type="date" data-provide="datepicker" placeholder="Mention continue if working" value=""  required="">
                                </div>
                
                
                                <div class="input-box">
                                    <span class="details " for="">Duration (in years & months)</span>
                                    <input name="duration" type="int" 
                                        placeholder="Duration" value=""
                                         required="">
                                </div>
                
                
                                
                
                
                            </div>
                
                                </div>
                
                
                </div>
            </div>


            <div class="section">


                <div class="tbl-container">
        
        
                    <div class="tbl-panel ">
        
                        <div class="tbl-panel-heading">
                            (B) Employment History (After PhD, Starting with Latest)
        
        
                            <button class="add-more" id="addmore_3b" onclick='addRow_table3b()'>Add More</button> 
        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                               
                                <table class="" id="table_3b">
        
                                    <tr height="30px">
                                        <th class="tbl-head"> Serial No </th>
                                        <th class="tbl-head"> Position </th>
                                        <th class="tbl-head"> Organisation/Institution</th>
                                        <th class="tbl-head"> Date of Joining</th>
                                        <th class="tbl-head"> Date of Leaving </th>
                                        <th class="tbl-head"> Duration (in years & months)</th>
                                        
                                    </tr>
        
        
        
        
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3b[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_organisation[]" type="text" value=""
                                                placeholder="Organisation" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3b[]" type="date" value=""
                                                placeholder="DD/MM/YYYY" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3b[]" type="date" value=""
                                                placeholder="DD/MM/YYYY" maxlength="12" required="">
                                        </td>
                                     
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3b[]" type="int" value=""
                                                placeholder="Duration " maxlength="25" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3b[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_organisation[]" type="text" value=""
                                                placeholder="Organisation" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3b[]" type="date" value=""
                                                placeholder="DD/MM/YYYY" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3b[]" type="date" value=""
                                                placeholder="DD/MM/YYYY" maxlength="12" required="">
                                        </td>
                                     
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3b[]" type="int" value=""
                                                placeholder="Duration " maxlength="25" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3b[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_organisation[]" type="text" value=""
                                                placeholder="Organisation" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3b[]" type="date" value=""
                                                placeholder="DD/MM/YYYY" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3b[]" type="date" value=""
                                                placeholder="DD/MM/YYYY" maxlength="12" required="">
                                        </td>
                                     
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3b[]" type="int" value=""
                                                placeholder="Duration " maxlength="25" required="">
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
                            (C) Teaching Experience (After PhD)
        
                            <button class="add-more" id="addmore_3c" onclick='addRow_table3c()'>Add More</button> 
        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                               
                                <table class="" id="table_3c">
        
                                    <tr height="30px">
                                        <th class="tbl-head"> Serial No </th>
                                        <th class="tbl-head"> Position  </th>
                                        <th class="tbl-head"> Employer </th>
                                        <th class="tbl-head"> Course Taught </th>
                                        <th class="tbl-head"> UG / PG </th>
                                        <th class="tbl-head"> No. of Students </th>
                                        <th class="tbl-head"> Date Of Joining Institute</th>
                                        <th class="tbl-head"> Date Of Leaving Institute </th>
                                        <th class="tbl-head"> Duration (in years & months)</th>
                                    </tr>
        
        
        
        
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3c[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_employer[]" type="text" value=""
                                                placeholder="Employer" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_course_taught[]" type="text" value=""
                                                placeholder="Course Taught" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_UG_PG[]" type="text" value=""
                                                placeholder="UG/ PG" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_no_of_students[]" type="int" value=""
                                                placeholder="No. of Students" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3c[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3c[]" type="date" value=""
                                                placeholder="Leaving" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3c[]" type="int" value=""
                                                placeholder="Duration (in years & months)" maxlength="25" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3c[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_employer[]" type="text" value=""
                                                placeholder="Employer" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_course_taught[]" type="text" value=""
                                                placeholder="Course Taught" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_UG_PG[]" type="text" value=""
                                                placeholder="UG/ PG" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_no_of_students[]" type="int" value=""
                                                placeholder="No. of Students" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3c[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3c[]" type="date" value=""
                                                placeholder="Leaving" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3c[]" type="int" value=""
                                                placeholder="Duration (in years & months)" maxlength="25" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3c[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_employer[]" type="text" value=""
                                                placeholder="Employer" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_course_taught[]" type="text" value=""
                                                placeholder="Course Taught" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_UG_PG[]" type="text" value=""
                                                placeholder="UG/ PG" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_no_of_students[]" type="int" value=""
                                                placeholder="No. of Students" maxlength="5" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3c[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3c[]" type="date" value=""
                                                placeholder="Leaving" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3c[]" type="int" value=""
                                                placeholder="Duration (in years & months)" maxlength="25" required="">
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
                            (D) Research Experience (Post PhD ,including Post Doctoral)
        
                            <button class="add-more" id="addmore_3d" onclick='addRow_table3d()'>Add More</button> 
        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                               
                                <table class="" id ="table_3d">
        
                                    <tr height="30px">
                                        <th class="tbl-head"> Serial No </th>
                                        <th class="tbl-head"> Position  </th>
                                        <th class="tbl-head"> Institute </th>
                                        <th class="tbl-head"> Supervisor </th>
                                        <th class="tbl-head"> Date Of Joining </th>
                                        <th class="tbl-head"> Date Of Leaving </th>
                                        <th class="tbl-head"> Duration (in years & months)</th>
                                    </tr>
        
        
        
        
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3d[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_institute[]" type="text" value=""
                                                placeholder="Institute" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_supervisor[]" type="text" value=""
                                                placeholder="Supervisor" maxlength="80" required="">
                                        </td>
        
                                        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3d[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3d[]" type="date" value=""
                                                placeholder="Leaving" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3d[]" type="int" value=""
                                                placeholder="Duration (in years & months)" maxlength="25" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3d[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_institute[]" type="text" value=""
                                                placeholder="Institute" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_supervisor[]" type="text" value=""
                                                placeholder="Supervisor" maxlength="80" required="">
                                        </td>
        
                                        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3d[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3d[]" type="date" value=""
                                                placeholder="Leaving" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3d[]" type="int" value=""
                                                placeholder="Duration (in years & months)" maxlength="25" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_position_3d[]" type="text" value=""
                                                placeholder="Position" maxlength="50" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_institute[]" type="text" value=""
                                                placeholder="Institute" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_supervisor[]" type="text" value=""
                                                placeholder="Supervisor" maxlength="80" required="">
                                        </td>
        
                                        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3d[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3d[]" type="date" value=""
                                                placeholder="Leaving" maxlength="12" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3d[]" type="int" value=""
                                                placeholder="Duration (in years & months)" maxlength="25" required="">
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
                            (E) Industrial Experience
        
                            <button class="add-more" id="addmore_3e" onclick='addRow_table3e()'>Add More</button> 
        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">
        
                               
                                <table class="" id="table_3e">
        
                                    <tr height="30px">
                                        <th class="tbl-head"> Serial No. </th>
                                        <th class="tbl-head"> Organisation </th>
                                        <th class="tbl-head"> Work Profile  </th>
                                        <th class="tbl-head"> Date Of Joining</th>
                                        <th class="tbl-head"> Date Of Leaving</th>
                                        <th class="tbl-head"> Duration (in years & months)</th>
                                        
                                    </tr>
        
        
        
        
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_organisation_3e[]" type="text" value=""
                                                placeholder="Organisation" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_work_profile[]" type="text" value=""
                                                placeholder="Nature of work" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3e[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
                                     
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3e[]" type="date" value=""
                                                placeholder="Leaving " maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3e[]" type="int" value=""
                                                placeholder="Period " maxlength="25" required="">
                                        </td>
        
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_organisation_3e[]" type="text" value=""
                                                placeholder="Organisation" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_work_profile[]" type="text" value=""
                                                placeholder="Nature of work" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3e[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
                                     
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3e[]" type="date" value=""
                                                placeholder="Leaving " maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3e[]" type="int" value=""
                                                placeholder="Period " maxlength="25" required="">
                                        </td>
        
                                    </tr>
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_organisation_3e[]" type="text" value=""
                                                placeholder="Organisation" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_work_profile[]" type="text" value=""
                                                placeholder="Nature of work" maxlength="80" required="">
                                        </td>
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_doj_3e[]" type="date" value=""
                                                placeholder="Joining" maxlength="12" required="">
                                        </td>
                                     
        
                                        <td class="input-box-tbl">
                                            <input id="" name="add_dol_3e[]" type="date" value=""
                                                placeholder="Leaving " maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input id="" name="add_duration_3e[]" type="int" value=""
                                                placeholder="Period " maxlength="25" required="">
                                        </td>
        
                                    </tr>
        
                                </table>
        
                            </div>
                        </div>
                    </div>
        
                </div>
            </div>

            <div class="section">
                <h4>4. Area(s) of Specialization and Current Area(s) of Research</h4>
                <div class="container">
                    <div class="panel-body">

                        <div class="user-details">
                            <div class="partition">
                                <div class="left-half">
                                    <span class="control-label" for="cadd">Areas of Specialization</span>
                                    <br />
                                    <br />

                                    <textarea placeholder="Areas of Specialization" class="text-box" name="area_of_specialization" 
                                        required=""></textarea>
                                </div>


            

                            </div>


                        </div>





                    </div>

                    <div class="panel-body">

                        <div class="user-details">
                            <div class="partition">
                                <div class="left-half">
                                    <span class="control-label" for="cadd">Current Area Of Research</span>
                                    <br />
                                    <br />

                                    <textarea placeholder="Current Area Of Research" class="text-box" name="current_research" 
                                        required=""></textarea>
                                </div>


            

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

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to submit forms
                function submitForms() {
                    document.getElementById('uni3').submit();
                }

                // Add click event listener to the button
                document.getElementById('saveNextBtn').addEventListener('click', function() {
                    submitForms(); // Call the function to submit forms
                    window.location.href = 'publish.php'; // Change 'another_page.html' to the URL of the desired page
                });
            });
        </script>

        <script>
            document.getElementById('backbtn').addEventListener('click' , function() {
                window.location.href = 'acde.php';
            })
        </script>


        </div>
     </form>
</body>


<script >
    
    var items = 4;
    function addRow_table3b() {
        var table = document.getElementById("table_3b");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_position_3b[]" type="text" value="" placeholder="Position" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_organisation[]" type="text" value="" placeholder="Organisation" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_doj_3b[]" type="date" value="" placeholder="Date of Joining" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_dol_3b[]" type="date" value="" placeholder="Date of leaving" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_duration_3b[]" type="int" value="" placeholder="Duration" maxlength="10" required="">' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }


    var items = 4;
    function addRow_table3c() {
        var table = document.getElementById("table_3c");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
           '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_positon_3c[]" type="text" value="" placeholder="Position" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_employer[]" type="text" value="" placeholder="Employer" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_course_taught[]" type="text" value="" placeholder="Course Taught" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_UG_PG[]" type="text" value="" placeholder="UG/PG" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_no_of_students[]" type="int" value="" placeholder="No. of students" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_doj_3c[]" type="date" value="" placeholder="Duration" maxlength="12" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_dol_3c[]" type="date" value="" placeholder="Percentage" maxlength="12" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_duration_3c[]" type="int" value="" placeholder="Duration" maxlength="25" required="">' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }


    var items = 4;
    function addRow_table3d() {
        var table = document.getElementById("table_3d");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_position_3d[]" type="text" value="" placeholder="Position" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_institute[]" type="text" value="" placeholder="Institute" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_supervisor[]" type="text" value="" placeholder="Supervisor" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_doj_3d[]" type="date" value="" placeholder="Date of Joining" maxlength="12" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_dol_3d[]" type="date" value="" placeholder="Date of leaving" maxlength="12" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_duration_3d[]" type="int" value="" placeholder="Duration" maxlength="25" required="">' +
            '</td>'
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }
    var items = 4;
    function addRow_table3e() {
        var table = document.getElementById("table_3e");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_organisation_3e[]" type="text" value="" placeholder="Organisation" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_work_profile[]" type="text" value="" placeholder="Nature of Work" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_doj_3e[]" type="date" value="" placeholder="Date of Joining" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_dol_3e[]" type="date" value="" placeholder="Date Of leaving" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_duration_3e[]" type="int" value="" placeholder="Duration" maxlength="10" required="">' +
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