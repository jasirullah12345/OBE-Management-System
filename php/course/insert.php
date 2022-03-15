<?php
require "../sessionCheck.php";
require "../database.php";
if(isset($_POST['courseForAddition']))
{
     //Data to be insert    
     $courserName =  $_POST['courseForAddition'];
    
    
    // Checking if course already Exist 
    $sql_checker = "select * from courses where name = '$courserName' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../course?error=Course already exist");
    }
    else
    {
        // Adding New Course
        echo $sql = "insert into courses (name) values('$courserName')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
            header("Location:../../course?msg=Course Inserted Successfully");
        }
        else
        {
            header("Location:../../course?error=Something Went Wrong");
        }
    }
}
