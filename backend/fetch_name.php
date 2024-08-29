<?php
include('config.php');
$email = $_GET['email'];

// First, try to find the user's name in the `users` table
$sql = "SELECT name FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

$name = 'Unknown';  // Default name

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $name = $row['name'] ?? 'Unknown';  // Use the name if found, else keep it as 'Unknown'
} else {
    // If not found in the `users` table, try the `teacher2` table
    $stmt->close();
    
    $sql = "SELECT CONCAT_WS(' ', firstname, middlename, lastname) AS full_name FROM teacher2 WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['full_name'] ?? 'Unknown';  // Use the name if found, else keep it as 'Unknown'
    }
}

// Output the name
echo $name;

$stmt->close();
$conn->close();
?>
