<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save Class
    if (isset($_POST['class-name'], $_POST['class-code'], $_POST['schedule'], $_POST['class-description'], $_POST['email'])) {
        $class_name = $_POST['class-name'];
        $class_code = $_POST['class-code'];
        $schedule = $_POST['schedule'];
        $class_desc = $_POST['class-description'];
        $email = $_POST['email'];
        $lastRoomLink = $_POST['lastRoomLink'];

        // Check for unique class code
        $check_query = "SELECT * FROM classroom WHERE classcode='$class_code'";
        $result = $conn->query($check_query);
        
        if ($result->num_rows > 0) {
            echo "Class code must be unique!";
        } else {
            $sql = "INSERT INTO classroom (classname, classcode, schedule, classdesc, email, sessionlink) VALUES ('$class_name', '$class_code', '$schedule', '$class_desc', '$email', '$lastRoomLink')";
            
            if ($conn->query($sql) === TRUE) {
                echo "New class created successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        echo "All class fields are required.";
    }

    // Upload Material
    if (isset($_FILES['material-file']) && isset($_POST['material-title'])) {
        $material_title = $_POST['material-title'];
        $material_file = $_FILES['material-file']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($material_file);
        
        if (move_uploaded_file($_FILES['material-file']['tmp_name'], $target_file)) {
            $sql = "UPDATE classroom SET classmaterial='$target_file' WHERE classcode='$class_code'";
            
            if ($conn->query($sql) === TRUE) {
                echo "Material uploaded successfully";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Post Announcement
    if (isset($_POST['announcement-title']) && isset($_POST['announcement-content'])) {
        $announcement_title = $_POST['announcement-title'];
        $announcement_content = $_POST['announcement-content'];
        
        $sql = "UPDATE classroom SET announcement='$announcement_title', content='$announcement_content' WHERE classcode='$class_code'";
        
        if ($conn->query($sql) === TRUE) {
            echo "Announcement posted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();
?>