<?php
require "database.php";
session_start();
$email = $_POST["email"];
$password = $_POST["password"];

$sql = "SELECT * FROM users where email ='" . $email . "' limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        if  ($row["password"] == $password) {
            $_SESSION['id'] = $row["id"];
            $_SESSION['name'] = $row["name"];
            $_SESSION['email'] = $row["email"];
            header("Location:../");
        } else {
            header("Location:../login?error=Login Failed");
        }
    }
} else {
    header("Location:../login?error=Login Failed");
}
$conn->close();