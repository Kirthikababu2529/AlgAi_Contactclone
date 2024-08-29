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

    // Prepare the SQL query with multiple search conditions
    $stmt = $conn->prepare("
        SELECT 
            CONCAT(t.firstname, ' ', t.middlename, ' ', t.lastname) AS name, 
            t.expertise AS subjects, 
            COUNT(r.student_email) as total_students,
            AVG(r.rating) as average_rating,
            t.experience, 
            t.languagesknown 
        FROM teacher2 t
        LEFT JOIN ratings r 
        ON t.email = r.teacher_email 
        WHERE CONCAT(t.firstname, ' ', t.middlename, ' ', t.lastname) LIKE :search 
           OR t.expertise LIKE :search 
           OR t.experience LIKE :search 
           OR t.languagesknown LIKE :search
        GROUP BY t.email
    ");
    $stmt->execute(['search' => "%$search%"]);
    $tutors = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Round the average rating to one decimal place
    foreach ($tutors as &$tutor) {
        $tutor['average_rating'] = round($tutor['average_rating'], 1);
    }

    // Output the data as JSON
    echo json_encode($tutors);

} catch(PDOException $e) {
    echo json_encode(array('error' => $e->getMessage()));
}

// Close the connection
$conn = null;
?>
