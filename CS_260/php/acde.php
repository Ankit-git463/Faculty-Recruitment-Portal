




<?php include("../config/constants.php");?>



<?php
    print_r($_POST);
    $error = NULL;
    if(isset($_POST['submit']))
    {
       
        // $email = $_POST['email'];
        // $password = $_POST['password'];
                
        // $email = $conn->real_escape_string($email);
        // $password =$conn->real_escape_string($password);

        // // $password=md5($password);
        $id=rand(1, 1000000);
        $institute =$_POST['institute'];
        $department=$_POST['department'];
        $supervisor =$_POST['supervisor'];
        $yoj_phd =$_POST['yoj_phd'];
        $date_thesis=$_POST['date_thesis'];
        $doa_phd=$_POST['doa_phd'];
        $phd_title =$_POST['phd_title'];

        $sql = "INSERT INTO acde_2a   VALUES($id,'$institute','$department','$supervisor','$yoj_phd','$date_thesis','$doa_phd','$phd_title')  ";
        
        $res = mysqli_query($conn , $sql);




        if ($res ){
            
            echo "SUCCESS"; 
          
        }
        else{
        echo "ERROR"; 
        }

        
    }
?>
