<?php
include('config.php');

// Get JSON input data
$input = file_get_contents('php://input');
$data = json_decode($input, true);

if (!isset($data['student_email']) || !isset($data['teacher_email']) || !isset($data['rating'])) {
    // Handle case where required data is missing
    $response = [
        'success' => false,
        'message' => 'Missing required data.'
    ];
} else {
    $student_email = $data['student_email'];
    $teacher_email = $data['teacher_email'];
    $rating = $data['rating'];

    // Insert rating into database
    $query = "INSERT INTO ratings (student_email, teacher_email, rating) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssi", $student_email, $teacher_email, $rating);

    $response = [];

    if ($stmt->execute()) {
        $response['success'] = true;
        $response['message'] = 'Rating submitted successfully.';
    } else {
        $response['success'] = false;
        $response['message'] = 'Failed to submit rating.';
    }

    $stmt->close();
}

// Close connection
$conn->close();

// Output response as JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
