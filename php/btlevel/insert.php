<?php
require "../sessionCheck.php";
require "../database.php";

if(isset($_POST['btNoForAddition']))
{
     //Data to be insert    
     $bt_no =  $_POST['btNoForAddition'];
     $bt_level =  $_POST['btLevelNameForAddition'];
     $Keyword =  $_POST['btLevelKeywordForAddition'];
    
    
    // Checking if bt_no already Exist 
    $sql_checker = "select * from bt_level where bt_no = '$bt_no' AND level = '$bt_level' AND keywords = '$Keyword'";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../bt-level?error=BT-Level already exist");
    }
    else
    {
        // Assigning BT-Level 
        $sql = "insert into bt_level (bt_no,level,keywords) values('$bt_no','$bt_level','$Keyword')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
        header("Location:../../bt-level?msg=BT-Level has been added successfully");
        }
        else
        {
        header("Location:../../bt-level?error=Something Went Wrong");
        }
    }
}
