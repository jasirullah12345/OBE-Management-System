<?php
require "../sessionCheck.php";
require "../database.php";
if(isset($_POST['selectedProgramForSession']))
{
     //Data to be insert    
     $program =  $_POST['selectedProgramForSession'];
     $session =  $_POST['sessionNameForAddition'];
    
    
    // Checking if program already Exist 
    $sql_checker = "select * from sessions where program_id = '$program' AND name = '$session' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../session?error=Session already exist");
    }
    else
    {
        // Adding New Program
        echo $sql = "insert into sessions (program_id,name) values('$program','$session')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
            header("Location:../../session?msg=Session Inserted Successfully");
        }
        else
        {
            header("Location:../../session?error=Something Went Wrong");
        }
    }
}
