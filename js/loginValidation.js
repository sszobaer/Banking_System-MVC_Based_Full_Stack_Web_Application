let emailValidation = () => {
  const email = document.getElementById("email").value.trim();
  const errorDiv = document.getElementById("emailError");

  if (email === "") {
    errorDiv.textContent = "Please enter your email.";
    return false;
  }

  if (!email.includes("@") || !email.includes(".")) {
    errorDiv.textContent = "Email must contain '@' and '.'";
    return false;
  }

  const atPosition = email.indexOf("@");
  const dotPosition = email.lastIndexOf(".");

  if (
    atPosition < 1 || dotPosition < atPosition + 2 ||
    dotPosition + 1 >= email.length
  ) {
    errorDiv.textContent = "Invalid email format.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let passwordValidation = () => {
  const password = document.getElementById("password").value.trim();
  const error = document.getElementById("passwordError");

  if (password.length < 6) {
    error.textContent = "Password must be at least 6 characters.";
    return false;
  }
  error.textContent = "";
  return true;
};

const loginBtn = document.getElementById("loginBtn");

loginBtn.addEventListener("click", (event) => {
  event.preventDefault(); 
  if(emailValidation() && passwordValidation()) {
    alert("Login successful!");
    window.location.href = "userDashboard.html";
  }
});

