<?php
// Include your database connection file
include('config.php');

$email = $_GET['email'];

// Prepare the SQL statement to fetch user details except for the password
$sql = "SELECT name, email, gender, dob, institution, city, district, state, profilepic FROM users WHERE email = ?";
$stmt = $conn->prepare($sql);

// Bind the email parameter to the statement
$stmt->bind_param('s', $email);

// Execute the query
$stmt->execute();

// Get the result
$result = $stmt->get_result();

// Check if user data was found
if ($result->num_rows > 0) {
    // Fetch the user data as an associative array
    $user_data = $result->fetch_assoc();

    // Return the user data as JSON
    echo json_encode($user_data);
} else {
    // Handle cases where no user data is found
    echo json_encode(['error' => 'No user data found']);
}

// Close the statement and connection
$stmt->close();
$conn->close();
?>
