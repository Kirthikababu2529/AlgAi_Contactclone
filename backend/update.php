<?php
// Include the config file to connect to the database
include('config.php');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $old_pass = trim($_POST['old_pass']);
    $new_pass = trim($_POST['new_pass']);
    $c_pass = trim($_POST['c_pass']);
    $gender = trim($_POST['gender']);
    $dob = trim($_POST['dob']);
    $institute = trim($_POST['institute']);
    $city = trim($_POST['city']);
    $district = trim($_POST['district']);
    $state = trim($_POST['state']);

    // Ensure email is provided
    if (empty($email)) {
        echo "Email is required.";
        exit;
    }

    // Check if the email exists in the database
    $query = "SELECT id, password, profilepic FROM users WHERE email = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password, $old_profile_pic);
        $stmt->fetch();

        // Handle profile picture upload
        $profile_pic = $old_profile_pic;
        if (isset($_FILES['profilepic']) && $_FILES['profilepic']['error'] == 0) {
            $target_dir = "uploads/DP/";

            // Generate a unique file name
            $file_extension = pathinfo($_FILES['profilepic']['name'], PATHINFO_EXTENSION);
            $unique_name = uniqid() . '.' . $file_extension;
            $target_file = $target_dir . $unique_name;

            if (move_uploaded_file($_FILES['profilepic']['tmp_name'], $target_file)) {
                $profile_pic = $target_file;  // Store the path to the new profile picture
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit();
            }
        }

        // Optional password update
        if (!empty($old_pass) && !empty($new_pass) && !empty($c_pass)) {
            // Verify old password
            if ($old_pass === $stored_password) {
                // Ensure new password and confirm password match
                if ($new_pass !== $c_pass) {
                    echo "New password and confirm password do not match.";
                    exit();
                }
                // Update password
                $update_query = "UPDATE users SET name = ?, password = ?,gender=?, dob=?, institution = ?, city = ?, district = ?, state = ?, profilepic = ? WHERE id = ?";
                $update_stmt = $conn->prepare($update_query);
                $update_stmt->bind_param('sssssssssi', $name, $new_pass,$gender,$dob, $institute, $city, $district, $state, $profile_pic, $id);
            } else {
                echo "Old password is incorrect.";
                exit();
            }
        } else {
            // Update without changing the password
            $update_query = "UPDATE users SET name = ?, gender=?, dob=?, institution = ?, city = ?, district = ?, state = ?, profilepic = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_query);
            $update_stmt->bind_param('ssssssssi', $name,$gender,$dob, $institute, $city, $district, $state, $profile_pic, $id);
        }

        if ($update_stmt->execute()) {
            echo "Profile updated successfully.";
            header("Location: /frontend/pages/profile.html");
            exit();
        } else {
            echo "Error updating profile.";
        }
    } else {
        echo "User not found.";
    }
}
?>
