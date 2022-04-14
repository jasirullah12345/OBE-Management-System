<?php
require "../database.php";
$id = $_POST["id"];
$teacher_id = $_POST["teacherID"];
$course_id = $_POST["selectedCourseForCourse"];

$teacher_name = $_POST["teacherName"];

//    Update user
$sql_checker = "select * from course_to_teacher where teacher_id = '$teacher_id' AND course_id = '$course_id' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../course-to-teacher?error=This course is already assigned to $teacher_name");
    }
    else
    {
        $sql = "update course_to_teacher set teacher_id = '$teacher_id', course_id = '$course_id' where id = '$id'";


        if ($conn->query($sql) === TRUE) {
            header("Location:../../course-to-teacher?msg=Updated Successfully");
        } else {
            header("Location:../../course-to-teacher?error=Updation Failed");
        }
    }


$conn->close();