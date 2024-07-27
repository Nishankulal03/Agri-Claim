<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $schemeName = $_POST['schemeName'];
    $schemeDescription = $_POST['schemeDescription'];

    $sql = "INSERT INTO schemes (name, description) VALUES ('$schemeName', '$schemeDescription')";
    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>
