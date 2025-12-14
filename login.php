<?php
include "db.php";
session_start();

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    
    if ($result && mysqli_num_rows($result) == 1) {
        
        $row = mysqli_fetch_assoc($result);
        
        // Save session
        $_SESSION['user_id'] = $row['id'];
        $_SESSION['role']    = $row['role'];
        
        // Redirect based on role
        if ($row['role'] === 'teacher') {
            header("Location: dashboard_teacher.php");
            exit();
        } else if ($row['role'] === 'student') {
            header("Location: dashboard_student.php");
            exit();
        } else {
            echo "Invalid role in database!";
        }
        
    } else {
        echo "Invalid login! <a href='login.html'>Try Again</a>";
    }
    
} else {
    // If user opens login.php directly, redirect to login form
    header("Location: login.html");
    exit();
}
?>
