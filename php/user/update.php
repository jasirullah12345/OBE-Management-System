<?php
require "../database.php";

$id = $_POST["userId"];
$name = $_POST["userName"];
$email = $_POST["userEmail"];
$password = $_POST["userPassword"];

// Checking if user already Exist at this email
echo $sql_checker = "select * from users where email = '$email' AND id != $id ";
$qr = mysqli_query($conn, $sql_checker);
if (mysqli_num_rows($qr) > 0) {
    header("Location:../../user?error=User already exists at this email");
} else {
//    Update user
    $sql = "UPDATE users SET name='" . $name . "', email='" . $email . "', password='" . $password . "' WHERE id=" . $id . "";
    echo $sql;

    if ($conn->query($sql) === TRUE) {
        header("Location:../../user?msg=Updated Successfully");
    } else {
        header("Location:../../user?error=Updation Failed");
    }
}


$conn->close();
?>