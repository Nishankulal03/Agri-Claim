<?php
session_start();
include 'config.php';

$signupMessage = '';
$loginMessage = '';

// Signup Process
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['signup'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
    if ($conn->query($sql) === TRUE) {
        $_SESSION['user_id'] = $conn->insert_id;
        $_SESSION['user_name'] = $name;
        $_SESSION['user_email'] = $email;
        $signupMessage = "New account created successfully!";
    } else {
        $signupMessage = "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Login Process
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            header('Location: home.php');
            exit();
        } else {
            $loginMessage = "Invalid password!";
        }
    } else {
        $loginMessage = "No user found with this email!";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmers Portal</title>
    <link rel="stylesheet" href="css/style.css"> <!-- Link to new CSS -->
</head>
<body>
    <div class="wrapper">
        <div class="title">
            Farmers Portal
        </div>
        <form action="index.php" method="POST">
            <div class="field">
                <input type="email" name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <?php if ($loginMessage): ?>
                <div class="message" style="color: red;"><?php echo $loginMessage; ?></div>
            <?php endif; ?>
            <div class="field">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="signup-link">
                Not a member? <a href="#">Signup now</a>
            </div>
        </form>
        
        <form action="index.php" method="POST">
            <div class="field">
                <input type="text" name="name" required>
                <label>Name</label>
            </div>
            <div class="field">
                <input type="email" name="email" required>
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div>
            <?php if ($signupMessage): ?>
                <div class="message" style="color: green;"><?php echo $signupMessage; ?></div>
            <?php endif; ?>
            <div class="field">
                <input type="submit" name="signup" value="Signup">
            </div>
        </form>
    </div>
</body>
</html>
