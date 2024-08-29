<?php
require_once 'config.php';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch data
$sql = "SELECT classname, classcode, schedule, room_link FROM classroom";
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['classname']}</td>
                <td>{$row['classcode']}</td>
                <td>{$row['schedule']}</td>
                <td><a href=\"{$row['room_link']}\">{$row['room_link']}</a></td>
                <td>
                    <button class='edit-button'>Edit</button>
                    <button class='delete-button'>Delete</button>
                </td>
              </tr>";
    }
} else {
    echo "<tr><td colspan='5'>No data found</td></tr>";
}

$conn->close();
?>
