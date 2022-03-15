<?php
require "../sessionCheck.php";
require "../database.php";
if(isset($_POST['teacherForAddition']))
{
     //Data to be insert    
     $teacherName =  $_POST['teacherForAddition'];
    
    
    // Checking if teacher already Exist 
    $sql_checker = "select * from teachers where name = '$teacherName' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../teacher?error=Teacher already exist");
    }
    else
    {
        // Adding New Teacher
        echo $sql = "insert into teachers (name) values('$teacherName')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
            header("Location:../../teacher?msg=Teacher Inserted Successfully");
        }
        else
        {
            header("Location:../../teacher?error=Something Went Wrong");
        }
    }
}
