<?php
// Include the config file to connect to the database
include('config.php');

// Fetch data from the database, including the average rating and count of students who rated each teacher
$query = "
    SELECT 
        t.firstname, 
        t.middlename, 
        t.lastname, 
        t.expertise, 
        t.experience, 
        t.languagesknown, 
        t.email,
        COUNT(r.student_email) as total_students,
        AVG(r.rating) as average_rating
    FROM 
        teacher2 t
    LEFT JOIN 
        ratings r 
    ON 
        t.email = r.teacher_email 
    GROUP BY 
        t.email
";

$result = mysqli_query($conn, $query);

$teachers = [];
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        // Concatenate the name fields
        $name = $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'];
        // Map the DB columns to frontend field names
        $teachers[] = [
            'name' => $name,
            'subjects' => $row['expertise'],
            'experience' => $row['experience'],
            'languagesknown' => $row['languagesknown'],
            'email' => $row['email'],
            'total_students' => $row['total_students'],
            'average_rating' => round($row['average_rating'], 1) // Round to 1 decimal place
        ];
    }
}

// Close the connection
mysqli_close($conn);

// Output the data as HTML
foreach ($teachers as $teacher) {
    echo "
        <div class='box'>
            <div class='tutor'>
                <img src='images/pic-1.jpg' alt=''>
                <div>
                    <h3>{$teacher['name']}</h3>
                    <span>{$teacher['subjects']}</span>
                </div>
            </div>
            <p>total students : <span>{$teacher['total_students']}</span></p>
            <p>total experience : <span>{$teacher['experience']}</span></p>
            <p>speaks : <span>{$teacher['languagesknown']}</span></p>
            <p>average rating : <span>{$teacher['average_rating']}</span></p>
            <button class='inline-btn' onclick='showProfile(this)'>View Profile</button>
            <button class='inline-btn' onclick='showRating(this, \"{$teacher['email']}\")'>Give Rate</button>
        </div>
    ";
}
?>
