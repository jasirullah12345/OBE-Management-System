<?php
require "../sessionCheck.php";
require "../database.php";
if(isset($_POST['departNameForAddition']))
{
     //Data to be insert    
     $departmentName =  $_POST['departNameForAddition'];
    
    
    // Checking if department already Exist 
    $sql_checker = "select * from department where name = '$departmentName' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../department?error=Department already exist");
    }
    else
    {
        // Adding New Department
        echo $sql = "insert into department (name) values('$departmentName')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
            header("Location:../../department?msg=Department Inserted Successfully");
        }
        else
        {
            header("Location:../../department?error=Something Went Wrong");
        }
    }
}
