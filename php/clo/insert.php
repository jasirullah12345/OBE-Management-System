<?php
require "../sessionCheck.php";
require "../database.php";

if(isset($_POST['CloNoForAddition']))
{
     //Data to be insert    
     $CLO_no =  $_POST['CloNoForAddition'];
     $CLO_Name =  $_POST['CloNameForAddition'];
     $Keyword =  $_POST['CloKeywordForAddition'];
    
    
    // Checking if Plo already Assigned 
    $sql_checker = "select * from clo where clo_no = '$CLO_no' AND name = '$CLO_Name' AND keywords = '$Keyword'";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../plo?error=CLO already exist");
    }
    else
    {
        // Assigning Plo 
        $sql = "insert into clo (clo_no,name,keywords) values('$CLO_no','$CLO_Name','$Keyword')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
        header("Location:../../clo?msg=CLO has been added successfully");
        }
        else
        {
        header("Location:../../clo?error=Something Went Wrong");
        }
    }
}
