<?php
include('config.php');

$email = $_GET['email'];

$sql = "SELECT firstname, middlename, lastname, designation, qualification, expertise, experience, dob, languagesknown, gender, idcard, telephone1, telephone2, email 
        FROM teacher2 
        WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $teacher = mysqli_fetch_assoc($result);
    echo json_encode($teacher);
} else {
    echo json_encode(["error" => "No teacher found with the provided email"]);
}

mysqli_close($conn);
?>
