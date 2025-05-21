document.getElementById("form").addEventListener("submit", function (e) {
    const email = this.email.value;
    const message = this.message.value;
  
    if (!email.includes("@")) {
      alert("Please enter a valid email address.");
      e.preventDefault();
    }
  
    if (message.length < 5) {
      alert("Message must be at least 5 characters.");
      e.preventDefault();
    }
  });