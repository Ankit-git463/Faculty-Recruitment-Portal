<?php include("../config/constants.php"); ?>
<?php 
   

   // this is to retrieve id from the login page 
   session_start();
   if(isset($_SESSION['id'])) {
    $id = $_SESSION['id']+3;
    //echo $id;
    } 

    else{
            // Vaapis jao login page pr 
            
            //header("location:".SITEURL.'login.php');
    }

    
if ($_SERVER["REQUEST_METHOD"] == "POST") {
      
    try {

        // inserting into table application_details
       
        $in_jo= $_POST["in_jo"] ;
        $na_jo= $_POST["na_jo"] ;
        $in_co= $_POST["in_co"];
        $na_co= $_POST["na_co"] ;
        $nop= $_POST["nop"] ;
        $nob= $_POST["nob"] ;
        $nobc= $_POST["nobc"] ;
        
        // query 
        $sql1 = "INSERT INTO pub_5(id , in_jo, na_jo,in_co,na_co,nop,nob,nobc) 
            VALUES ($id ,$in_jo,$na_jo,$in_co ,$na_co,$nop,$nob,$nobc)" ; 

        // run query 
        $res1 = mysqli_query($conn , $sql1);
      
        // if successfull all good 
        if ( $res1 ){
            //echo "Done";

        }

        else {
            echo "Error";
        }
        


        for ($i = 0; $i < count($_POST["add_author"]); $i++) {
            $author = $_POST["add_author"][$i];
            $title = $_POST["add_title"][$i];
            $na_of_jo= $_POST["add_na_of_jo"][$i];
            $yvp = $_POST["add_yvp"][$i];
            $impact= $_POST["add_impact"][$i];
            $status_= $_POST["add_status_"][$i];
    
            // Insert data into the database
            $sql2= "INSERT INTO pub_6(id,author,  title,na_of_jo, yvp ,impact, status_) 
                    VALUES ($id,'$author',  '$title','$na_of_jo', '$yvp' ,$impact, '$status_')";

            $res2 =  mysqli_query($conn, $sql2);

            if ($res2) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }

        for ($i = 0; $i < count($_POST["add_inventor"]); $i++) {
            $inventor = $_POST["add_inventor"][$i];
            $title_a = $_POST["add_title_a"][$i];
            $cop = $_POST["add_cop"][$i];
            $pon = $_POST["add_pon"][$i];
            $dof = $_POST["add_dof"][$i];
            $dop= $_POST["add_dop"][$i];
            $status_ = $_POST["add_status_"][$i];
          
    
            // Insert data into the database
            $sql3= "INSERT INTO pub_a(id, inventor, title_a,cop,pon,dof,dop, status_ ) 
                    VALUES ($id, '$inventor', '$title_a','$cop',$pon,'$dof','$dop', '$status_' )";

            $res3 =  mysqli_query($conn, $sql3);

            if ($res3) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }


        for ($i = 0; $i < count($_POST["add_author_b"]); $i++) {
            $author_b = $_POST["add_author_b"][$i];
            $title_b= $_POST["add_title_b"][$i];
            $year_b = $_POST["add_year_b"][$i];
            $isbn_b= $_POST["add_isbn_b"][$i];

            // Insert data into the database
            $sql4= "INSERT INTO pub_b (id, author_b,title_b,Year_b, isbn_b ) 
                    VALUES ($id, '$author_b','$title_b',
                $year_b, $isbn_b)";

            $res4 =  mysqli_query($conn, $sql4);

            if ($res4) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }

        for ($i = 0; $i < count($_POST["add_author_c"]); $i++) {
            $author_c = $_POST["add_author_c"][$i];
            $title_c= $_POST["add_title_c"][$i];
            $year_c = $_POST["add_year_c"][$i];
            $isbn_c= $_POST["add_isbn_c"][$i];

            // Insert data into the database
            $sql5= "INSERT INTO pub_c (id, author_c,title_c,Year_c, isbn_c ) 
                    VALUES ($id, '$author_c','$title_c',$year_c, $isbn_c)";

            $res5 =  mysqli_query($conn, $sql5);

            if ($res5) {
                //echo "Done";
            } else {
                echo "Error";
            }
        }

        $google_link= $_POST["google_link"] ;
        
        // query 
        $sql6= "INSERT INTO pub_8(id ,google_link ) 
            VALUES ($id ,'$google_link')" ; 

        // run query 
        $res6= mysqli_query($conn , $sql6);


        // if successfull all good 
        if ( $res6 ){
            //echo "Done";

        }

        else {
            echo "Error";
        }

        

        header("location:".SITEURL.'acad_ind.php');



        
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
    <form action="publish.php" method="post" id="uni4" >

    <div class="main-container">


       

         
            <div class="form-box">

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

            <div class="section">

                <h4>5.Summary of Publications*</h4>



                <!-- Panel  -->
                <div class="panel ">


                   

                        <div class="panel-body">

                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details" for="college_phd">Number of International Journal
                                        Papers</span>
                                    <input  value="" name="in_jo" type="int"
                                        placeholder="Number of International Journal Papers" required="">
                                </div>




                                <div class="input-box">
                                    <span class="details " for="stream">Number of National Journal Papers</span>
                                    <input  value="" name="na_jo" type="int"
                                        placeholder="Number of National Journal Papers" required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " for="duration_phd">Number of International Conference
                                        Papers</span>
                                    <input  name="in_co" type="int"
                                        placeholder="Number of International Conference Papers" value="" required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="yoj_phd">Number of National Conference Papers</span>
                                    <input  value="" name="na_co" type="int"
                                        placeholder="Number of National Conference Papers" required="">
                                </div>



                                <div class="input-box">
                                    <span class="details " for="">Number of Patent(s) [Filed, Published, Granted]</span>

                                    <input  name="nop" type="int" 
                                        placeholder="Number of Patent(s) [Filed, Published, Granted]" value=""
                                         required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="doa_phd">Number of Book(s)</span>
                                    <input  name="nob" type="int" 
                                        placeholder="Number of Book(s)" value=""
                                         required="">
                                </div>


                                <div class="input-box">
                                    <span class="details " for="phd_title">Number of Book Chapter(s)</span>
                                    <input  value="" name="nobc" type="int"
                                        placeholder="Number of Book Chapter(s)" required="">
                                </div>


                            </div>

                        </div>

                </div>
            </div>

            <div class="section">


                <div class="tbl-container">


                    <div class="tbl-panel ">



                        <div class="tbl-panel-heading">
                            <h4> 6. List of 10 Best Publications (Journal/Conference)
                                <button class="add-more" onclick='addRow_table46()'>Add More</button>
                            </h4>
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">


                                <table class="" id="table_46">

                                    <tr height="30px">
                                        <th class="tbl-head">S.No. </th>
                                        <th class="tbl-head">Author </th>
                                        <th class="tbl-head">Title </th>
                                        <th class="tbl-head">Name of Journal/conference </th>
                                        <th class="tbl-head">Year,Vol.,Page</th>
                                        <th class="tbl-head">Impact Factor</th>
                                        <th class="tbl-head"> DOI </th>
                                        <th class="tbl-head">Status</th>
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author[]" type="text" value="" placeholder="Author"
                                                maxlength="30" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_title[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_na_of_jo[]" type="text" value="" placeholder="Journal Name"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_yvp[]" type="text" value="" placeholder="Year of Publication"
                                                maxlength="50" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_impact[]" type="int" value="" placeholder="Impact Factor"
                                                maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_DOI" type="date" value="" placeholder="DOI" maxlength="10"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">

                                            <select  name="add_status_" type="text" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Published">Published</option>
                                                <option value="Accepted">Accepted</option>
                                            </select>

                                        </td>



                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author[]" type="text" value="" placeholder="Author"
                                                maxlength="30" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_title[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_na_of_jo[]" type="text" value="" placeholder="Journal Name"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_yvp[]" type="text" value="" placeholder="Year of Publication"
                                                maxlength="50" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_impact[]" type="int" value="" placeholder="Impact Factor"
                                                maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_DOI" type="date" value="" placeholder="DOI" maxlength="10"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">

                                            <select  name="add_status_" type="text" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Published">Published</option>
                                                <option value="Accepted">Accepted</option>
                                            </select>

                                        </td>



                                    </tr>



                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author[]" type="text" value="" placeholder="Author"
                                                maxlength="30" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_title[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_na_of_jo[]" type="text" value="" placeholder="Journal Name"
                                                maxlength="50" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_yvp[]" type="text" value="" placeholder="Year of Publication"
                                                maxlength="50" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_impact[]" type="int" value="" placeholder="Impact Factor"
                                                maxlength="10" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_DOI" type="date" value="" placeholder="DOI" maxlength="10"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">

                                            <select  name="add_status_" type="text" value="" required="">
                                                <option value disabled selected>Select</option>
                                                <option value="Published">Published</option>
                                                <option value="Accepted">Accepted</option>
                                            </select>

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
                        <h4>7. List of Patent(s), Book(s), Book Chapter(s)</h4>
                        <div class="tbl-panel-heading">

                            (A) Patent(s)

                                <button class="add-more" id ="" onclick ='addRow_table4a()'>Add More</button>
                            
                        </div>

                        <div class="main-tbl">
                            <div class="tbl-panel-body">


                                <table class="" id="table_4a">

                                    <tr height="30px">
                                        <th class="tbl-head"> S.No. </th>
                                        <th class="tbl-head"> Inventor </th>
                                        <th class="tbl-head"> Title of Patent </th>
                                        <th class="tbl-head"> Country of Patent</th>
                                        <th class="tbl-head">Patent of Number </th>
                                        <th class="tbl-head"> Date of filing</th>
                                        <th class="tbl-head">Date of publish</th>
                                        <th class="tbl-head">Status-Filed/Published/Granted</th>
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_inventor[]" type="text" value="" placeholder="Author"
                                                maxlength="30" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_title_a[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_cop[]" type="text" value="" placeholder="Country"
                                                maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_pon[]" type="int" value="" placeholder="Patent Number"
                                                maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_dof[]" type="date" value="" placeholder="DD/MM/YY"
                                                maxlength="12" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_dop[]" type="date" value="" placeholder="DD/MM/YY"
                                                maxlength="12" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_status_[]" type="text" value="" placeholder="Status" maxlength="5"
                                                required="">
                                        </td>

                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_inventor[]" type="text" value="" placeholder="Author"
                                                maxlength="30" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_title_a[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_cop[]" type="text" value="" placeholder="Country"
                                                maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_pon[]" type="int" value="" placeholder="Patent Number"
                                                maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_dof[]" type="date" value="" placeholder="DD/MM/YY"
                                                maxlength="12" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_dop[]" type="date" value="" placeholder="DD/MM/YY"
                                                maxlength="12" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_status_[]" type="text" value="" placeholder="Status" maxlength="5"
                                                required="">
                                        </td>

                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_inventor[]" type="text" value="" placeholder="Author"
                                                maxlength="30" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_title_a[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_cop[]" type="text" value="" placeholder="Country"
                                                maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_pon[]" type="int" value="" placeholder="Patent Number"
                                                maxlength="20" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_dof[]" type="date" value="" placeholder="DD/MM/YY"
                                                maxlength="12" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_dop[]" type="date" value="" placeholder="DD/MM/YY"
                                                maxlength="12" required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_status_[]" type="text" value="" placeholder="Status" maxlength="5"
                                                required="">
                                        </td>

                                    </tr>


                                </table>

                            </div>
                        </div>




                    </div>





                    <div class="tbl-panel ">

                        <div class="tbl-panel-heading">
                             (B) Book(s)
                                <button class="add-more" id="addRow_table_4b" onclick='addRow_table4b()'>Add More</button>
                            

                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">


                                <table class="" id="table_4b">

                                    <tr height="30px">
                                        <th class="tbl-head">S.NO. </th>
                                        <th class="tbl-head">Author(s) </th>
                                        <th class="tbl-head">Title of the Book </th>
                                        <th class="tbl-head"> Year of Publication</th>
                                        <th class="tbl-head"> ISBN</th>

                                    </tr>

                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author_b[]" type="text" value="" placeholder="Author(s)"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_title_b[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_year_b[]" type="int" value="" placeholder="Year" maxlength="4"
                                                required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_isbn_b[]" type="text" value="" placeholder="ISBN" maxlength="10"
                                                required="">
                                        </td>


                                    </tr>


                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author_b[]" type="text" value="" placeholder="Author(s)"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_title_b[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_year_b[]" type="int" value="" placeholder="Year" maxlength="4"
                                                required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_isbn_b[]" type="text" value="" placeholder="ISBN" maxlength="10"
                                                required="">
                                        </td>


                                    </tr>
                                    <tr height="60px">

                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author_b[]" type="text" value="" placeholder="Author(s)"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_title_b[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_year_b[]" type="int" value="" placeholder="Year" maxlength="4"
                                                required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_isbn_b[]" type="text" value="" placeholder="ISBN" maxlength="10"
                                                required="">
                                        </td>


                                    </tr>


                                </table>

                            </div>
                        </div>




                    </div>


                    <div class="tbl-panel ">

                        <div class="tbl-panel-heading">
                        
                                (C) Book Chapter(s)
                                <button class="add-more" id="addmore_4c" onclick ='addRow_table4c()'>Add More</button>
                        
                        </div>
                        <div class="main-tbl">
                            <div class="tbl-panel-body">


                                <table class="" id="table_4c">

                                    <tr height="30px">
                                        <th class="tbl-head"> S.NO.</th>
                                        <th class="tbl-head">Author(s) </th>
                                        <th class="tbl-head">Title of the Book Chapter(s) </th>
                                        <th class="tbl-head"> Year ofPublication</th>
                                        <th class="tbl-head">ISBN</th>
                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            1
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author_c[]" type="text" value="" placeholder="Author(s)"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_title_c[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_year_c[]" type="int" value="" placeholder="Year" maxlength="4"
                                                required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_isbn_c[]" type="text" value="" placeholder="ISBN" maxlength="10"
                                                required="">
                                        </td>


                                    </tr>

                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            2
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author_c[]" type="text" value="" placeholder="Author(s)"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_title_c[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_year_c[]" type="int" value="" placeholder="Year" maxlength="4"
                                                required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_isbn_c[]" type="text" value="" placeholder="ISBN" maxlength="10"
                                                required="">
                                        </td>


                                    </tr>
                                    <tr height="60px">
                                        <td class="input-box-tbl">
                                            3
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_author_c[]" type="text" value="" placeholder="Author(s)"
                                                maxlength="30" required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_title_c[]" type="text" value="" placeholder="Title" maxlength="50"
                                                required="">
                                        </td>

                                        <td class="input-box-tbl">
                                            <input  name="add_year_c[]" type="int" value="" placeholder="Year" maxlength="4"
                                                required="">
                                        </td>
                                        <td class="input-box-tbl">
                                            <input  name="add_isbn_c[]" type="text" value="" placeholder="ISBN" maxlength="10"
                                                required="">
                                        </td>


                                </tr>
                                </table>

                            </div>
                        </div>




                    </div>




                </div>


                <div class="panel ">
                    
                        <h4>8. Google Scholar Link *</h4>
                    

                    <form action="" method="post">

                        <div class="panel-body">

                            <div class="user-details">
                                <div class="input-box">
                                    <span class="details" for="college_phd">Google Scholar Link</span>
                                    <input  value="" name="google_link" type="text" placeholder="URL" required="">
                                </div>
                            </div>

                        </div>
                </div>

                <div class="btns">
                    <button id="backbtn">Back</button>
                    <button id="saveNextBtn">Save And Next</button>
                </div>

            </div>

        </div>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to submit forms
                function submitForms() {
                    document.getElementById('uni4').submit();
                }

                // Add click event listener to the button
                document.getElementById('saveNextBtn').addEventListener('click', function() {
                    submitForms(); // Call the function to submit forms
                    window.location.href = 'acad_ind.php'; // Change 'another_page.html' to the URL of the desired page
                });
            });
        </script>

        <script>
            document.getElementById('backbtn').addEventListener('click' , function() {
                window.location.href = 'emp-details.php';
            })
        </script>


    </div>
    </form>
</body>



<script>
     
    var items = 4;
    function addRow_table46() {
        var table = document.getElementById("table_46");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_author[]" type="text" value="" placeholder="Author" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_title[]" type="text" value="" placeholder="Title" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_na_of_jo[]" type="text" value="" placeholder="Journal Name" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_yvp[]" type="text" value="" placeholder="Year of Publication " maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_impact[]" type="int" value="" placeholder="Impact Factor" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_DOI[]" type="date" value="" placeholder="DOI" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<select  name="add_status_[]" type="text" required="">' +
            '<option value="" disabled selected>Select</option>' +
            '<option value="Published">Published</option>' +
            '<option value="Accepted">Accepted</option>' +
            '</select>' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }




    var items = 4;
    function addRow_table4a() {
        var table = document.getElementById("table_4a");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_inventor[]" type="text" value="" placeholder="Author" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_title_a[]" type="text" value="" placeholder="Title" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_cop[]" type="text" value="" placeholder="Country" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_pon[]" type="int" value="" placeholder="Patent Number" maxlength="20" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_dof[]" type="date" value="" placeholder="Year of Completion" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_dofb[]" type="date" value="" placeholder="Year of Completion" maxlength="10" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
           '<input name="add_status_[]" type="text" value="" placeholder="Status" maxlength="12" required="">' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }
var items = 4;
    function addRow_table4b() {
        var table = document.getElementById("table_4b");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
            '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_author_b[]" type="text" value="" placeholder="Author(s)" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_title_b[]" type="text" value="" placeholder="Title" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_year_b[]" type="int" value="" placeholder="Year" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_isbn_b[]" type="text" value="" placeholder="ISBN" maxlength="20" required="">' +
            '</td>' +
            '<td>' +
            '<button type="button" onclick="deleteRow(this)" class="add-more" >Delete</button>' +
            '</td>' +
            '</tr>';

        // Insert the new row HTML into the table
        table.innerHTML += newRowHTML;
    }
var items = 4;
    function addRow_table4c() {
        var table = document.getElementById("table_4c");

        // counting the rows in the table 
        var rowCount = table.rows.length; 
        
        // Define the HTML content for the new row
        var newRowHTML = '<tr height="60px">' +
           '<td class="input-box-tbl">' +
            items+
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_author_c[]" type="text" value="" placeholder="Author(s)" maxlength="30" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_title_c[]" type="text" value="" placeholder="Title" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_year_c[]" type="int" value="" placeholder="Year" maxlength="50" required="">' +
            '</td>' +
            '<td class="input-box-tbl">' +
            '<input name="add_isbn_c[]" type="text" value="" placeholder="ISBN" maxlength="20" required="">' +
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