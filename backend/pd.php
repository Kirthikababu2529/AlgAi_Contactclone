<?php
// Include the config file to connect to the database
include('config.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $first_name = $_POST['first_name'];
    $middle_name = $_POST['middle_name'];
    $last_name = $_POST['last_name'];
    $highest_qualification = $_POST['highest_qualification'];
    $expertise = $_POST['expertise'];
    $experience = $_POST['experience'];
    $date_of_birth = $_POST['date_of_birth'];
    $languagesknown = $_POST['languages_known'];
    $gender = $_POST['gender'];
    $telephone1 = $_POST['telephone1'];
    $telephone2 = $_POST['telephone2'];
    $email = $_POST['email'];
    $password = $_POST['pass'];
    $c_password = $_POST['c_pass'];

    if (!empty($_FILES['profile_photo']['name'])) {
        $target_dir = "uploads/DP/";
        $profile_photo_name = uniqid() . "_" . basename($_FILES["profile_photo"]["name"]);
        $target_file = $target_dir . $profile_photo_name;

        // Check if the file is an actual image
        $check = getimagesize($_FILES["profile_photo"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["profile_photo"]["tmp_name"], $target_file)) {
            $profile_photo_path = $target_file;
        } else {
            die("Error uploading file.");
        }
    }
    if (!empty($_FILES['id-card']['name'])) {
        $target_dir = "uploads/idcard/";
        $id_card_name = uniqid() . "_" . basename($_FILES["id-card"]["name"]);
        $target_file = $target_dir . $id_card_name;

        // Check if the file is an actual image
        $check = getimagesize($_FILES["id-card"]["tmp_name"]);
        if ($check === false) {
            die("File is not an image.");
        }

        // Move uploaded file to the target directory
        if (move_uploaded_file($_FILES["id-card"]["tmp_name"], $target_file)) {
            $id_card_path = $target_file;
        } else {
            die("Error uploading file.");
        }
    }

    $sql = "SELECT email FROM teacher2 WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 0) {
        // Email does not exist in the database
        die("Enter your email correctly");
    } 
    
    // Check if the passwords match
    if (!empty($password) && !empty($c_password)) {
        if ($password !== $c_password) {
            die("Passwords do not match.");
        }
        // Hash the password before storing it
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    }

    // Construct the SQL UPDATE statement
    $sql = "UPDATE teacher2 
            SET firstname='$first_name', middlename='$middle_name', lastname='$last_name', 
                designation='$designation', qualification='$highest_qualification', expertise='$expertise', 
                experience='$experience', dob='$date_of_birth', languagesknown='$languagesknown', 
                gender='$gender', telephone1='$telephone1', telephone2='$telephone2'";

    // Append password update if it is provided
    if (!empty($hashed_password)) {
        $sql .= ", password='$password'";
    }
    if (isset($profile_photo_path)) {
        $sql .= ", profileDP='$profile_photo_path'";
    }
    if (isset($id_card_path)) {
        $sql .= ", idcard='$id_card_path'";
    }

    // Add the WHERE clause to specify the record to update based on email
    $sql .= " WHERE email='$email'";

    // Execute the query
    if (mysqli_query($conn, $sql)) {
        echo "Teacher information updated successfully";
        header("Location: /frontend/pages/teacherinfo.html");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }

    // Close the connection
    mysqli_close($conn);
}
?>
