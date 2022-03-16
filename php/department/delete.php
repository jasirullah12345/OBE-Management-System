<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from department WHERE id= $id";

if ($conn->query($sql) === TRUE) {
    header("Location:../../department?msg=Deleted Successfully");
} else {
    header("Location:../../department?error=Deletion Failed");
}
$conn->close();