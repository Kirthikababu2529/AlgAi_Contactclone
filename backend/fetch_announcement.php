<?php
include 'config.php';

$email = $_GET['email'];

$sql = "SELECT announcement FROM classroom WHERE email = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->bind_result($announcement);
$stmt->fetch();

echo $announcement ? $announcement : "No announcement available.";

$stmt->close();
$conn->close();
?>
