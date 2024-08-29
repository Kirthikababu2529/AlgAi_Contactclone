<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $subjectname = $_POST['course-name'];
    $subjectcode = $_POST['course-code'];
    $dept = $_POST['department'];
    $startdate = $_POST['start-date'];
    $enddate = $_POST['end-date'];
    $price = $_POST['price'];
    $subjectdesc = $_POST['course-description'];
    $weekdays = $_POST['selected-days'];
    $email = $_POST['email'];

    // Validation (basic example, you may need more validation)
    if (!empty($subjectname) && !empty($subjectcode) && !empty($dept) && !empty($startdate) && !empty($enddate) && !empty($price) && !empty($subjectdesc) && !empty($weekdays)) {
        $sql = "INSERT INTO courseman (subjectname, subjectcode, dept, startdate, enddate, price, subjectdesc, weekdays,email) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?,'$email')";
        
        // Prepare statement
        $stmt = $conn->prepare($sql);
        
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }

        // Bind parameters
        $stmt->bind_param('ssssssss', $subjectname, $subjectcode, $dept, $startdate, $enddate, $price, $subjectdesc, $weekdays);

        // Execute the statement
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . htmlspecialchars($stmt->error);
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "All fields are required.";
    }

    // Close the connection
    $conn->close();
}
?>
