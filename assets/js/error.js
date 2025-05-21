const tips = [
    "Maybe this page was removed, or is temporarily unavailable.",
    "Check the URL for typos.",
    "Try going back to the homepage.",
    "We're sorry, but this page doesn't exist!"
];

const tipElement = document.getElementById("tip");
if (tipElement) {
    const randomTip = tips[Math.floor(Math.random() * tips.length)];
    tipElement.textContent = randomTip;
}
