<?php
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'myblog_db';

// Create a new mysqli instance
$mysqli = new mysqli($hostname, $username, $password, $database);

// Check for connection errors
if ($mysqli->connect_error) {
    die('Connect Error (' . $mysqli->connect_errno . ') ' . $mysqli->connect_error);
}

// Prepare the SQL statement
$sql = "SELECT * FROM tbl_subscribe";
$result = $mysqli->query($sql);

// Check for errors during execution
if (!$result) {
    die('Error: ' . $mysqli->error);
}

// Count the number of rows
$row_count = $result->num_rows;

// Close the database connection
$mysqli->close();

// Return the row count as JSON response
header('Content-Type: application/json');
echo json_encode(['count' => $row_count]);
?>
