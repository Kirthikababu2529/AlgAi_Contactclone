<?php
// Include the config file to connect to the database
include('config.php');

// Fetch data from the database
$query = "SELECT firstname, middlename, lastname, expertise, experience, languagesknown, email, total_students, average_rating, profileDP FROM teacher2";
$result = mysqli_query($conn, $query);

$teachers = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Concatenate the name fields
        $row['name'] = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
        // Map the DB columns to frontend field names
        $teachers[] = [
            'name' => $row['name'],
            'subjects' => $row['expertise'],
            'experience' => $row['experience'],
            'languagesknown' => $row['languagesknown'],
            'email' => $row['email'],
            'total_students' => $row['total_students'],
            'average_rating' => round($row['average_rating'], 1),
            'profileDP' => $row['profileDP'],
        ];
    }
}

// Close the connection
mysqli_close($conn);

// Output the data as JSON
header('Content-Type: application/json');
echo json_encode($teachers);
?>