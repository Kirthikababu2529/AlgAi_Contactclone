<?php
// Include database configuration file
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if email and password are not empty
    if (empty($email) || empty($password)) {
        echo "Email and password are required.";
        exit();
    }

    // Prepare and bind
    $stmt = $conn->prepare("SELECT id, password FROM teacher2 WHERE email = ?");
    if (!$stmt) {
        die("Prepare failed: " . $conn->error);
    }
    
    $stmt->bind_param("s", $email);

    // Execute the statement
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }
    
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $stored_password);
        $stmt->fetch();

        // Debugging: Echo retrieved password
        echo "Stored password: " . $stored_password . "<br>";
        echo "Entered password: " . $password . "<br>";

        // Verify the password
        if ($password === $stored_password) {
            // Start session and set session variables
            session_start();
            $_SESSION['id'] = $id;
            //$_SESSION['name'] = $name;
           // $_SESSION['profile'] = $profile;

            // Redirect to profile page
            header("Location: /frontend/pages/teacherinfo.html");
            exit();
        } else {
            echo "Invalid password.";
        }
    } else {
        echo "No user found with that email address.";
    }

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
