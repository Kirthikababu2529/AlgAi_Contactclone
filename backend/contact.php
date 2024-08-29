<?php
// Include PHPMailer classes
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\xampp\htdocs\vendor\autoload.php';

// Database configuration
$servername = "localhost"; // Replace with your database server name
$username = "root";        // Replace with your database username
$password = "";            // Replace with your database password
$dbname = "elearning2";    // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $number = $conn->real_escape_string($_POST['number']);
    $message = $conn->real_escape_string($_POST['msg']);

    // Insert data into the contact_us table
    $sql = "INSERT INTO contact_us (Name, Email, Number, Message) VALUES ('$name', '$email', '$number', '$message')";

    if ($conn->query($sql) === TRUE) {
        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host       = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true; // Enable SMTP authentication
            $mail->Username   = 'noreply.algaitechnologies@gmail.com'; // Replace with your Gmail address
            $mail->Password   = 'xtzg vdcx rmky kqlw'; // Replace with your Gmail password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Enable TLS encryption
            $mail->Port       = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('noreply.algaitechnologies@gmail.com', 'AlgAI Technologies'); // Replace with your Gmail address
            $mail->addAddress($email, $name); // Add recipient's email

            // Prepare email subject and message for the user
            $mail->Subject = "Thank you for contacting us!";
            $mail->Body    = "Dear $name,\n\nThank you for reaching out to us! We appreciate your valuable time and have received your message. We’ll get back to you within 24 hours. Meanwhile, feel free to explore Tuli for more enjoyable and fun learning experiences!\n\nBest regards,\nAlgAI Technologies";
            $mail->send(); // Send email to the user

            // Prepare email for the owner
            $mail->clearAddresses(); // Clear previous addresses
            $mail->addAddress('noreply.algaitechnologies@gmail.com', 'AlgAI Technologies'); // Replace with the owner's email

            $mail->Subject = "New Contact Form Submission";
            $mail->Body    = "You have received a new message from the contact form.\n\nName: $name\nEmail: $email\nNumber: $number\nMessage: $message";
            $mail->send(); // Send email to the owner

            echo "Message sent successfully!";
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
