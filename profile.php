<?php
session_start();
include 'db.php'; // Include database connection file

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

// Get user information
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "User not found.";
}
?>

<h2>Profile of <?php echo $user['username']; ?></h2>
<p>Email: <?php echo $user['email']; ?></p>
<p>Gender: <?php echo $user['gender']; ?></p>
<p>Bio: <?php echo $user['bio']; ?></p>
<p>Date of Birth: <?php echo $user['date_of_birth']; ?></p>
<a href="logout.php">Logout</a>
