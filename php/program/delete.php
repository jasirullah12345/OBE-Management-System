<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from programs WHERE id= '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:../../program?msg=Deleted Successfully");
} else {
    header("Location:../../program?error=Deletion Failed");
}
$conn->close();