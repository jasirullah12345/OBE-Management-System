<?php
require "../database.php";

$id = $_POST["id"];
$name = $_POST["ProgramtNameForAddition"];
$department_ID = $_POST["selectedDepartmentForSession"];

//    Update user
$sql = "update programs set name= '$name' , depart_id = '$department_ID' where id='$id'";


if ($conn->query($sql) === TRUE) {
    header("Location:../../program?msg=Updated Successfully");
} else {
    header("Location:../../program?error=Updation Failed");
}

$conn->close();