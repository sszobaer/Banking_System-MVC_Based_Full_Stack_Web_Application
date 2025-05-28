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

document.addEventListener("DOMContentLoaded", function () {
    fetchDeposits(function (totalDeposit) {
        const ctx = document.getElementById('transactionChart').getContext('2d');
        const transactionChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ['Deposits', 'Withdrawals', 'Transfers', 'Bills'],
                datasets: [{
                    label: 'Transaction Breakdown',
                    data: [totalDeposit, 1200, 800, 500], // Now using the fetched value
                    backgroundColor: ['#ff7a00', '#182978', 'rgba(255, 153, 0, 0.7)', 'rgba(95, 194, 255, 0.7)'],
                    borderColor: ['#ff7a00', '#182978', 'rgba(255, 153, 0, 0.7)', 'rgba(95, 194, 255, 0.7)'],
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
