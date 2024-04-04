
<?php include("../config/constants.php"); ?>

<?php

    print_r($_POST);

    $adv_num= $_POST["adv_num"] ;
    $date_app= $_POST["date_app"] ;
    // $app_num= $_POST["app_num"] ;

    // application number should be a integer so we will use filterinput function to filter 
    $app_num= filter_input(INPUT_POST , "app_num" , FILTER_VALIDATE_INT ) ;
    $applied_post= $_POST["applied_post"];
    $dept_school= $_POST["dept_school"] ;



    // printing the data of all variables 
    //  var_dump($adv_num , $date_app ,$app_num , $applied_post , $dept_school);

    $sql = "INSERT INTO application_details (advertisement_number ,application_number,date_of_application , post_applied,department) 
            VALUES ('$adv_num' ,$app_num , '$date_app' , '$applied_post' , '$dept_school')" ; 
    
    $res = mysqli_query($conn , $sql ) or die(mysqli_error());
    


    if ($res == TRUE ){
        // Data Inserted 
        echo "Data Inserted ";
        
    }
    else {
        // Failed to insert data 
        echo "Failed to insert data ";
    }

    echo $first_name= $_POST['first_name'] ;
    echo $middle_name= $_POST['middle_name'] ;
    echo $last_name= $_POST['last_name'] ;
    echo $nationality= $_POST['nationality'] ;
    echo $dob= $_POST['dob'];    

    echo $gender= $_POST['gender'] ;
    echo $mar_status= $_POST['mar_status']  ;
    echo $category= $_POST['category'];
    echo $id_proof= $_POST['id_proof'];
    echo $id_file= $_POST['id_file'] ;;
    echo $father_name= $_POST['father_name'] ;
    echo $prf_photo= $_POST['prf_photo'] ;


    echo $corrs_street= $_POST['corrs_street'];  
    echo $corrs_city= $_POST['corrs_city'] ;
    echo $corrs_state= $_POST['corrs_state'] ;
    echo $corrs_country= $_POST['corrs_country'] ;
    echo $corrs_pin= $_POST['corrs_pin'];

    echo $perm_street= $_POST['perm_street'] ;
    echo $perm_city= $_POST['perm_city'] ;
    echo $perm_state= $_POST['perm_state'] ;
    echo $perm_country= $_POST['perm_country'] ;
    echo $perm_pin = $_POST['perm_pin']  ;


    header("location:".SITEURL.'acde.html');

?>