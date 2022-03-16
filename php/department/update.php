<?php
require "../database.php";

$id = $_POST["id"];
$name = $_POST["name"];

//    Update user
$sql = "UPDATE department SET name='" . $name . "' WHERE id=" . $id . "";
echo $sql;

if ($conn->query($sql) === TRUE) {
    header("Location:../../department?msg=Updated Successfully");
} else {
    header("Location:../../department?error=Updation Failed");
}

$conn->close();