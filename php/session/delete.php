<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from sessions WHERE id= '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:../../session?msg=Deleted Successfully");
} else {
    header("Location:../../session?error=Deletion Failed");
}
$conn->close();