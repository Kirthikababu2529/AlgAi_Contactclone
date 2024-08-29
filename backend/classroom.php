<?php
include 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save Class
    if (isset($_POST['class-name']) && isset($_POST['email']) && isset($_POST['class-code']) && isset($_POST['schedule']) && isset($_POST['class-description']) ) {
        $class_name = $_POST['class-name'];
        $class_code = $_POST['class-code'];
        $schedule = $_POST['schedule'];
        $class_desc = $_POST['class-description'];
        $lastRoomLink = $_POST['lastRoomLinkInput']; 
        $email = $_POST['email'];

        // Check for unique class code
        $check_query = "SELECT * FROM classroom WHERE classcode='$class_code'";
        $result = $conn->query($check_query);
        
        if ($result->num_rows > 0) {
            echo "Class code must be unique!";
        } else {
            $sql = "INSERT INTO classroom (classname, classcode, schedule, classdesc,email, room_link)
        VALUES ('$class_name', '$class_code', '$schedule', '$class_desc', '$email','$lastRoomLink')";
            
            if ($conn->query($sql) === TRUE) {
                header("Location: /frontend/pages/clm.html");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
    }

    // Upload Material
    if (isset($_FILES['material-file']) && isset($_POST['material-title']) && isset($_POST['email'])) {
        $material_title = $_POST['material-title'];
        $material_file = $_FILES['material-file']['name'];
        $email = $_POST['email'];
        $target_dir = "uploads/Materials/";
        $target_file = $target_dir . basename($material_file);
        
        if (move_uploaded_file($_FILES['material-file']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO classroom (classmaterial,email) VALUES ('$target_file', '$email')";
            
            if ($conn->query($sql) === TRUE) {
                header("Location: /frontend/pages/clm.html");
                exit();
                
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // Post Announcement
    if (isset($_POST['announcement-title']) && isset($_POST['announcement-content']) && isset($_POST['email'])) {
        $announcement_title = $_POST['announcement-title'];
        $email = $_POST['email'];
        $announcement_content = $_POST['announcement-content'];
        
        $sql = "INSERT INTO classroom (announcement, content, email) VALUES ('$announcement_title', '$announcement_content', '$email')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Announcement posted successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}

$conn->close();

?>