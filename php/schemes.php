<?php
include '../config.php'; // Adjust the path if needed

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM schemes";
$result = $conn->query($sql);

$schemes = array();
while ($row = $result->fetch_assoc()) {
    $schemes[] = $row;
}

echo json_encode($schemes);
