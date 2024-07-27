<?php include 'navbar.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Calculator</title>
    <link rel="stylesheet" href="css/styles.css"> <!-- Include your main stylesheet here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: linear-gradient(135deg, #ff0099, #ffcc00);
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 50px;
        }
        h1 {
            text-align: center;
            color: #5cb85c; /* Main color */
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #333;
        }
        .form-group input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }
        .form-group input:focus {
            border-color: #5cb85c;
            outline: none;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }
        .btn-primary {
            display: inline-block;
            padding: 10px 20px;
            background-color: #5cb85c;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
        }
        .btn-primary:hover {
            background-color: #4cae4c;
        }
        #result {
            text-align: center;
            font-size: 18px;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Loan Calculator</h1>
        <form id="loanCalculator">
            <div class="form-group">
                <label for="amount">Loan Amount:</label>
                <input type="number" class="form-control" id="amount" required>
            </div>
            <div class="form-group">
                <label for="duration">Duration (years):</label>
                <input type="number" class="form-control" id="duration" required>
            </div>
            <div class="form-group">
                <label for="interestRate">Interest Rate (%):</label>
                <input type="number" class="form-control" id="interestRate" required>
            </div>
            <button type="submit" class="btn-primary">Calculate</button>
        </form>
        <div id="result"></div>
    </div>
    <script>
        document.getElementById('loanCalculator').addEventListener('submit', function(event) {
            event.preventDefault();
            let amount = parseFloat(document.getElementById('amount').value);
            let duration = parseFloat(document.getElementById('duration').value);
            let interestRate = parseFloat(document.getElementById('interestRate').value);
            let monthlyRate = interestRate / 100 / 12;
            let numberOfPayments = duration * 12;
            let monthlyPayment = amount * monthlyRate / (1 - (Math.pow(1/(1 + monthlyRate), numberOfPayments)));
            document.getElementById('result').innerText = `Monthly Payment: ${monthlyPayment.toFixed(2)}`;
        });
    </script>
</body>
</html>
