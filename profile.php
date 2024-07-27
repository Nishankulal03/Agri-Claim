<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff0099, #ffcc00);
            color: #f4f4f4; /* Light text color for contrast */
        }
        .profile-container {
            text-align: center;
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 40px auto;
            width: 80%;
            max-width: 600px;
        }
        .profile-container h1 {
            font-size: 32px;
            color: #333;
            margin-bottom: 20px;
        }
        .profile-section {
            background-color: #e9ecef;
            padding: 20px;
            border-radius: 8px;
            margin: 10px 0;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .profile-section p {
            font-size: 18px;
            margin: 10px 0;
            color: #555;
        }
        .profile-section .label {
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="profile-container">
        <h1>Profile</h1>
        <div class="profile-section">
            <p class="label">Name:</p>
            <p><?php echo $_SESSION['user_name']; ?></p>
        </div>
        <div class="profile-section">
            <p class="label">Email:</p>
            <p><?php echo $_SESSION['user_email']; ?></p>
        </div>
    </div>
</body>
</html>
