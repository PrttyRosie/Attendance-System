<?php
include "db.php";

$fullname = $_POST['fullname'];
$student_number = $_POST['student_number'];
$course = $_POST['course'];
$year_level = $_POST['year_level'];

mysqli_query(
    $conn,
    "INSERT INTO students (fullname, student_number, course, year_level)
     VALUES ('$fullname', '$student_number', '$course', '$year_level')"
    );

header("Location: dashboard_teacher.php");
exit();
