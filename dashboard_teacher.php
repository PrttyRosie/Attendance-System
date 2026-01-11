<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'teacher') {
    header("Location: login.html");
    exit();
}

include "db.php";

$teacher_id = $_SESSION['user_id'];

// Fetch students
$students = mysqli_query($conn, "SELECT * FROM students");

// Fetch attendance for THIS teacher only
$attendance = mysqli_query(
    $conn,
    "SELECT a.*, s.fullname
     FROM attendance a
     JOIN students s ON a.student_id = s.student_id
     WHERE a.teacher_id = $teacher_id
     ORDER BY a.date_today DESC"
    );
?>

<!DOCTYPE html>
<html>
<head>
<title>Teacher Attendance Dashboard</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="navbar">
    <div class="nav-right">
        <a href="logout.php">Logout</a>
    </div>
</div>

<div class="container">

<h2>Teacher Attendance Dashboard</h2>

<h3>Attendance Records</h3>

<table border="1" cellpadding="8" width="100%">
<tr>
    <th>Student</th>
    <th>Date</th>
    <th>Time In</th>
    <th>Time Out</th>
    <th>Status</th>
    <th>Actions</th>
</tr>

<?php while ($row = mysqli_fetch_assoc($attendance)) { ?>
<tr>
    <td><?= htmlspecialchars($row['fullname']); ?></td>
    <td><?= $row['date_today']; ?></td>
    <td><?= $row['time_in']; ?></td>
    <td><?= $row['time_out'] ?? '---'; ?></td>
    <td><?= $row['remarks']; ?></td>
    <td>
        <a href="attendance_timeout.php?id=<?= $row['attendance_id']; ?>">Timeout</a> |
        <a href="attendance_update.php?id=<?= $row['attendance_id']; ?>">Update</a> |
        <a href="attendance_delete.php?id=<?= $row['attendance_id']; ?>">Delete</a>
    </td>
</tr>
<?php } ?>
</table>

<hr>

<h3>Mark Attendance</h3>

<form action="attendance_mark.php" method="POST">
    <select name="student_id" required>
        <option value="">Select Student</option>
        <?php while ($s = mysqli_fetch_assoc($students)) { ?>
            <option value="<?= $s['student_id']; ?>">
                <?= htmlspecialchars($s['fullname']); ?>
            </option>
        <?php } ?>
    </select>

    <input type="time" name="time_in" >

    <select name="remarks" required>
        <option value="">Status</option>
        <option value="Present">Present</option>
        <option value="Late">Late</option>
        <option value="Absent">Absent</option>
    </select>

    <button type="submit">Save</button>
</form>

<hr>

<h3>Add Student</h3>

<form action="student_add.php" method="POST">
    <input type="text" name="fullname" placeholder="Full Name" required>
    <input type="text" name="student_number" placeholder="Student Number" required>
    <input type="text" name="course" placeholder="Course" required>
    <input type="text" name="year_level" placeholder="Year Level" required>
    <button type="submit">Add Student</button>
</form>

</div>
</body>
</html>
