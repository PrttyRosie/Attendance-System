<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email    = $_POST['email'];
    $password = $_POST['password'];
    $role     = 'teacher';
    
    mysqli_query(
        $conn,
        "INSERT INTO users (fullname, username, email, password, role)
         VALUES ('$fullname', '$username', '$email', '$password', '$role')"
        );
    
    header("Location: login.html");
    exit();
}
?>
