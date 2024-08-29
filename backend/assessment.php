<?php
// Include the config file to connect to the database
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Save Assessment
    $assessment_name = $_POST['assessment_name'];
    $assessment_type = $_POST['assessment_type'];
    $assessment_date = $_POST['assessment_date'];
    $total_marks = $_POST['total_marks'];
    $assessment_description = $_POST['assessment_description'];
    $student_name = $_POST['student_name'];
    $student_id = $_POST['student_id'];
    $grade = $_POST['grade'];
    $feedback = $_POST['feedback'];
    $email = $_POST['email'];


    $sql = "INSERT INTO assessment (assessmentname, assessmenttype, date, totalmarks, description,studentname, studentid, grade, feedback, email) 
            VALUES ('$assessment_name', '$assessment_type', '$assessment_date', '$total_marks', '$assessment_description','$student_name','$student_id','$grade','$feedback','$email')";

    if (mysqli_query($conn, $sql)) {
        echo "New assessment created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>