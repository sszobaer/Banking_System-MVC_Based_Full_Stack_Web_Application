//ZOBAER
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('transactionChart').getContext('2d');
    const transactionChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Deposits', 'Withdrawals', 'Transfers', 'Wallet Balance'],
            datasets: [{
                label: 'Transaction Breakdown',
                data: [30000, 12000, 80000, 50000],
                backgroundColor: [
                    '#ff7a00',
                    '#182978',
                    'rgba(255, 153, 0, 0.7)',
                    'rgba(95, 194, 255, 0.7)'
                ],
                borderColor: [
                    '#ff7a00',
                    '#182978',
                    'rgba(255, 153, 0, 0.7)',
                    'rgba(95, 194, 255, 0.7)'
                ],
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
