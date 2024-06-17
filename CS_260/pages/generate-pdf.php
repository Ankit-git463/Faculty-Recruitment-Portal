<?php include("../config/constants.php"); ?>

<?php
// Include necessary files
require ('../dompdf/vendor/autoload.php');
use Dompdf\Dompdf;

// Load HTML content from a template file
session_start();
if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
    echo $id;
} 

else {
    // Vaapis jao login page pr 
    
    //header("location:".SITEURL.'login.php');
}

// Create Dompdf instance
$dompdf = new dompdf();
$html = file_get_contents('template.html');

 


// ---------------------------------- Page1 ---------------------------


// table personal info 
$sql1 = "SELECT * from personal_info where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
    
        $first_name= $row1['first_name'];
        $middle_name = $row1['middle_name']; 
        $last_name = $row1['last_name'];
        $nationality = $row1['nationality'];
        $dob = $row1['dob'] ;
        $gender = $row1['gender'];
        $mar_status = $row1['mar_status'] ;
        $category = $row1['category'] ;
        $id_proof = $row1['id_proof'] ;
        $father_name = $row1['father_name'] ;
        $mobile = $row1['mobile'];
        $email = $row1['email'];
        $alt_email = $row1['alt_email'];
        $alt_mobile = $row1['alt_mobile'];
        $landline = $row1['landline'];
    }
    

}



// table application_details 

$sql1 = "SELECT * from application_details where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
        $adv_num= $row1["adv_num"] ;
        $date_app= $row1["date_app"] ;
        $app_num= $row1["app_num"];
        $applied_post= $row1["applied_post"];
        $dept_school= $row1["dept_school"] ;
    }
    

}



// table _address_details 

$sql1 = "SELECT * from address_details where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        $corrs_street = $row1['corrs_street'];
        $corrs_city = $row1['corrs_city'];
        $corrs_state = $row1['corrs_state'];
        $corrs_country = $row1['corrs_country'];
        $corrs_pin = $row1['corrs_pin'];
        $perm_street = $row1['perm_street'];
        $perm_city = $row1['perm_city'];
        $perm_state = $row1['perm_state'];
        $perm_country = $row1['perm_country'];
        $perm_pin = $row1['perm_pin'];
        
    }
    

}



$replacements = array(
    
    '{{first_name}}' => $first_name,
    '{{name}}'=>$first_name." ".$last_name,
    '{{middle_name}}' => $middle_name,
    '{{last_name}}' => $last_name,
    '{{nationality}}' => $nationality,
    '{{dob}}' => $dob,
    '{{gender}}' => $gender,
    '{{mar_status}}' => $mar_status,
    '{{category}}' => $category,
    '{{id_proof}}' => $id_proof,
    '{{father_name}}' => $father_name,
    '{{mobile}}' => $mobile,
    '{{email}}' => $email,
    '{{alt_email}}' => $alt_email,
    '{{alt_mobile}}' => $alt_mobile,
    '{{landline}}' => $landline,


    '{{adv_num}}' => $adv_num,
    '{{date_app}}' => $date_app,
    '{{app_num}}' => $app_num,
    '{{applied_post}}' => $applied_post,
    '{{dept_school}}' => $dept_school,

    '{{corrs_street}}' => $corrs_street,
    '{{corrs_city}}' => $corrs_city,
    '{{corrs_state}}' => $corrs_state,
    '{{corrs_country}}' => $corrs_country,
    '{{corrs_pin}}' => $corrs_pin,
    '{{perm_street}}' => $perm_street,
    '{{perm_city}}' => $perm_city,
    '{{perm_state}}' => $perm_state,
    '{{perm_country}}' => $perm_country,
    '{{perm_pin}}' => $perm_pin
    
);

// Replace placeholders with values
$html = str_replace(array_keys($replacements), array_values($replacements), $html);

// -------------------------- Page 2 : acde ------------------------------

// acde_2a ------------------
$sql1 = "SELECT * from acde_2a where id = $id LIMIT 1 ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
       
        $institute_2a= $row1["acde_2a_institute"] ;
        $department_2a= $row1["acde_2a_department"] ;
        $supervisor_2a= $row1["acde_2a_supervisor"];
        $yoj_phd_2a= $row1["acde_2a_yoj_phd"] ;
        $date_thesis_2a= $row1["acde_2a_date_thesis"] ;
        $doa_phd_2a= $row1["acde_2a_doa_phd"] ;
        $title_phd_2a= $row1["acde_2a_title_phd"];
    }
}


// acde_2b -------------------
$sql1 = "SELECT * from acde_2b where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
        $degree_2b = $row1["acde_2b_degree"];
        $institute_2b = $row1["acde_2b_institute"];
        $branch_2b = $row1["acde_2b_branch"];
        $yoj_2b = $row1["acde_2b_yoj"];
        $duration_2b = $row1["acde_2b_duration"];
        $yoc_2b = $row1["acde_2b_yoc"];
        $cgpa_2b = $row1["acde_2b_cgpa"];
        $div_2b = $row1["acde_2b_div"];
    }
    

}
// acde_2c -------------------
$sql1 = "SELECT * from acde_2c where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
        $degree_2c = $row1["acde_2c_degree"];
        $institute_2c = $row1["acde_2c_institute"];
        $branch_2c = $row1["acde_2c_branch"];
        $yoj_2c = $row1["acde_2c_yoj"];
        $duration_2c = $row1["acde_2c_duration"];
        $yoc_2c = $row1["acde_2c_yoc"];
        $cgpa_2c = $row1["acde_2c_cgpa"];
        $div_2c = $row1["acde_2c_div"];
    }
    

}
// acde_2d -------------------
$sql1 = "SELECT * from acde_2d where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
        $degree1 = $row1["degree"];
        $school1 = $row1["school"];
        $yop1 = $row1["yop"];
        $grade1 = $row1["grade"];
        $divi1 = $row1["divi"];

        $row1 = mysqli_fetch_assoc($res1);

        $degree2 = $row1["degree"];
        $school2 = $row1["school"];
        $yop2 = $row1["yop"];
        $grade2 = $row1["grade"];
        $divi2 = $row1["divi"];
    }
    

}
// acde_2e -------------------


$replacements2 = array(

    '{{institute_2a}}' => $institute_2a,
    '{{department_2a}}' => $department_2a,
    '{{supervisor_2a}}' => $supervisor_2a,
    '{{yoj_phd_2a}}' => $yoj_phd_2a,
    '{{date_thesis_2a}}' => $date_thesis_2a,
    '{{doa_phd_2a}}' => $doa_phd_2a,
    '{{title_phd_2a}}' => $title_phd_2a,

    

    '{{degree_2b}}' => $degree_2b,
    '{{institute_2b}}' => $institute_2b,
    '{{branch_2b}}' => $branch_2b,
    '{{yoj_2b}}' => $yoj_2b,
    '{{duration_2b}}' => $duration_2b,
    '{{yoc_2b}}' => $yoc_2b,
    '{{cgpa_2b}}' => $cgpa_2b,
    '{{div_2b}}' => $div_2b,

    '{{degree_2c}}' => $degree_2c,
    '{{institute_2c}}' => $institute_2c,
    '{{branch_2c}}' => $branch_2c,
    '{{yoj_2c}}' => $yoj_2c,
    '{{duration_2c}}' => $duration_2c,
    '{{yoc_2c}}' => $yoc_2c,
    '{{cgpa_2c}}' => $cgpa_2c,
    '{{div_2c}}' => $div_2c,

    '{{degree}}' => $degree1,
    '{{school}}' => $school1,
    '{{yop}}' => $yop1,
    '{{grade}}' => $grade1,
    '{{divi}}' => $divi1,

    '{{degree1}}' => $degree2,
    '{{school1}}' => $school2,
    '{{yop1}}' => $yop2,
    '{{grade1}}' => $grade2,
    '{{divi1}}' => $divi2
);


// Replace placeholders with values
$html = str_replace(array_keys($replacements2), array_values($replacements2), $html);

// ----------------------------Page Emp details-------------------------



// emp3a ---------------------------
$sql1 = "SELECT * from emp_3a where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
        $position= $row1["position"] ;
        $organisation_3a= $row1["organisation_3a"] ;
        $doj= $row1["doj"] ;
        $dol= $row1["dol"] ;
        $duration= $row1["duration"] ;
    }
    

}



$sql1 = "SELECT * from emp_3b where id = $id LIMIT 2 ;" ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
        $position_3b1 = $row1["position_3b"];
        $organisation1 = $row1["organisation"];
        $doj_3b1= $row1["doj_3b"];
        $dol_3b1 = $row1["dol_3b"];
        $duration_3b1 = $row1["duration_3b"];

        $row1 = mysqli_fetch_assoc($res1);

        $position_3b2 = $row1["position_3b"];
        $organisation2 = $row1["organisation"];
        $doj_3b2= $row1["doj_3b"];
        $dol_3b2 = $row1["dol_3b"];
        $duration_3b2 = $row1["duration_3b"];
    }
    

}



$sql1 = "SELECT * from emp_3c where id = $id LIMIT 2 ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        
        $position_3c1 = $row1["position_3c"];
        $employer1 = $row1["employer"];
        $course_taught1 = $row1["course_taught"];
        $UG_PG1 = $row1["UG_PG"];
        $no_of_students1 = $row1["no_of_students"];
        $doj_3c1= $row1["doj_3c"];
        $dol_3c1 = $row1["dol_3c"];
        $duration_3c1 = $row1["duration_3c"];

        $row1 = mysqli_fetch_assoc($res1);

        $position_3c2 = $row1["position_3c"];
        $employer2 = $row1["employer"];
        $course_taught2 = $row1["course_taught"];
        $UG_PG2 = $row1["UG_PG"];
        $no_of_students2 = $row1["no_of_students"];
        $doj_3c2= $row1["doj_3c"];
        $dol_3c2 = $row1["dol_3c"];
        $duration_3c2 = $row1["duration_3c"];
    }
    

}

// Table emp3d
$sql1 = "SELECT * from emp_3d where id = $id LIMIT 3; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);

        $position_3d1 = $row1["position_3d"];
        $institute1 = $row1["institute"];
        $supervisor1 = $row1["supervisor"];
        $doj_3d1= $row1["doj_3d"];
        $dol_3d1 = $row1["dol_3d"];
        $duration_3d1 = $row1["duration_3d"];
        

        $row1 = mysqli_fetch_assoc($res1);
        $position_3d2 = $row1["position_3d"];
        $institute2 = $row1["institute"];
        $supervisor2 = $row1["supervisor"];
        $doj_3d2= $row1["doj_3d"];
        $dol_3d2 = $row1["dol_3d"];
        $duration_3d2 = $row1["duration_3d"];


    }
    

}

$sql1 = "SELECT * from emp_3e where id = $id LIMIT 3 ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);
        $organisation_3e1 = $row1["organisation_3e"];
        $work_profile1 = $row1["work_profile"];
        $doj_3e1= $row1["doj_3e"];
        $dol_3e1 = $row1["dol_3e"];
        $duration_3e1 = $row1["duration_3e"];
        

        $row1 = mysqli_fetch_assoc($res1);
        $organisation_3e2 = $row1["organisation_3e"];
        $work_profile2 = $row1["work_profile"];
        $doj_3e2= $row1["doj_3e"];
        $dol_3e2 = $row1["dol_3e"];
        $duration_3e2 = $row1["duration_3e"];


    }
    

}


$replacements3 = array(
    
    
    '{{position}}' => $position,
    '{{organisation_3a}}' => $organisation_3a,
    '{{doj}}' => $doj,
    '{{dol}}' => $dol,
    '{{duration}}' => $duration,

    '{{position_3b1}}' => $position_3b1,
    '{{organisation1}}' => $organisation1,
    '{{doj_3b1}}' => $doj_3b1,
    '{{dol_3b1}}' => $dol_3b1,
    '{{duration_3b1}}' => $duration_3b1,

    '{{position_3b2}}' => $position_3b2,
    '{{organisation2}}' => $organisation2,
    '{{doj_3b2}}' => $doj_3b2,
    '{{dol_3b2}}' => $dol_3b2,
    '{{duration_3b2}}' => $duration_3b2,

    '{{position_3c1}}' => $position_3c1,
    '{{employer1}}' => $employer1,
    '{{course_taught1}}' => $course_taught1,
    '{{UG_PG1}}' => $UG_PG1,
    '{{no_of_students1}}' => $no_of_students1,
    '{{doj_3c1}}' => $doj_3c1,
    '{{dol_3c1}}' => $dol_3c1,
    '{{duration_3c1}}' => $duration_3c1,

    '{{position_3c2}}' => $position_3c2,
    '{{employer2}}' => $employer2,
    '{{course_taught2}}' => $course_taught2,
    '{{UG_PG2}}' => $UG_PG2,
    '{{no_of_students2}}' => $no_of_students2,
    '{{doj_3c2}}' => $doj_3c2,
    '{{dol_3c2}}' => $dol_3c2,
    '{{duration_3c2}}' => $duration_3c2,

    '{{position_3d1}}' => $position_3d1,
    '{{institute1}}' => $institute1,
    '{{supervisor1}}' => $supervisor1,
    '{{doj_3d1}}' => $doj_3d1,
    '{{dol_3d1}}' => $dol_3d1,
    '{{duration_3d1}}' => $duration_3d1,

    '{{position_3d2}}' => $position_3d2,
    '{{institute2}}' => $institute2,
    '{{supervisor2}}' => $supervisor2,
    '{{doj_3d2}}' => $doj_3d2,
    '{{dol_3d2}}' => $dol_3d2,
    '{{duration_3d2}}' => $duration_3d2,


    '{{organisation_3e1}}' => $organisation_3e1,
    '{{work_profile1}}' => $work_profile1,
    '{{doj_3e1}}' => $doj_3e1,
    '{{dol_3e1}}' => $dol_3e1,
    '{{duration_3e1}}' => $duration_3e1,

    '{{organisation_3e2}}' => $organisation_3e2,
    '{{work_profile2}}' => $work_profile2,
    '{{doj_3e2}}' => $doj_3e2,
    '{{dol_3e2}}' => $dol_3e2,
    '{{duration_3e2}}' => $duration_3e2



    
);

// Replace placeholders with values
$html = str_replace(array_keys($replacements3), array_values($replacements3), $html);

// ------------------Publish PAGE -----------

// ---------------pub_5 ---------------------------
$sql1 = "SELECT * from pub_5 where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);

$count = 1 ; 
if ($res1 ){

    if ($count1>0 ){
    
        $row1 = mysqli_fetch_assoc($res1);


        $in_jo= $row1["in_jo"] ;
        $na_jo= $row1["na_jo"] ;
        $in_co= $row1["in_co"];
        $na_co= $row1["na_co"] ;
        $nop= $row1["nop"] ;
        $nob= $row1["nob"] ;
        $nobc= $row1["nobc"] ;

        $replacements=array(
            '{{na_jo}}' => $na_jo,
            '{{in_jo}}' => $in_jo,
            '{{na_co}}' => $na_co,
            '{{in_co}}' => $in_co,
            '{{nop}}' => $nop,
            '{{nob}}' => $nob,
            '{{nobc}}' => $nobc

            
        );
   
        $html = str_replace(array_keys($replacements), array_values($replacements), $html, $count);


        
    }
    

}


// pub_6 
$sql1 = "SELECT * from pub_6 where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){
    if ($count1>0 ){
    
        // Assuming $count1 is defined somewhere above this loop
 
         for ($i = 0; $i < $count1; $i++) {
            $row1 = mysqli_fetch_assoc($res1);

            $author = $row1["author"];
            $title = $row1["title"];
            $na_of_jo= $row1["na_of_jo"];
            $yvp = $row1["yvp"];
            $impact= $row1["impact"];
            $status_= $row1["status_"];

            $replacements=array(
                '{{author}}' => $author,
                '{{title}}' => $title,
                '{{na_of_jo}}' => $na_of_jo,
                '{{yvp}}' => $yvp,
                '{{impact}}' => $impact,
                '{{status_}}' => $status_
                
                
            );
            
            $html = str_replace(array_keys($replacements), array_values($replacements), $html ,$count);
         }
 
         
         
         
     }
    

}



// pub_a
$sql1 = "SELECT * from pub_a where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
        // Assuming $count1 is defined somewhere above this loop
 
         for ($i = 0; $i < $count1; $i++) {
            $row1 = mysqli_fetch_assoc($res1);
            $inventor = $row1["inventor"];
            $title_a = $row1["title_a"];
            $cop = $row1["cop"];
            $pon = $row1["pon"];
            $dof = $row1["dof"];
            $dop= $row1["dop"];
            $status_ = $row1["status_"];
    
            $replacements=array(
                '{{inventor}}' => $inventor,
                '{{title_a}}' => $title_a,
                '{{cop}}' => $cop,
                '{{pon}}' => $pon,
                '{{dof}}' => $dof,
                '{{dop}}' => $dop,
                '{{status_}}' => $status_
                
            );
            
            $html = str_replace(array_keys($replacements), array_values($replacements), $html, $count);
         }
 
         
         
         
     }

    
    

}


//pub_b

$sql1 = "SELECT * from pub_b where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    
     if ($count1>0 ){
    
        // Assuming $count1 is defined somewhere above this loop
 
         for ($i = 0; $i < $count1; $i++) {
            $row1 = mysqli_fetch_assoc($res1);
            
            $author_b = $row1["author_b"];
            $title_b= $row1["title_b"];
            $year_b = $row1["Year_b"];
            $isbn_b= $row1["isbn_b"];
    
            $replacements=array(
                '{{author_b}}' => $author_b,
                '{{title_b}}' => $title_b,
                '{{year_b}}' => $year_b,
                '{{isbn_b}}' => $isbn_b
            );
            
            $html = str_replace(array_keys($replacements), array_values($replacements), $html, $count);
         }
 
         
         
         
     }
    

}


//

$sql1 = "SELECT * from pub_c where id = $id ; " ; 
$res1 = mysqli_query($conn , $sql1 );
$count1 = mysqli_num_rows($res1);


if ($res1 ){

    if ($count1>0 ){
    
       // Assuming $count1 is defined somewhere above this loop

        for ($i = 0; $i < $count1; $i++) {
            $row1 = mysqli_fetch_assoc($res1);
            $author_c = $row1["author_c"];
            $title_c = $row1["title_c"];
            $year_c = $row1["Year_c"];
            $isbn_c = $row1["isbn_c"];

            $replacements = array(
                '{{author_c}}' => $author_c,
                '{{title_c}}' => $title_c,
                '{{year_c}}' => $year_c,
                '{{isbn_c}}' => $isbn_c
            );

            $html = str_replace(array_keys($replacements), array_values($replacements), $html, $count);
        }

        
        
        
    }
    

}



//

// $sql1 = "SELECT * from pub_4 where id = $id ; " ; 
// $res1 = mysqli_query($conn , $sql1 );
// $count1 = mysqli_num_rows($res1);


// if ($res1 ){

//     if ($count1>0 ){
    
//         $row1 = mysqli_fetch_assoc($res1);
        
        
//     }
    

// }







// Load HTML into Dompdf
$dompdf->loadHtml($html);


// (Optional) Set paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render PDF (optional: pass $options array for rendering settings)
$dompdf->render();

// Output PDF to the browser
$dompdf->stream("output.pdf", array("Attachment" => false));
exit();
?>
