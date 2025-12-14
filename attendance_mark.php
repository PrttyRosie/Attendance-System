<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit();
}

$teacher_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $student_id = $_POST['student_id'];
    $time_in    = $_POST['time_in'];
    $remarks    = $_POST['remarks'];
    $date_today = date("Y-m-d");
    
    mysqli_query(
        $conn,
        "INSERT INTO attendance
        (student_id, time_in, remarks, date_today, teacher_id)
        VALUES
        ($student_id, '$time_in', '$remarks', '$date_today', $teacher_id)"
        );
    
    header("Location: dashboard_teacher.php");
    exit();
}
?>
