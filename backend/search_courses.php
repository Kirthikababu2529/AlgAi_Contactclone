<?php
// Include the configuration file
require_once 'config.php';

// Set headers to allow cross-origin requests (if needed)
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

try {
    // Connect to the database
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Get search query parameters
    $search = isset($_GET['search_box']) ? $_GET['search_box'] : '';

    // Fetch course data from the database based on search query
    $stmt = $conn->prepare("SELECT subjectname, price, weekdays, email FROM coursemmt WHERE subjectname LIKE :search");
    $stmt->execute(['search' => "%$search%"]);
    $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Prepare a statement to fetch tutor names
    $tutorStmt = $conn->prepare("SELECT firstname, middlename, lastname FROM teacher2 WHERE email = :email");

    foreach ($courses as &$course) {
        $tutorStmt->execute(['email' => $course['email']]);
        $tutor = $tutorStmt->fetch(PDO::FETCH_ASSOC);
        $course['tutor_name'] = $tutor ? $tutor['firstname'] . ' ' . $tutor['middlename'] . ' ' . $tutor['lastname'] : 'N/A';
    }

    // Output the data as JSON
    echo json_encode($courses);

} catch(PDOException $e) {
    echo json_encode(array('error' => $e->getMessage()));
}

// Close the connection
$conn = null;
?>
