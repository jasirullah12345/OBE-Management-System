<?php
require "../sessionCheck.php";
require "../database.php";

if(isset($_POST['PloNoForAddition']))
{
     //Data to be insert    
     $PLO_no =  $_POST['PloNoForAddition'];
     $PLO_Name =  $_POST['PloNameForAddition'];
     $Keyword =  $_POST['PloKeywordForAddition'];
    
    
    // Checking if plo already Assigned 
    $sql_checker = "select * from plo where plo_no = '$PLO_no' AND name = '$PLO_Name' AND keywords = '$Keyword'";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../plo?error=PLO already exist");
    }
    else
    {
        // Assigning Plo 
        $sql = "insert into plo (plo_no,name,keywords) values('$PLO_no','$PLO_Name','$Keyword')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
        header("Location:../../plo?msg=PLO has been added successfully");
        }
        else
        {
        header("Location:../../plo?error=Something Went Wrong");
        }
    }
}
