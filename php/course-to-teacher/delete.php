<?php
require "../database.php";

$id = $_GET["id"];
$sql = "Delete from course_to_teacher WHERE id= $id";

if ($conn->query($sql) === TRUE) {
    header("Location:../../course-to-teacher?msg=Deleted Successfully");
} else {
    header("Location:../../course-to-teacher?error=Deletion Failed");
}
$conn->close();