<?php include("../config/constants.php"); ?>
<?php 
    session_start();
 if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    
} 

else {
    // Vaapis jao login page pr 
    
    //header("location:".SITEURL.'login.php');
}



if ($_SERVER["REQUEST_METHOD"] == "POST") {



    try {

        // inserting into table 
        //print_r($_POST);

        
        for ($i = 0; $i < count($_POST["sub_name"]); $i++) {
            $sub_name = $_POST["sub_name"][$i];
            $sub_position = $_POST["sub_position"][$i];
            $sub_role = $_POST["sub_role"][$i];
            $sub_institution = $_POST["sub_institution"][$i];
            $sub_email = $_POST["sub_email"][$i];
            $sub_contact = $_POST["sub_contact"][$i];

            // query for inserting sponsor information into the table
            $sql5 = "INSERT INTO submission_22 (id , sub_name, sub_position, sub_role, sub_institution, sub_email, sub_contact) 
                    VALUES ($id , '$sub_name', '$sub_position', '$sub_role', '$sub_institution', '$sub_email', '$sub_contact')";

            // run the query
            
            $res5 = mysqli_query($conn, $sql5);
            if ($res5) {
                // echo "Done";
            } else {
                echo "Error";
            }
        }
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


    if (empty($_FILES)) {
        exit('$_FILES is empty - is file_uploads set to "Off" in php.ini?');
    }

    foreach ($_FILES as $file) {
        if ($file["error"] !== UPLOAD_ERR_OK) {
            switch ($file["error"]) {
                case UPLOAD_ERR_PARTIAL:
                    exit('File only partially uploaded');
                    break;
                case UPLOAD_ERR_NO_FILE:
                    exit('No file was uploaded');
                    break;
                case UPLOAD_ERR_EXTENSION:
                    exit('File upload stopped by a PHP extension');
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    exit('File exceeds MAX_FILE_SIZE in the HTML form');
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    exit('File exceeds upload_max_filesize in php.ini');
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    exit('Temporary folder not found');
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    exit('Failed to write file');
                    break;
                default:
                    exit('Unknown upload error');
                    break;
            }
        }

        // Reject uploaded files larger than 1MB
        // if ($file["size"] > 1048576) {
        //     exit('File too large (max 1MB)');
        // }

        // Process the file name
        $pathinfo = pathinfo($file["name"]);
        $base = "id" . "($id)" . $pathinfo["filename"];
        $base = preg_replace("/[^\w-]/", "_", $base);
        $filename = $base . "." . $pathinfo["extension"];

        // Avoid filename collisions
        $destination = "../uploads/" . $filename;
        $i = 1;
        while (file_exists($destination)) {
            // $filename = $base . "($i)." . $pathinfo["extension"];
            // $destination = "../uploads/" . $filename;
            // $i++;
            
            // to repetitive file uploading.....
            break;

            
        }

        // Move the uploaded file
        if (!move_uploaded_file($file["tmp_name"], $destination)) {
            exit("Can't move uploaded file");
        }
    }

    // All files uploaded successfully
    // echo "All files uploaded successfully.";
    header("location:".SITEURL.'final-declaration.php');


}



?>
<!DOCTYPE html>
<html>
<head>
    <title>Submission_complete</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/base.css">
    <link rel="stylesheet" href="../samples/form-box.css">
    <link rel="stylesheet" href="../samples/form-table.css">
    <link rel="stylesheet" href="../css/faculty-panel.css">
    <link rel="stylesheet" href="../css/submission_main.css">
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

<form method="post" enctype="multipart/form-data" id="uni3">

    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="1576"> -->

    <div class ="main-container">
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
    <div class ="section">
    <div class="panel ">
    

        <h4>20. Reprints of 5 Best Research Papers *</h4>

        <div class="panel-body">

            <div class="user-details2">
                <div class="input-box">
                    <span  >Upload 5 Best Research Papers in a single PDF < 6MB</span>
                    <label for="file_20a">Upload file</label>
                    <input type="file" name="file_20a" id="file_20a">
                
                    <!-- <button class="upload">Upload</button> -->
        
                </div>
            </div>
            

        </div>
    </div>
    </div>

    <div class="section">
        <div class="panel ">
        <h4>21. Check List of the documents attached with the online application *</h4>
            

            <div class="panel-body">

                <div class="user-details">
                    <div class="input-box">
                        <span  >Update PHD Certificate</span>
                        <label for="file_21a">Upload file</label>
                        <input type="file" name="file_21a" id="file_21a">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                    <div class="input-box">
                        <span  >Update All semester/year-Marksheets and degree certificate</span>
                        <label for="file_21b">Upload file</label>
                        <input type="file" name="file_21b" id="file_21b">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                
                </div>

            </div>
            


            <div class="panel-body">

                <div class="user-details">
                    <div class="input-box">
                        <span  >Update All semester/year-Marksheets and degree certificate</span>
                        <label for="file_21c">Upload file</label>
                        <input type="file" name="file_21c" id="file_21c">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                    <div class="input-box">
                        <span  >Update 12th/HSC/Diploma/Marksheet(s) and passing certificate</span>
                        <label for="file_21d">Upload file</label>
                        <input type="file" name="file_21d" id="file_21d">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                
                </div>

            </div>




            <div class="panel-body">

                <div class="user-details">
                    <div class="input-box">
                        <span  >Update PHD Certificate</span>
                        <label for="file_21e">Upload file</label>
                        <input type="file" name="file_21e" id="file_21e">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                    <div class="input-box">
                        <span  >Update 12th/HSC/Diploma/Marksheet(s) and passing certificate</span>
                        <label for="file_21f">Upload file</label>
                        <input type="file" name="file_21f" id="file_21f">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                
                </div>

            </div>


            <div class="panel-body">

                <div class="user-details">
                    <div class="input-box">
                        <span  >Update Pay Slip</span>
                        <label for="file_21g">Upload file</label>
                        <input type="file" name="file_21g" id="file_21g">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                    <div class="input-box">
                        <span  >Undertaking-in case, NOC is not available at the time of application but will be provided at the time of interview</span>
                        <label for="file_21h">Upload file</label>
                        <input type="file" name="file_21h" id="file_21h">
                        <!-- <button class="upload">Upload</button> -->
                    </div>
                
                </div>

            </div>

            <div class="panel-body">

                <div class="user-details2">
                    <div class="input-box">
                        <span  ></span>
                        <label for="file_21i">Another file</label>
                        <input type="file" name="file_21i" id="file_21i">
                        <!-- <button class="upload">Upload</button> -->
            
                    </div>
                </div>
                

            </div>

            <div class="panel-body">

                <div class="user-details2">
                    <div class="input-box">
                        <span  >Upload your Signature in JPG only</span>
                        <label for="image_21a">Image file</label>
                        <input type="file" id="image_21a" name="image_21a">
                        <!-- <button class="upload">Upload</button> -->
                    
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class ="section">
    <div class="panel ">
    
        
        <h4>22. Referees *</h4>

        <div class="tbl-container">
                    
            <div class="tbl-panel ">
                <div class="main-tbl">
                    <div class="tbl-panel-body">

                        
                    <table class="">

                        <tr height="50px">
                            <th class="tbl-head"> Name </th>
                            <th class="tbl-head">Position</th>
                            <th class="tbl-head"> Association with referee</th>
                            <th class="tbl-head">Institution/Organisation</th>
                            <th class="tbl-head">E-mail</th>
                            <th class="tbl-head">Contact No.</th>
                        
                        </tr>
                        <tr height="60px">
                                <td class="input-box-tbl">
                                    <input  name="sub_name[]" type="text" value=""
                                        placeholder="Name" maxlength="100" required="">
                                </td>

                                <td class="input-box-tbl">
                                    <input  name="sub_position[]" type="text" value=""
                                        placeholder="Position" maxlength="100" required="">
                                </td>

                                <td class="input-box-tbl">

                                    <select  name="sub_role[]" type="" value="" required="">
                                        <option value disabled selected>Select</option>
                                        <option value="Thesis Supervisor">Thesis Supervisor</option>
                                        <option value="Post-doc Supervisor">Post-doc Supervisor</option>
                                        <option value="Research Collaborator">Research Collaborator</option>
                                        <option value="Other">Other</option>
                                    </select>

                                </td>

                                <td class="input-box-tbl">
                                    <input  name="sub_institution[]" type="text" value=""
                                        placeholder="Institution" maxlength="50" required="">
                                </td>
                                <td class="input-box-tbl">
                                    <input  name="sub_email[]" type="email" value=""
                                        placeholder="E-mail" maxlength="50" required="">
                                </td>
                                <td class="input-box-tbl">
                                    <input  name="sub_contact[]" type="text" value=""
                                        placeholder="Contact No." maxlength="50" required="">
                                </td>
                            </tr>

                            <tr height="60px">
                                <td class="input-box-tbl">
                                    <input  name="sub_name[]" type="text" value=""
                                        placeholder="Name" maxlength="100" required="">
                                </td>

                                <td class="input-box-tbl">
                                    <input  name="sub_position[]" type="text" value=""
                                        placeholder="Position" maxlength="100" required="">
                                </td>

                                <td class="input-box-tbl">

                                    <select  name="sub_role[]" type="" value="" required="">
                                        <option value disabled selected>Select</option>
                                        <option value="Thesis Supervisor">Thesis Supervisor</option>
                                        <option value="Post-doc Supervisor">Post-doc Supervisor</option>
                                        <option value="Research Collaborator">Research Collaborator</option>
                                        <option value="Other">Other</option>
                                    </select>

                                </td>

                                <td class="input-box-tbl">
                                    <input  name="sub_institution[]" type="text" value=""
                                        placeholder="Institution" maxlength="50" required="">
                                </td>
                                <td class="input-box-tbl">
                                    <input  name="sub_email[]" type="email" value=""
                                        placeholder="E-mail" maxlength="50" required="">
                                </td>
                                <td class="input-box-tbl">
                                    <input  name="sub_contact[]" type="text" value=""
                                        placeholder="Contact No." maxlength="50" required="">
                                </td>
                            </tr>

                            <tr height="60px">
                                <td class="input-box-tbl">
                                    <input  name="sub_name[]" type="text" value=""
                                        placeholder="Name" maxlength="100" required="">
                                </td>

                                <td class="input-box-tbl">
                                    <input  name="sub_position[]" type="text" value=""
                                        placeholder="Position" maxlength="100" required="">
                                </td>

                                <td class="input-box-tbl">

                                    <select  name="sub_role[]" type="" value="" required="">
                                        <option value disabled selected>Select</option>
                                        <option value="Thesis Supervisor">Thesis Supervisor</option>
                                        <option value="Post-doc Supervisor">Post-doc Supervisor</option>
                                        <option value="Research Collaborator">Research Collaborator</option>
                                        <option value="Other">Other</option>
                                    </select>

                                </td>

                                <td class="input-box-tbl">
                                    <input  name="sub_institution[]" type="text" value=""
                                        placeholder="Institution" maxlength="50" required="">
                                </td>
                                <td class="input-box-tbl">
                                    <input  name="sub_email[]" type="email" value=""
                                        placeholder="E-mail" maxlength="50" required="">
                                </td>
                                <td class="input-box-tbl">
                                    <input  name="sub_contact[]" type="text" value=""
                                        placeholder="Contact No." maxlength="50" required="">
                                </td>
                            </tr>

                           

                        </table>

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


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Function to submit forms
                function submitForms() {
                    document.getElementById('uni3').submit();
                }

                // Add click event listener to the button
                document.getElementById('saveNextBtn').addEventListener('click', function() {
                    submitForms(); // Call the function to submit forms
                    window.location.href = 'final-declaration.php'; // Change 'another_page.html' to the URL of the desired page
                });
            });
        </script>

        <script>
            document.getElementById('backbtn').addEventListener('click' , function() {
                window.location.href = 'thesis_course.php';
            })
        </script>

   
</div>
</form>


</body>
</html>