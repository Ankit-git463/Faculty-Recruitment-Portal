<?php include("../config/constants.php"); ?>
<?php 
   

   // this is to retrieve id from the login page 
   session_start();
   if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
    } 

    else{
            // Vaapis jao login page pr 
            
            //header("location:".SITEURL.'login.php');
    }
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    try {

        // inserting into table application_details
        


        for ($i = 0; $i < count($_POST["nos_13a"] ); $i++) {
            $nos_13a= $_POST["nos_13a"][$i] ;
            $title_13a= $_POST["title_13a"][$i] ;
            $role_13a= $_POST["role_13a"][$i];
            $o_c_13a= $_POST["o_c_13a"][$i] ;
            $os_yoc_13a= $_POST["os_yoc_13a"][$i] ;
    
                // query 
            $sql1 = "INSERT INTO the_13a(id ,nos_13a,title_13a,role_13a,o_c_13a,os_yoc_13a) 
            VALUES ($id ,'$nos_13a','$title_13a','$role_13a','$o_c_13a','$os_yoc_13a')" ; 

            // run query 
            $res1 = mysqli_query($conn , $sql1);


            // if successfull all good 
            if ( $res1 ){
                //echo "Done";

            }

            else {
                echo "Error";
            }
        }


        for ($i = 0; $i < count($_POST["nos_13b"] ); $i++) {
            $nos_13b= $_POST["nos_13b"][$i] ;
            $title_13b= $_POST["title_13b"][$i] ;
            $role_13b= $_POST["role_13b"][$i];
            $o_c_13b= $_POST["o_c_13b"][$i] ;
            $os_yoc_13b= $_POST["os_yoc_13b"][$i] ;
        
            
            // query 
            $sql2 = "INSERT INTO the_13b(id ,nos_13b,title_13b,role_13b,o_c_13b,os_yoc_13b) 
                VALUES ($id ,'$nos_13b','$title_13b','$role_13b','$o_c_13b','$os_yoc_13b')" ; 

            // run query 
            $res2 = mysqli_query($conn , $sql2);


            // if successfull all good 
            if ( $res2 ){
                //echo "Done";

            }

            else {
                echo "Error";
            }
        }



        for ($i = 0; $i < count($_POST["nos_13c"] ); $i++) {
            $nos_13c= $_POST["nos_13c"][$i] ;
            $title_13c= $_POST["title_13c"][$i] ;
            $role_13c= $_POST["role_13c"][$i];
            $o_c_13c= $_POST["o_c_13c"][$i] ;
            $os_yoc_13c= $_POST["os_yoc_13c"][$i] ;
        
            
            // query 
            $sql3 = "INSERT INTO the_13c(id ,nos_13c,title_13c,role_13c,o_c_13c,os_yoc_13c) 
                VALUES ($id ,'$nos_13c','$title_13c','$role_13c','$o_c_13c','$os_yoc_13c')" ; 

            // run query 
            $res3 = mysqli_query($conn , $sql3);


            // if successfull all good 
            if ( $res3 ){
                //echo "Done";

            }

            else {
                echo "Error";
            }
        }






        
    
       

        

        


       

        


     
        

        header("location:".SITEURL.'submission_main.php');



        
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

    <form action="" method="POST" id="uni7">
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
                            <a href="#" class="">Logout</a>
                        </div>

                    </div>


                    </form>
                </div>
            </div>



            <div class="section">


                <div class="tbl-container">


                    <div class="tbl-panel ">
                        <h4>13.Research Supervision:</h4>
                        <div class="tbl-panel-heading">

                            <h4>(A) PhD Thesis Supervision

                                <button class="add-more" id="add_more_acde" onclick='addRow_table13a()'>Add More</button>
                            </h4>
                        </div>

                        <div class="main-tbl">
                            <div class="tbl-panel-body">


                                <table id="table_13a">


                                    <tr height="30px">
                                        <th class="tbl-head">S.NO. </th>
                                        <th class="tbl-head">Name of Student/Research Scholar </th>
                                        <th class="tbl-head">Title of Thesis</th>
                                        <th class="tbl-head">Role</th>
                                        <th class="tbl-head"> Ongoing/Completed</th>
                                        <th class="tbl-head"> Ongoing Since/Year Of Completion</th>


                                    </tr>

                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13a[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13a[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13a[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13a" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13a[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>


                                    </tr>

                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13a[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13a[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13a[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13a" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13a[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>


                                    </tr>


                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13a[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13a[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13a[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13a" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13a[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>


                                    </tr>



                                    

                                   
                                       

                                </table>

                            </div>
                        </div>




                    </div>





                    <div class="tbl-panel ">

                        <div class="tbl-panel-heading">
                            <h4> (B). M.Tech/M.E./Master's Degree
                                <button class="add-more" id="add_more_acde" onclick='addRow_table13b()'>Add More</button>
                            </h4>

                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">


                                <table id="table_13b">

                                    <tr height="30px">
                                        <th class="tbl-head">S.NO. </th>
                                        <th class="tbl-head">Name of Student/Research Scholar </th>
                                        <th class="tbl-head">Title of Thesis</th>
                                        <th class="tbl-head">Role</th>
                                        <th class="tbl-head"> Ongoing/Completed</th>
                                        <th class="tbl-head"> Ongoing Since/Year Of Completion</th>


                                    </tr>

                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13b[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13b[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13b[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13b[]" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13b[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>

                                    </tr>
                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13b[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13b[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13b[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13b[]" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13b[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>

                                    </tr>
                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13b[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13b[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13b[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13b[]" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13b[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>

                                    </tr>








                                </table>

                            </div>
                        </div>




                    </div>


                    <div class="tbl-panel ">

                        <div class="tbl-panel-heading">
                            <h4>
                                (C) B.Tech/B.E./Bachelor's Degree
                                <button class="add-more" id="add_more_acde" onclick='addRow_table13c()'>Add More</button>
                            </h4>
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">


                                <table id="table_13c">

                                    <tr height="30px">
                                        <th class="tbl-head">S.NO. </th>
                                        <th class="tbl-head">Name of Student </th>
                                        <th class="tbl-head">Title of Project</th>
                                        <th class="tbl-head">Role</th>
                                        <th class="tbl-head"> Ongoing/Completed</th>
                                        <th class="tbl-head"> Ongoing Since/Year Of Completion</th>


                                    </tr>

                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13c[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13c[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13c[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13c[]" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13c[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>


                                    </tr>
                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13c[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13c[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13c[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13c[]" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13c[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
                                        </td>


                                    </tr>
                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="nos_13c[]" type="text" value="" placeholder="Scholar name"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="title_13c[]" type="text" value="" placeholder="Title of Thesis"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <select  name="role_13c[]" type="" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Supervisor_with_no_Co_supervisor">Supervisor with no
                                                    Co-supervisor</option>
                                                <option value="Supervisor_with_Co_supervisor">Supervisor with
                                                    Co-supervisor</option>
                                                <option value="Co_supervisor"> Co-supervisor</option>

                                            </select>
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="o_c_13c[]" type="text" value="" placeholder="Ongoing/Completed"
                                                maxlength="12" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="os_yoc_13c[]" type="text" value=""
                                                placeholder="Ongoing Since/Year Of Completion" maxlength="8"
                                                required="">
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

        <!-- <script>
            document.getElementById('saveNextBtn').addEventListener('click', function() {
                window.location.href = 'rel_info.php'; // Change 'another_page.html' to the URL of the desired page
            });
        </script> -->

       

        </div>

        </form>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to submit forms
        function submitForms() {
            document.getElementById('uni7').submit();
        }

        // Add click event listener to the button
        document.getElementById('saveNextBtn').addEventListener('click', function() {
            submitForms(); // Call the function to submit forms
            // window.location.href = 'thesis_course.php'; // Change 'another_page.html' to the URL of the desired page
        });
    });
</script>

<script>
    document.getElementById('backbtn').addEventListener('click' , function() {
        window.location.href = 'acad_ind.php';
    })
</script>


<script>

function addRow_table13a() {
    var table = document.getElementById("table_13a");

    // Counting the rows in the table 
    var rowCount = table.rows.length; 
    
    // Define the HTML content for the new row
    var newRowHTML = '<tr height="60px">' +
        '<td class="input-box-tbl"> '+ 
        rowCount + 
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="nos_13a[]" type="text" value="" placeholder="Scholar name" maxlength="30" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="title_13a[]" type="text" value="" placeholder="Title of Thesis" maxlength="50" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<select name="role_13a[]" type="" value="" required="">' +
        '<option value="" disabled selected>Select</option>' +
        '<option value="Supervisor_with_no_Co_supervisor">Supervisor with no Co-supervisor</option>' +
        '<option value="Supervisor_with_Co_supervisor">Supervisor with Co-supervisor</option>' +
        '<option value="Co_supervisor">Co-supervisor</option>' +
        '</select>' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="o_c_13a[]" type="text" value="" placeholder="Ongoing/Completed" maxlength="12" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="os_yoc_13a[]" type="text" value="" placeholder="Ongoing Since/Year Of Completion" maxlength="8" required="">' +
        '</td>' +
        '<td>' +
        '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
        '</td>' +
        '</tr>';

    // Insert the new row HTML into the table
    table.innerHTML += newRowHTML;
}


function addRow_table13b() {
    var table = document.getElementById("table_13b");

    // Counting the rows in the table 
    var rowCount = table.rows.length; 
    
    // Define the HTML content for the new row
    var newRowHTML = '<tr height="60px">' +
        '<td class="input-box-tbl"> '+ 
        rowCount + 
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="nos_13b[]" type="text" value="" placeholder="Scholar name" maxlength="30" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="title_13b[]" type="text" value="" placeholder="Title of Thesis" maxlength="50" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<select name="role_13b[]" type="" value="" required="">' +
        '<option value="" disabled selected>Select</option>' +
        '<option value="Supervisor_with_no_Co_supervisor">Supervisor with no Co-supervisor</option>' +
        '<option value="Supervisor_with_Co_supervisor">Supervisor with Co-supervisor</option>' +
        '<option value="Co_supervisor">Co-supervisor</option>' +
        '</select>' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="o_c_13b[]" type="text" value="" placeholder="Ongoing/Completed" maxlength="12" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="os_yoc_13b[]" type="text" value="" placeholder="Ongoing Since/Year Of Completion" maxlength="8" required="">' +
        '</td>' +
        '<td>' +
        '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
        '</td>' +
        '</tr>';

    // Insert the new row HTML into the table
    table.innerHTML += newRowHTML;
}


function addRow_table13c() {
    var table = document.getElementById("table_13c");

    // Counting the rows in the table 
    var rowCount = table.rows.length; 
    
    // Define the HTML content for the new row
    var newRowHTML = '<tr height="60px">' +
        '<td class="input-box-tbl"> '+ 
        rowCount + 
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="nos_13c[]" type="text" value="" placeholder="Scholar name" maxlength="30" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="title_13c[]" type="text" value="" placeholder="Title of Thesis" maxlength="50" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<select name="role_13c[]" type="" value="" required="">' +
        '<option value="" disabled selected>Select</option>' +
        '<option value="Supervisor_with_no_Co_supervisor">Supervisor with no Co-supervisor</option>' +
        '<option value="Supervisor_with_Co_supervisor">Supervisor with Co-supervisor</option>' +
        '<option value="Co_supervisor">Co-supervisor</option>' +
        '</select>' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="o_c_13c[]" type="text" value="" placeholder="Ongoing/Completed" maxlength="12" required="">' +
        '</td>' +
        '<td class="input-box-tbl">' +
        '<input name="os_yoc_13c[]" type="text" value="" placeholder="Ongoing Since/Year Of Completion" maxlength="8" required="">' +
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



</body>

</html>