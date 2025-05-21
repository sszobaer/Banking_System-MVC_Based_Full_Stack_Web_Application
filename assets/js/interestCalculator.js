function showTab(tabId) {
    document.querySelectorAll('.tab-content').forEach(tab => tab.classList.remove('active'));
    document.querySelectorAll('.tab-button').forEach(btn => btn.classList.remove('active'));
    document.getElementById(tabId).classList.add('active');
    document.querySelector(`[onclick="showTab('${tabId}')"]`).classList.add('active');
}

function calculateSavings() {
    const principal = parseFloat(document.getElementById('initialAmount').value);
    const monthly = parseFloat(document.getElementById('monthlyDeposit').value);
    const annualRate = parseFloat(document.getElementById('interestRate').value) / 100;
    const years = parseInt(document.getElementById('years').value);

    let balance = principal;
    const monthlyRate = annualRate / 12;
    const months = years * 12;

    for (let i = 0; i < months; i++) {
        balance = (balance + monthly) * (1 + monthlyRate);
    }

    document.getElementById('savingsResult').textContent = `Future Value: $${balance.toFixed(2)}`;
}

function compareCD() {
    const amount = parseFloat(document.getElementById('cdAmount').value);
    const rate1 = parseFloat(document.getElementById('term1Rate').value) / 100;
    const rate2 = parseFloat(document.getElementById('term2Rate').value) / 100;
    const years = parseFloat(document.getElementById('cdYears').value);

    const value1 = amount * Math.pow(1 + rate1, years);
    const value2 = amount * Math.pow(1 + rate2, years);
    const diff = Math.abs(value1 - value2);

    document.getElementById('cdResult').textContent = `Option 1: $${value1.toFixed(2)}, Option 2: $${value2.toFixed(2)} (Difference: $${diff.toFixed(2)})`;
}

function calculateLoanSavings() {
    const loan = parseFloat(document.getElementById('loanAmount').value);
    const rate = parseFloat(document.getElementById('loanRate').value) / 100 / 12;
    const term = parseInt(document.getElementById('loanTerm').value);
    const early = parseInt(document.getElementById('earlyPayoff').value);

    const monthlyPayment = (loan * rate) / (1 - Math.pow(1 + rate, -term));
    const totalOriginal = monthlyPayment * term;
    const totalEarly = monthlyPayment * early;
    const savings = totalOriginal - totalEarly;

    document.getElementById('loanResult').textContent = `Monthly Payment: $${monthlyPayment.toFixed(2)}, Savings if paid in ${early} months: $${savings.toFixed(2)}`;
}
