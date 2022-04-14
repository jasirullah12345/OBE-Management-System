<?php
require "../database.php";

$id = $_POST["id"];
$plo_no = $_POST["PloNoForAddition"];
$name = $_POST["PloNameForAddition"];
$keywords = $_POST["PloKeywordForAddition"];

//    Update user
$sql = "UPDATE plo SET plo_no='" . $plo_no . "', name='" . $name . "', keywords='" . $keywords . "' WHERE id=" . $id . "";
echo $sql;

if ($conn->query($sql) === TRUE) {
    header("Location:../../plo?msg=Updated Successfully");
} else {
    header("Location:../../plo?error=Updation Failed");
}

$conn->close();