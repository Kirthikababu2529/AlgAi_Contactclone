<?php
// Include the config file to connect to the database
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $report_name = mysqli_real_escape_string($conn, $_POST['report_name']);
    $report_type = mysqli_real_escape_string($conn, $_POST['report_type']);
    $creation_date = mysqli_real_escape_string($conn, $_POST['creation_date']);
    $report_description = mysqli_real_escape_string($conn, $_POST['report_description']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "INSERT INTO analytics (reportname, reporttype, date, description, email) 
            VALUES ('$report_name', '$report_type', '$creation_date', '$report_description', '$email')";

    if (mysqli_query($conn, $sql)) {
        // Redirect back to the referring page
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Close the connection
mysqli_close($conn);
?>
