<?php
include 'db.php';
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    $sql = "UPDATE students SET name='$name', email='$email' WHERE id='$student_id'";

    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Error updating profile: " . $conn->error;
    }
}

$conn->close();
?>
