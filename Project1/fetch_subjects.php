<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root"; // Your database username
$password = "Tiger"; // Your database password
$dbname = "project1"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode([])); // Return an empty JSON array on error
}

$sql = "SELECT id, subject_name FROM subject"; // Adjust the table name if necessary
$result = $conn->query($sql);

$subjects = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $subjects[] = $row; // Add each subject to the array
    }
}

$conn->close();
echo json_encode($subjects); // Return the subjects as a JSON array
?>
