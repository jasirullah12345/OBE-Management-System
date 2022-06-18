<?php
require "../sessionCheck.php";
require "../database.php";
if (isset($_POST['userName'])) {
    //Data to be inserted
    $userName = $_POST['userName'];
    $userEmail = $_POST['userEmail'];
    $userPassword = $_POST['userPassword'];

    // Checking if user already Exist 
    echo $sql_checker = "select * from users where email = '$userEmail' ";
    $qr = mysqli_query($conn, $sql_checker);
    if (mysqli_num_rows($qr) > 0) {
        header("Location:../../user?error=User already exsist");
    } else {
        // Adding New User
        echo $sql = "insert into users (name,email,password,role) values('$userName','$userEmail','$userPassword','user')";
        $qr = mysqli_query($conn, $sql);
        if ($qr > 0) {
            header("Location:../../user?msg=User Inserted Successfully");
        } else {
            header("Location:../../user?error=Something Went Wrong");
        }

    }

}
