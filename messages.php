<?php
session_start();
include 'db.php'; // Include database connection file

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php"); // Redirect to login if not logged in
    exit;
}

// Get messages (for simplicity, this example will be hardcoded)
$messages = [
    ["from" => "Alice", "message" => "Hey, how are you?"],
    ["from" => "Bob", "message" => "Let's meet up this weekend!"]
];
?>

<h2>Your Messages</h2>
<ul>
    <?php
    foreach ($messages as $msg) {
        echo "<li><strong>" . $msg['from'] . ":</strong> " . $msg['message'] . "</li>";
    }
    ?>
</ul>
<a href="profile.php">Back to Profile</a>
