<?php
include 'config.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($conn) {
        $query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);

        if (mysqli_num_rows($result) == 1) {
            $_SESSION['email'] = $email;
            header("location: home.php");
        } else {
            $error = "Your Login Name or Password is invalid";
        }
    } else {
        $error = "Database connection failed";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <div class="container">
            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <button type="submit">Login</button>
        </div>
        <?php if (isset($error)) { echo "<p style='color:red;'>$error</p>"; } ?>
    </form>
</body>
</html>
