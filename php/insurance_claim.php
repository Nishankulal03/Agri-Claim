<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $farmerName = $_POST['farmerName'];
    $rtcNo = $_POST['rtcNo'];
    $cropType = $_POST['cropType'];
    $totalLoss = $_POST['totalLoss'];
    $location = $_POST['location'];
    $complaintBox = $_POST['complaintBox'];
    $latitude = $_POST['latitude'];
    $longitude = $_POST['longitude'];

    $photos = array();
    foreach ($_FILES['photos']['tmp_name'] as $key => $tmp_name) {
        $file_name = $_FILES['photos']['name'][$key];
        $file_tmp = $_FILES['photos']['tmp_name'][$key];

        $upload_dir = "../uploads/";
        $file_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp, $file_path)) {
            $photos[] = $file_name;
        }
    }

    $photos_json = json_encode($photos);

    $sql = "INSERT INTO insurance_claims (farmerName, rtcNo, cropType, totalLoss, location, latitude, longitude, photos, complaintBox) VALUES ('$farmerName', '$rtcNo', '$cropType', '$totalLoss', '$location', '$latitude', '$longitude', '$photos_json', '$complaintBox')";
    if ($conn->query($sql) === TRUE) {
        echo "Complaint registered successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>