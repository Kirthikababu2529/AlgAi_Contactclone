<?php
include 'config.php'; // Include your database configuration file

$email = $_POST['email'] ?? '';

if (!$email) {
    echo 'No email provided';
    exit;
}

// Debug statement
error_log("Received email: " . $email);

// Prepare and execute the SQL statement
$stmt = $conn->prepare('SELECT email FROM teacher2 WHERE email = ?');
if ($stmt === false) {
    error_log('Prepare failed: ' . htmlspecialchars($conn->error));
    echo 'Database error';
    exit;
}

$stmt->bind_param('s', $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    // Email found in the database
    echo 'success';
} else {
    // Email not found in the database
    echo 'Email not found';
}

$stmt->close();
$conn->close();
?>
