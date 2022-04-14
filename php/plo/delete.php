<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from plo WHERE id= $id";

if ($conn->query($sql) === TRUE) {
    header("Location:../../plo?msg=Deleted Successfully");
} else {
    header("Location:../../plo?error=Deletion Failed");
}
$conn->close();