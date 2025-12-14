<?php
include "db.php";

$id = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $remarks = $_POST['remarks'];
    
    mysqli_query(
        $conn,
        "UPDATE attendance SET remarks='$remarks' WHERE attendance_id=$id"
        );
    
    header("Location: dashboard_teacher.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Update Attendance</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="update-container">
    <div class="update-box">
        <h2>Update Attendance</h2>

        <form method="POST">
            <select name="remarks" required>
                <option value="">Select Status</option>
                <option value="Present">Present</option>
                <option value="Late">Late</option>
                <option value="Absent">Absent</option>
            </select>

            <button type="submit">Update</button>
        </form>
    </div>
</div>
</body>
</html>
