<?php
$conn = mysqli_connect("localhost", "root", "", "attendance-system");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
