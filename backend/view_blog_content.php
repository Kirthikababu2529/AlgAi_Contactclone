<?php
// Include the database configuration file
include 'config.php';

// Check if 'id' parameter is set in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    
    // Prepare the SQL query to fetch the blog post by ID
    $query = "SELECT id, title, description, created_at, image_path FROM blogs WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id);
    
    // Execute the query
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $blog = $result->fetch_assoc();
        
        // Display the blog post
        echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>' . htmlspecialchars($blog['title']) . '</title>
<style>
.custom-btn {
  width: 110px;
  height: 40px;
  color: white;
  border-radius: 5px;
  padding: 10px 25px;
  font-family: "Lato", sans-serif;
  font-weight: 500;
  background: transparent;
  cursor: pointer;
  -webkit-transition: all 0.3s ease;
  transition: all 0.3s ease;
  position: relative;
  display: inline-block;
  -webkit-box-shadow: inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
          box-shadow: inset 2px 2px 2px 0px rgba(255,255,255,.5),
   7px 7px 20px 0px rgba(0,0,0,.1),
   4px 4px 5px 0px rgba(0,0,0,.1);
  outline: none;
  font-size: 15px;
}

.btn-2 {
  background: #004dff;
  background: -webkit-gradient(linear, left bottom, left top, from(#004dff), to(#004dff));
  background: linear-gradient(0deg, #004dff 0%, #004dff 100%);
  border: none;
}

.btn-2:before {
  height: 0%;
  width: 5px;
}

.btn-2:hover {
  -webkit-box-shadow: 4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .5), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
          box-shadow: 4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .5), 
    inset -4px -4px 6px 0 rgba(255,255,255,.2),
    inset 4px 4px 6px 0 rgba(0, 0, 0, .4);
}

</style>

        </head>
        
        <body>
            <h1>' . htmlspecialchars($blog['title']) . '</h1>
            <img src="' . htmlspecialchars($blog['image_path']) . '" alt="Blog Image" style="width:50%; max-height:300px; object-fit:cover;">
            <p><small>Posted on: ' . htmlspecialchars(date('F j, Y', strtotime($blog['created_at']))) . '</small></p>
            <p>' . nl2br(htmlspecialchars($blog['description'])) . '</p>
            <a href="/frontend/pages/blogs.html"><button class="custom-btn btn-2">Back</button></a>


        </body>
        </html>';
    } else {
        echo '<p>Blog post not found.</p>';
    }
    
    // Close the statement and connection
    $stmt->close();
} else {
    echo '<p>Invalid blog ID.</p>';
}

$conn->close();
?>
