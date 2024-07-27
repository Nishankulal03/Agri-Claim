<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insurance Claim</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #ff0099, #ffcc00); /* Neon gradient background */
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 20px;
            background: #fff; /* White background for the form container */
            border-radius: 8px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: auto; /* Adjust height dynamically based on content */
            min-height: 600px; /* Minimum height for consistent layout */
        }
        h1 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }
        .form-group textarea {
            height: 120px;
            resize: vertical;
        }
        .form-group input[type="file"] {
            padding: 0;
        }
        .btn {
            display: inline-block;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            color: #fff;
            background-color: #28a745; /* Green color */
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-align: center;
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin: 0 auto;
        }
        .btn:hover {
            background-color: #dc3545; /* Red color on hover */
            transform: scale(1.05); /* Slight scaling on hover */
        }
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: #28a745; /* Green border on focus */
            outline: none;
        }
        .btn-container {
            text-align: center; /* Center the button */
            margin-top: auto; /* Pushes button to the bottom of the container */
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            document.getElementById('claimForm').addEventListener('submit', function(event) {
                event.preventDefault();

                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        document.getElementById('latitude').value = position.coords.latitude;
                        document.getElementById('longitude').value = position.coords.longitude;
                        event.target.submit();
                    }, function(error) {
                        alert('Error retrieving location');
                        event.target.submit();
                    });
                } else {
                    alert('Geolocation is not supported by this browser.');
                    event.target.submit();
                }
            });
        });
    </script>
</head>
<body>
    <?php include 'navbar.php'; ?>
    <div class="container">
        <h1>Insurance Claim</h1>
        <form id="claimForm" action="php/insurance_claim.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="farmerName">Farmer Name:</label>
                <input type="text" class="form-control" id="farmerName" name="farmerName" required>
            </div>
            <div class="form-group">
                <label for="rtcNo">RTC No.:</label>
                <input type="text" class="form-control" id="rtcNo" name="rtcNo" required>
            </div>
            <div class="form-group">
                <label for="cropType">Crop Type:</label>
                <input type="text" class="form-control" id="cropType" name="cropType" required>
            </div>
            <div class="form-group">
                <label for="totalLoss">Total Loss (in Rupees):</label>
                <input type="number" class="form-control" id="totalLoss" name="totalLoss" required>
            </div>
            <div class="form-group">
                <label for="location">Current Location:</label>
                <input type="text" class="form-control" id="location" name="location" required>
            </div>
            <div class="form-group">
                <label for="photos">Upload Photos:</label>
                <input type="file" class="form-control" id="photos" name="photos[]" multiple required>
            </div>
            <div class="form-group">
                <label for="complaintBox">Complaint Box:</label>
                <textarea class="form-control" id="complaintBox" name="complaintBox" required></textarea>
            </div>
            <input type="hidden" id="latitude" name="latitude">
            <input type="hidden" id="longitude" name="longitude">
            <div class="btn-container">
                <button type="submit" class="btn">Register Complaint</button>
            </div>
        </form>
    </div>
</body>
</html>
