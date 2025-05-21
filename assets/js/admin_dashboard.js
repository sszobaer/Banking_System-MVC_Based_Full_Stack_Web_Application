document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll(".stats-card p");

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute("data-target");
            const current = +counter.innerText.replace(/[^\d.]/g, '');
            const increment = target / 60;

            if (current < target) {
                counter.innerText = "$" + Math.ceil(current + increment).toLocaleString();
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = "$" + target.toLocaleString();
            }
        };

        const isMoney = counter.innerText.includes("$");
        const targetValue = +counter.innerText.replace(/[^\d.]/g, '');

        counter.setAttribute("data-target", targetValue);
        counter.innerText = isMoney ? "$0" : "0";
        updateCount();
    });
});
/**transaction**/
const transactionsLink = document.getElementById("transactionsLink");
    const transactionsSection = document.getElementById("transactionsSection");

    if (transactionsLink && transactionsSection) {
        transactionsLink.addEventListener("click", function (e) {
            e.preventDefault();

            const currentlyVisible = transactionsSection.style.display === "block";
            const dashboardSection = document.getElementById("dashboard");
            if (dashboardSection) {
                dashboardSection.style.display = currentlyVisible ? "block" : "none";
            }
            transactionsSection.style.display = currentlyVisible ? "none" : "block";

            if (!currentlyVisible) {
                setTimeout(() => {
                    transactionsSection.scrollIntoView({ behavior: "smooth" });
                }, 100);
            }
        });
    }
});



