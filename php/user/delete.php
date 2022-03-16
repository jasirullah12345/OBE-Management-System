<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from users WHERE id= $id";

if ($conn->query($sql) === TRUE) {
    header("Location:../../user?msg=Deleted Successfully");
} else {
    header("Location:../../user?error=Deletion Failed");
}
$conn->close();