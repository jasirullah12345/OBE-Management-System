<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from documents WHERE id= '$id'";

if ($conn->query($sql) === TRUE) {
    header("Location:../../document?msg=Deleted Successfully");
} else {
    header("Location:../../document?error=Deletion Failed");
}
$conn->close();