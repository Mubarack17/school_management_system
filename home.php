<?php
include 'db.php';
session_start();

if (!isset($_SESSION['student_id'])) {
    header("Location: login.php");
    exit();
}

$student_id = $_SESSION['student_id'];

$sql = "SELECT * FROM students WHERE id='$student_id'";
$result = $conn->query($sql);
$student = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Dashboard</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo $student['name']; ?>!</h2>
        <nav>
            <ul>
                <li><a href="home.php">Dashboard</a></li>
                <li><a href="profile.php">Profile</a></li>
                <li><a href="results.php">Results</a></li>
                <li><a href="assignments.php">Assignments</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
        <div class="content">
            <h3>Dashboard</h3>
            <p>Welcome to your student dashboard. Use the navigation menu to access different sections.</p>
        </div>
    </div>
</body>
</html>
