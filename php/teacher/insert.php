<?php
require "../sessionCheck.php";
require "../database.php";
if (isset($_POST['teacherForAddition'])) {
    //Data to be inserted
    $userName = $_POST['teacherForAddition'];
    $userEmail = $_POST['teacherEmail'];
    $userPassword = $_POST['teacherPassword'];

    // Checking if user already Exist 
    $sql_checker = "select * from teachers where email = '$userEmail' ";
    $qr = mysqli_query($conn, $sql_checker);
    if (mysqli_num_rows($qr) > 0) {
        header("Location:../../teacher?error=User already exsist");
    } else {
        // Adding New User
        echo $sql = "insert into teachers (name,email,password) values('$userName','$userEmail','$userPassword')";
        $qr = mysqli_query($conn, $sql);
        if ($qr > 0) {
            header("Location:../../teacher?msg=Teacher Inserted Successfully");
        } else {
            header("Location:../../teacher?error=Something Went Wrong");
        }

    }

}
