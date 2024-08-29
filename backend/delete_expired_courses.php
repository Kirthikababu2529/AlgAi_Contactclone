<?php
include 'config.php';

// Function to delete expired courses
function deleteExpiredCourses($conn) {
    // Get current date
    $currentDate = date('Y-m-d'); // Change the format if needed

    // Select courses with dates earlier than the current date
    $sql = "SELECT * FROM coursemmt WHERE enddate < ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $currentDate);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if there are rows to delete
    if ($result->num_rows > 0) {
        // Delete the expired courses
        $deleteSql = "DELETE FROM coursemmt WHERE enddate < ?";
        $deleteStmt = $conn->prepare($deleteSql);
        $deleteStmt->bind_param('s', $currentDate);
        $deleteStmt->execute();

        echo "Expired courses deleted successfully.";
    } else {
        echo "No expired courses found.";
    }

    $stmt->close();
    $conn->close();
}

// Call the function to delete expired courses
deleteExpiredCourses($conn);
?>
