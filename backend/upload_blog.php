<?php
// Include the database configuration file
include 'config.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $created_at = date('Y-m-d H:i:s'); // Current timestamp

    // Handle file upload
    $image_path = null;
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir = "uploads/blogs/";
        $file_extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $unique_name = uniqid() . '.' . $file_extension;
        $target_file = $target_dir . $unique_name;

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image_path = $target_file; // Store only the file name
        } else {
            echo "Sorry, there was an error uploading your file.";
            exit();
        }
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO blogs (title, description, created_at, image_path) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $title, $description, $created_at, $image_path);

    // Execute the statement
    if ($stmt->execute()) {
        echo "Blog post uploaded successfully.";
        header("Location: /frontend/pages/teacherinfo.html"); // Redirect to the blogs view page
        exit();
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
