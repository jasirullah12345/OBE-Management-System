<?php
require "../database.php";

$id = $_POST["id"];
$name = $_POST["sessionNameForAddition"];
$program_ID = $_POST["selectedProgramForSession"];

//    Update user
$sql = "update sessions set name= '$name' , program_id = '$program_ID' where id='$id'";


if ($conn->query($sql) === TRUE) {
    header("Location:../../session?msg=Updated Successfully");
} else {
    header("Location:../../session?error=Updation Failed");
}

$conn->close();