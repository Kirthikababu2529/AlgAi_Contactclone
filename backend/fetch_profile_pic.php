<?php
// fetch_profile_pic.php
include('config.php');
$email = $_GET['email'];
$default_pic = 'assets/image1.jpg';  // Path to a default image
$profile_pic = $default_pic;  // Default profile picture

// First, try to find the profile picture in the `users` table
$sql = "SELECT profilepic FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);

if ($stmt === false) {
    die("Error preparing statement: " . $conn->error);
}

$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    if (!is_null($row['profilepic'])) {
        $profile_pic = $row['profilepic'];
    }
} else {
    // If not found in the `users` table, try the `teacher2` table
    $stmt->close();

    $sql = "SELECT profileDP FROM teacher2 WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if ($stmt === false) {
        die("Error preparing statement: " . $conn->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (!is_null($row['profileDP'])) {
            $profile_pic = $row['profileDP'];
        }
    }
}

// Output the profile picture URL as JSON
echo json_encode(['profile_pic' => $profile_pic]);

$stmt->close();
$conn->close();

?>
