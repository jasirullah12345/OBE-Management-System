<?php
require "../sessionCheck.php";
require "../database.php";
if(isset($_POST['selectedDocumentType']))
{
     //Data to be insert    
     $type =    $_POST['selectedDocumentType'];
     $title =   $_POST['titleOfDocumentForAddition'];
     $desc =    $_POST['titleOfDescriptionForAddition'];
     $plo_id =  $_POST['selectedPLOForDocument'];  
     $clo_id =  $_POST['selectedCLOForDocument'];  
    
    
    // Checking if documents already submited
    $sql_checker = "select * from documents where type = '$type' AND title = '$title' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../document?error=Document already Exist");
    }
    else
    {
        // Assigning Documents
        $sql = "insert into documents(type,title,plo_id,clo_id,description) values('$type','$title','$plo_id','$clo_id','$desc')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
        header("Location:../../document?msg=Document Inserted Successfully");
        }
        else
        {
        header("Location:../../document?error=Something Went Wrong");
        }
    }
}
