<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from teachers WHERE id= $id";

if ($conn->query($sql) === TRUE) {
    header("Location:../../teacher?msg=Deleted Successfully");
} else {
    header("Location:../../teacher?error=Deletion Failed");
}
$conn->close();