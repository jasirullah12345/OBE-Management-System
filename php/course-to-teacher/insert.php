<?php
require "../sessionCheck.php";
require "../database.php";
if(isset($_POST['selectedTeacherForCourse']))
{
     //Data to be insert    
     $teacher =  $_POST['selectedTeacherForCourse'];
     $course =  $_POST['selectedCourseForCourse'];
    
    
    // Checking if course-to-teacher already Assigned 
    $sql_checker = "select * from course_to_teacher where teacher_id = '$teacher' AND course_id = '$course' ";
    $qr  = mysqli_query($conn,$sql_checker);
    if(mysqli_num_rows($qr)>0)
    {
         header("Location:../../course-to-teacher?error=This course is already assigned to this teacher");
    }
    else
    {
        // Assigning Course 
        $sql = "insert into course_to_teacher (teacher_id,course_id ) values('$teacher','$course')";
        $qr  = mysqli_query($conn,$sql);
        if($qr>0)
        {
        header("Location:../../course-to-teacher?msg=Course Assigned Successfully");
        }
        else
        {
        header("Location:../../course-to-teacher?error=Something Went Wrong");
        }
    }
}
