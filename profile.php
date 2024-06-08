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
    <title>Profile</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Your Profile</h2>
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
            <h3>Update Profile</h3>
            <form method="post" action="update_profile.php">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" value="<?php echo $student['name']; ?>" required>
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $student['email']; ?>" required>
                <button type="submit">Update</button>
            </form>
        </div>
    </div>
</body>
</html>

