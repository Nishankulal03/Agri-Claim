<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schemes</title>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <link rel="stylesheet" href="css/styles.css"> <!-- Include your main stylesheet here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff0099, #ffcc00);
            color: #333;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        h1 {
            text-align: center;
            margin-bottom: 30px;
            color: black; /* Main color */
        }
        #schemes {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            justify-content: center;
        }
        .scheme {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 300px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .scheme h3 {
            margin: 0 0 10px 0;
            color: #333;
            font-size: 24px;
        }
        .scheme p {
            color: #555;
            font-size: 16px;
            line-height: 1.5;
        }
        .scheme:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Government Schemes</h1>
        <div id="schemes">
            <!-- Schemes will be loaded here dynamically from the database -->
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $.ajax({
                url: 'php/schemes.php', // Ensure this path is correct
                type: 'GET',
                success: function(data) {
                    let schemes = JSON.parse(data);
                    let schemesContainer = $('#schemes');
                    schemes.forEach(scheme => {
                        schemesContainer.append(`<div class="scheme"><h3>${scheme.name}</h3><p>${scheme.description}</p></div>`);
                    });
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching schemes:', error);
                }
            });
        });
    </script>
</body>
</html>
