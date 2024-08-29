<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('config.php');

// Get the email from the query string
$email = $_GET['email'];
$default_profile = 'student';  // Default role

$profile = $default_profile;  // Initialize profile with the default role

// First, try to find the profile in the `users` table
$sql = "SELECT profile FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $profile = $row['profile'] ?? $default_profile;
} else {
    // If not found in the `users` table, try the `teacher2` table
    $stmt->close();

    $sql = "SELECT profile FROM teacher2 WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $profile = $row['profile'] ?? $default_profile;
    }
}

// Output the profile role
echo $profile;

$stmt->close();
$conn->close();
?>
