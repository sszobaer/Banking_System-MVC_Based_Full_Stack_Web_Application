let emailValidation = () => {
    const email = document.getElementById("email").value.trim();
    const error = document.getElementById("emailError");
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  
    if (email === "") {
      error.textContent = "Please enter your email.";
      return false;
    } else if (!regex.test(email)) {
      error.textContent = "Invalid email format.";
      return false;
    }
    error.textContent = "";
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
  
  let loginValidation = () => {
    return emailValidation() && passwordValidation();
  };
  