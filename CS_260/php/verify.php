<?php
if(isset($_GET['vkey']))
{
    $vkey=$_GET['vkey'];

    $mysqli = NEW MySQLi('localhost','root','','test');
    $resultSet =$mysqli->query("SELECT verified,vkey FROM accounts2 WHERE verified =0 and vkey='$vkey'  LIMIT 1");
    if($resultSet->num_rows==1)
    {
    //VALIDATE THE EMAIL
    echo "hello";
    $update = $mysqli->query("UPDATE accounts2 SET verified =1 WHERE vkey ='$vkey' LIMIT 1");
        
        if($update)
        {
            echo"Your account had been verified.You my now login.";
        }
        else
        {
            echo $mysqli->error;
        } 
    }  
    else{
        echo "This account invalid or already verified";
    }
}
else{
    die("Something went wrong");
}

       
?>