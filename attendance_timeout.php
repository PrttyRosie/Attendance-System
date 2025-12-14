<?php
include "db.php";

$id = $_GET['id'];
$timeout = date("H:i");

mysqli_query($conn, "UPDATE attendance SET time_out='$timeout' WHERE attendance_id=$id");

header("Location: dashboard_teacher.php");
?>