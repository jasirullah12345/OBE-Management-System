<?php
require "../database.php";

$id = $_POST["teacherID"];
$name = $_POST["teacherName"];
$email = $_POST["teacherEmail"];
$pass = $_POST["teacherPass"];

// Checking if user already Exist at this email
$sql_checker = "select * from teachers where email = '$email' AND id != $id ";
$qr = mysqli_query($conn, $sql_checker);
if (mysqli_num_rows($qr) > 0) {
    header("Location:../../teacher?error=User already exists at this email");
} else {
    //    Update user
    $sql = "UPDATE teachers SET name='" . $name . "', email='" . $email . "', password = '".$pass."' WHERE id=" . $id . "";
    echo $sql;

    if ($conn->query($sql) === TRUE) {
        header("Location:../../teacher?msg=Updated Successfully");
    } else {
        header("Location:../../teacher?error=Updation Failed");
    }
}
$conn->close();