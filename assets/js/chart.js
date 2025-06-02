function fetchDeposits(callback) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/depositsController.php', true);
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            try {
                const data = JSON.parse(xhttp.responseText);
                callback(data.total_deposit);
            } catch (e) {
                console.error("Invalid JSON or no data returned");
                callback(0);
            }
        }
    };
    xhttp.send();
}

function fetchPayBills(callback) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/payBillController.php', true);
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            try {
                const data = JSON.parse(xhttp.responseText);
                callback(data.total_bill_payment);
            } catch (e) {
                console.error("Invalid JSON or no data returned");
                callback(0);
            }
        }
    };
    xhttp.send();
}

function fetchFundTransfer(callback) {
    const xhttp = new XMLHttpRequest();
    xhttp.open('GET', '../controller/transactionsController.php', true); 
    xhttp.onreadystatechange = () => {
        if (xhttp.readyState === 4 && xhttp.status === 200) {
            try {
                const data = JSON.parse(xhttp.responseText);
                callback(data.total_transaction);
            } catch (e) {
                console.error("Invalid JSON or no data returned");
                callback(0);
            }
        }
    };
    xhttp.send();
}

document.addEventListener("DOMContentLoaded", function () {
    fetchDeposits(function (totalDeposit) {
        fetchPayBills(function (totalBills) {
            fetchFundTransfer(function (fundTransfer) {
                const ctx = document.getElementById('transactionChart').getContext('2d');
                const transactionChart = new Chart(ctx, {
                    type: 'pie',
                    data: {
                        labels: ['Deposits', 'Transfers', 'Bills'],
                        datasets: [{
                            label: 'Transaction Breakdown',
                            data: [totalDeposit, 6000, totalBills],
                            backgroundColor: ['#ff7a00', '#182978', '#ff3e04'],
                            borderColor: ['#111', '#111', '#111'],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: {
                                position: 'bottom'
                            },
                            tooltip: {
                                callbacks: {
                                    label: function (context) {
                                        return `${context.label}: $${context.parsed}`;
                                    }
                                }
                            }
                        }
                    }
                });
            });
        });
    });
});
