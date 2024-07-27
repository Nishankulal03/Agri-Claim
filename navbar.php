<?php
// Start session if not already started
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Set default language if not already set
if (!isset($_SESSION['lang'])) {
    $_SESSION['lang'] = 'english';
}

// Handle language switching
if (isset($_GET['lang'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <title>Website</title>
    <style>
        /* Navbar Styles */
        .navbar {
            padding: 1rem;
        }

        .navbar-brand img {
            max-height: 40px; /* Adjust the height as needed */
        }

        .navbar-nav .nav-link {
            font-size: 16px;
            font-weight: 500;
        }

        .logout-button {
            display: inline-block;
            padding: 8px 15px;
            font-size: 16px;
            font-weight: bold;
            color: #fff;
            background-color: #28a745; /* Green color */
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .logout-button:hover {
            background-color: #dc3545; /* Red on hover */
            color: #fff;
        }

        .dropdown-menu a {
            color: #000; /* Text color for dropdown items */
        }

        .dropdown-menu a:hover {
            background-color: #f8f9fa; /* Light background on hover */
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
        <a class="navbar-brand" href="#">
            <img src="images/2.png" alt="Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="home.php"><?php echo ($_SESSION['lang'] == 'kannada') ? 'ಮುಖಪುಟ' : 'Home'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="scheme.php"><?php echo ($_SESSION['lang'] == 'kannada') ? 'ಯೋಜನೆ' : 'Scheme'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="loan_calculator.php"><?php echo ($_SESSION['lang'] == 'kannada') ? 'ಸಾಲದ ಕ್ಯಾಲ್ಕುಲೇಟರ್' : 'Loan Calculator'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="insurance_claim.php"><?php echo ($_SESSION['lang'] == 'kannada') ? 'ವಿಮಾ ಹಕ್ಕು' : 'Insurance Claim'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="profile.php"><?php echo ($_SESSION['lang'] == 'kannada') ? 'ಪ್ರೊಫೈಲ್' : 'Profile'; ?></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link logout-button" href="logout.php"><?php echo ($_SESSION['lang'] == 'kannada') ? 'ಲಾಗ್ಔಟ್' : 'Logout'; ?></a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <?php echo ($_SESSION['lang'] == 'kannada') ? 'ಭಾಷೆ' : 'Language'; ?>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languageDropdown">
                        <a class="dropdown-item" href="?lang=english">English</a>
                        <a class="dropdown-item" href="?lang=kannada">ಕನ್ನಡ</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Include Bootstrap JavaScript and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
