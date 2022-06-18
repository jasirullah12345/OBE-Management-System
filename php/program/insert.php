<?php
require "../sessionCheck.php";
require "../database.php";
if(isset($_POST['selectedDepartment']))
{
     //Data to be insert    
     $depatrment =  $_POST['selectedDepartment'];
     $program =  $_POST['programNameForAddtition'];
    
    
    // Checking if program already Exist 
    $sql_checker = "select * from programs where depart_id = '$depatrment' AND name = '$program' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../program?error=Department already exist");
    }
    else
    {
        // Adding New Program
        echo $sql = "insert into programs (depart_id,name) values('$depatrment','$program')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
            header("Location:../../program?msg=Department Inserted Successfully");
        }
        else
        {
            header("Location:../../program?error=Something Went Wrong");
        }
    }
}
