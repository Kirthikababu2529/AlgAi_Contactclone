<?php
// Include database configuration file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $c_password = $_POST['c_pass'];
    $profile = $_POST['profile'];

    // Check if passwords match
    if ($password !== $c_password) {
        die("Passwords do not match.");
    }

    $profile_pic = null; // Initialize profile_pic variable

    if (isset($_FILES['profilepic']) && $_FILES['profilepic']['error'] == 0) {
        $target_dir = "uploads/DP/";

        // Generate a unique file name
        $file_extension = pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION);
        $unique_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $unique_name;

        if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $target_file)) {
            $profile_pic = $target_file ;  // Store only the file name, not the full path
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    // Prepare and bind
    if ($profile === 'teacher') {
        $stmt = $conn->prepare("INSERT INTO teacher2 (firstname, email, password, profile, profileDP) VALUES (?, ?, ?, ?, ?)");
    } else {
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, profile, profilepic) VALUES (?, ?, ?, ?, ?)");
    }
    if ($profile === 'teacher') {
        $stmt->bind_param("sssss", $name, $email, $password, $profile, $profile_pic);
    } else {
        $stmt->bind_param("sssss", $name, $email, $password, $profile, $profile_pic);
    }

    // Execute the statement
    if ($stmt->execute()) {
        echo "New record created successfully";
        if ($profile === 'teacher') {
            header("Location: /frontend/pages/teacherlogin.html");
        } else {
            header("Location: /frontend/pages/student_login.html");
        }
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
