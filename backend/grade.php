<?php
// Include the config file to connect to the database
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save Student Grade
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $grade = $_POST['grade'];
    $feedback = $_POST['feedback'];

    $sql = "INSERT INTO assessment (studentname, studentid, grade, feedback) 
            VALUES ('$student_name', '$student_id', '$grade', '$feedback')";

    if (mysqli_query($conn, $sql)) {
        echo "Grade saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>