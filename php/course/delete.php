<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from courses WHERE id= $id";

if ($conn->query($sql) === TRUE) {
    header("Location:../../course?msg=Deleted Successfully");
} else {
    header("Location:../../course?error=Deletion Failed");
}
$conn->close();