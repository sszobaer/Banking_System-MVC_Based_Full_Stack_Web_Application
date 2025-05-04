//Zobaer
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
    atPosition < 1 ||
    dotPosition < atPosition + 2 ||
    dotPosition + 1 >= email.length
  ) {
    errorDiv.textContent = "Invalid email format.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};
let verificationCodeValidation = () => {
  const verificationCode = document
    .getElementById("verificationCode")
    .value.trim();
  const errorDiv = document.getElementById("verificationError");

  if (verificationCode === "") {
    errorDiv.textContent = "Please enter the verification code.";
    return false;
  } else if (verificationCode.length !== 6) {
    errorDiv.textContent = "verification code must be 6 digits.";
    return false;
  }

  for (let i = 0; i < verificationCode.length; i++) {
    if (verificationCode[i] < "0" || verificationCode[i] > "9") {
      errorDiv.textContent = "Verification Code must contain only digits.";
      return false;
    }
  }
  errorDiv.textContent = "";
  return true;
};

let passwordValidation = () => {
  const password = document.getElementById("newPassword").value.trim();
  const errorDiv = document.getElementById("newPasswordError");
  if (password === "") {
    errorDiv.textContent = "Password is required";
    errorDiv.style.color = "red";
    return false;
  }
  if (password.length < 6) {
    errorDiv.textContent = "Password must be at least 6 characters.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let confirmPasswordValidation = () => {
  const password = document.getElementById("newPassword").value.trim();
  const confirmPassword = document
    .getElementById("confirmPassword")
    .value.trim();
  const errorDiv = document.getElementById("confirmPasswordError");
  if (!confirmPassword) {
    errorDiv.textContent = "Confirm Password is required";
    errorDiv.style.color = "red";
    return false;
  }
  if (confirmPassword !== password) {
    errorDiv.textContent = "Passwords do not match.";
    errorDiv.style.color = "red";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let nextButton = document.getElementById("email-next");
let cancelButton = document.getElementById("cancelBtn");
let changePasswordBtn = document.getElementById("changePasswordBtn");
let cancelBtn = document.getElementById("cancel-btn");
if (nextButton) {
    nextButton.addEventListener("click", (event) => {
      event.preventDefault();
      if (emailValidation()) {
        window.location.href = "forgotPasswordVerification.html";
      }
    });
  }
  
  if (cancelButton) {
    cancelButton.addEventListener("click", (event) => {
      event.preventDefault();
      window.location.href = "index.html";
    });
  }
  
  if (changePasswordBtn) {
    changePasswordBtn.addEventListener("click", (event) => {
        event.preventDefault();
      if (
        verificationCodeValidation() &&
        passwordValidation() &&
        confirmPasswordValidation()
      ){
        window.location.href = "login.html";
      }
    });
  }
  
  if (cancelBtn) {
    cancelBtn.addEventListener("click", (event) => {
      event.preventDefault();
      window.location.href = "index.html";
    });
  }
  