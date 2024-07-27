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
    <title>Farmers Portal Home</title>
    <link rel="stylesheet" href="css/styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: white;
            padding: 10px 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 1000; /* Ensures navbar is on top */
        }
        .navbar a {
            text-decoration: none;
            color: black;
            margin: 0 10px;
        }
        .navbar a:hover {
            text-decoration: underline;
        }
        .navbar .logo {
            font-weight: bold;
            font-size: 24px;
        }
        .content {
            position: relative;
            height: 100vh; /* Full viewport height */
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            text-align: center;
            overflow: hidden; /* Prevents overflow */
        }
        .content img {
            width: 100%;
            height: auto;
            position: absolute;
            top: 0;
            left: 0;
            z-index: -1; /* Places the image behind the text and button */
        }
        .text-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 0 20px;
        }
        .text-overlay h1 {
            font-size: 48px;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .text-overlay p {
            font-size: 24px;
            margin-bottom: 30px;
        }
        .text-overlay a {
            display: inline-block;
            padding: 10px 20px;
            background-color: transparent; /* Transparent background */
            color: white; /* White text color */
            border: 2px solid white; /* White border */
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .text-overlay a:hover {
            background-color: rgba(255, 255, 255, 0.2); /* Slight white background on hover */
        }
    </style>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="content">
        <img src="images/image.png" alt="Farmer">
        <div class="text-overlay">
            <h1>AGRI-CLAIM</h1>
            <p>IF YOU EAT TODAY, THANK A FARMER.</p>
            <a href="learn_more.html">Learn More</a>
        </div>
    </div>
</body>
</html>
