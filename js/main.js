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
