<?php
// Include the database configuration file
include 'config.php';

// Fetch all blog posts from the database, ordered by the latest first
$query = "SELECT id, title, description, created_at, image_path FROM blogs ORDER BY created_at DESC";
$result = $conn->query($query);

// Prepare an array to hold the blog data
$blogs = [];

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Limit the description to the first 3 lines
        $description = $row['description'];
        $preview_description = implode(' ', array_slice(explode(' ', $description), 0, 30)) . '...';

        $blogs[] = [
            'id' => $row['id'],
            'title' => $row['title'],
            'preview_description' => $preview_description,
            'created_at' => date('F j, Y', strtotime($row['created_at'])),
            'image_path' => $row['image_path'],
            'read_more_link' => "/backend/view_blog_content.php?id=" . $row['id']  // URL for the full blog post
        ];
    }
    // Return the blogs array as JSON
    echo json_encode($blogs);
} else {
    echo json_encode(['error' => 'No blog posts found.']);
}

// Close the database connection
$conn->close();
?>
