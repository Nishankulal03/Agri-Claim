<?php
session_start();
include '../config.php';

if (!isset($_SESSION['admin_id'])) {
    header('Location: login.php');
    exit();
}

$sql = "SELECT * FROM insurance_claims";
$result = $conn->query($sql);

$complaints = array();
while ($row = $result->fetch_assoc()) {
    $complaints[] = $row;
}

$sql = "SELECT * FROM schemes";
$scheme_result = $conn->query($sql);

$schemes = array();
while ($row = $scheme_result->fetch_assoc()) {
    $schemes[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0f2f5;
            margin: 0;
            padding: 20px;
            color: #333;
        }
        h1, h2 {
            color: #444;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
            font-weight: bold;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        .map-container {
            width: 150px;
            height: 100px;
        }
        .map-container iframe {
            width: 100%;
            height: 100%;
            border: none;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-bottom: 30px;
        }
        form div {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            background-color: #28a745;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #218838;
        }
        a {
            color: #dc3545;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
    <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
</head>
<body>
    <h1>Admin Dashboard</h1>

    <h2>Registered Complaints</h2>

    <table>
        <thead>
            <tr>
                <th>Farmer Name</th>
                <th>RTC No</th>
                <th>Crop Type</th>
                <th>Total Loss</th>
                <th>Location</th>
                <th>Photos</th>
                <th>Complaint Box</th>
                <th>Map</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($complaints as $complaint): ?>
            <tr>
                <td><?php echo htmlspecialchars($complaint['farmerName']); ?></td>
                <td><?php echo htmlspecialchars($complaint['rtcNo']); ?></td>
                <td><?php echo htmlspecialchars($complaint['cropType']); ?></td>
                <td><?php echo htmlspecialchars($complaint['totalLoss']); ?></td>
                <td><?php echo htmlspecialchars($complaint['location']); ?></td>
                <td>
                    <?php
                    $photos = json_decode($complaint['photos']);
                    foreach ($photos as $photo) {
                        echo "<img src='../uploads/$photo' width='50' />";
                    }
                    ?>
                </td>
                <td><?php echo htmlspecialchars($complaint['complaintBox']); ?></td>
                <td>
                    <div class="map-container">
                        <?php
                        $latitude = $complaint['latitude'];
                        $longitude = $complaint['longitude'];
                        ?>
                        <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=<?php echo ($longitude - 0.01); ?>%2C<?php echo ($latitude - 0.01); ?>%2C<?php echo ($longitude + 0.01); ?>%2C<?php echo ($latitude + 0.01); ?>&amp;layer=mapnik" scrolling="no"></iframe>
                    </div>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <h2>Manage Schemes</h2>
    <form action="manage_schemes.php" method="POST">
        <div>
            <label for="schemeName">Scheme Name:</label>
            <input type="text" id="schemeName" name="schemeName" required>
        </div>
        <div>
            <label for="schemeDescription">Scheme Description:</label>
            <textarea id="schemeDescription" name="schemeDescription" required></textarea>
        </div>
        <button type="submit">Add Scheme</button>
    </form>

    <h2>Existing Schemes</h2>
    <table>
        <thead>
            <tr>
                <th>Scheme Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($schemes as $scheme): ?>
            <tr>
                <td><?php echo htmlspecialchars($scheme['name']); ?></td>
                <td><?php echo htmlspecialchars($scheme['description']); ?></td>
                <td>
                    <a href="delete_scheme.php?id=<?php echo $scheme['id']; ?>">Delete</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
