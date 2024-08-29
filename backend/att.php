<?php
// Include the config file to connect to the database
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $class = $_POST['class'];
    $date = $_POST['date'];
    $email = $_POST['email']; 
 
    // Loop through all the students and save their attendance status
    foreach ($_POST['students'] as $student_id => $attendance_status) {
        $student_name = $_POST['student_names'][$student_id];
        $present = ($attendance_status == 'present') ? 1 : 0;
        $absent = ($attendance_status == 'absent') ? 1 : 0;
        $late = ($attendance_status == 'late') ? 1 : 0;

        $sql = "INSERT INTO attendance (class, date, studentname, studentid, present, absent, late, email) 
                VALUES ('$class', '$date', '$student_name', '$student_id', '$present', '$absent', '$late', '$email')";

        if (!mysqli_query($conn, $sql)) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    echo "Attendance saved successfully";
}

// Close the connection
mysqli_close($conn);
?>
