<?php
include "db.php";

 $id = $_GET['id'];
 
 mysqli_query($conn, "DELETE FROM attendance WHERE attendance_id=$id");
 
 header("Location: dashboard_teacher.php");
 
 ?>