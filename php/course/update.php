<?php
require "../database.php";

$id = $_POST["id"];
$name = $_POST["courseForAddition"];

//    Update user
$sql = "UPDATE courses SET name='" . $name . "' WHERE id=" . $id . "";
echo $sql;

if ($conn->query($sql) === TRUE) {
    header("Location:../../course?msg=Updated Successfully");
} else {
    header("Location:../../course?error=Updation Failed");
}

$conn->close();