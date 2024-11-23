<?php
session_start();
include 'db.php'; // Include database connection file

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

// Get matches (for simplicity, this example returns all users except the logged-in user)
$username = $_SESSION['username'];
$sql = "SELECT * FROM users WHERE username != '$username'";
$result = $conn->query($sql);
?>

<h2>Your Matches</h2>
<ul>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<li>" . $row['username'] . " (" . $row['gender'] . ")</li>";
        }
    } else {
        echo "<li>No matches found.</li>";
    }
    ?>
</ul>
<a href="profile.php">Back to Profile</a>
