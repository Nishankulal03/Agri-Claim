<?php
include 'config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header('Location: ../login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include '../navbar.php'; ?>
    <div class="container mt-5">
        <h1>Profile</h1>
        <div>
            <p><strong>Name:</strong> <?php echo $_SESSION['user_name']; ?></p>
            <p><strong>Email:</strong> <?php echo $_SESSION['user_email']; ?></p>
        </div>
    </div>
</body>
</html>
