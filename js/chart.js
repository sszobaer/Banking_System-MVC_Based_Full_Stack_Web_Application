//ZOBAER
document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('transactionChart').getContext('2d');
    const transactionChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Deposits', 'Withdrawals', 'Transfers', 'Bills'],
            datasets: [{
                label: 'Transaction Breakdown',
                data: [3000, 1200, 800, 500],
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