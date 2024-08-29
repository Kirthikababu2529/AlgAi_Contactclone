<?php
$servername = "localhost";
$username = "root"; // Update with your MySQL username
$password = ""; // Update with your MySQL password
$dbname = "elearning2";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $conn->real_escape_string($_POST['Name']);
    $email_address = $conn->real_escape_string($_POST['email_address']);
    $grade = $conn->real_escape_string($_POST['grade']);
    $enjoy_subjects = $conn->real_escape_string($_POST['enjoy_subjects']);
    $hobbies_activities = $conn->real_escape_string($_POST['hobbies_activities']);
    $clubs_groups = $conn->real_escape_string($_POST['clubs_groups']);
    $interest_activities = $conn->real_escape_string($_POST['interest_activities']);
    $learning_enjoyment = $conn->real_escape_string($_POST['learning_enjoyment']);
    $confident_subjects = $conn->real_escape_string($_POST['confident_subjects']);
    $skills_strengths = $conn->real_escape_string($_POST['skills_strengths']);
    $improve_skills = $conn->real_escape_string($_POST['improve_skills']);
    $new_skills = $conn->real_escape_string($_POST['new_skills']);
    $academic_goals = $conn->real_escape_string($_POST['academic_goals']);
    $career_goals = $conn->real_escape_string($_POST['career_goals']);
    $career_interest = $conn->real_escape_string($_POST['career_interest']);
    $aspire = $conn->real_escape_string($_POST['aspire']);
    $career_guidance = $conn->real_escape_string($_POST['career_guidance']);
    $preferred_courses = $conn->real_escape_string($_POST['preferred_courses']);
    $learning_format = $conn->real_escape_string($_POST['learning_format']);
    $challenging_subjects = $conn->real_escape_string($_POST['challenging_subjects']);
    $support = $conn->real_escape_string($_POST['support']);
    $expectations = $conn->real_escape_string($_POST['expectations']);

    $sql = "INSERT INTO student_course_recommendation_form (
                name, email_address, grade, enjoy_subjects, hobbies_activities, clubs_groups, interest_activities, learning_enjoyment,
                confident_subjects, skills_strengths, improve_skills, new_skills, academic_goals, career_goals, career_interest, aspire,
                career_guidance, preferred_courses, learning_format, challenging_subjects, support, expectations
            ) VALUES (
                '$name', '$email_address', '$grade', '$enjoy_subjects', '$hobbies_activities', '$clubs_groups', '$interest_activities', '$learning_enjoyment',
                '$confident_subjects', '$skills_strengths', '$improve_skills', '$new_skills', '$academic_goals', '$career_goals', '$career_interest', '$aspire',
                '$career_guidance', '$preferred_courses', '$learning_format', '$challenging_subjects', '$support', '$expectations'
            )";

    if ($conn->query($sql) === TRUE) {
        echo "Form submitted successfully!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
