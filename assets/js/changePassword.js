//Zobaer
let currentPasswordValidation = () => {
  const password = document.getElementById("currentPassword").value.trim();
  const errorDiv = document.getElementById("currentPasswordError");
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
let newPasswordValidation = () => {
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
    const currentPassword = document.getElementById("currentPassword").value.trim();
  const password = document.getElementById("newPassword").value.trim();
  const confirmPassword = document
    .getElementById("confirmPassword")
    .value.trim();
  const errorDiv = document.getElementById("confirmPasswordError");
  if(currentPassword === password){
    errorDiv.textContent = "Current password and new password should not be matched";
    errorDiv.style.color = "red";
    return false;
  }
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
let changePasswordBtn = document.getElementById("changePasswordBtn");
let cancelBtn = document.getElementById("cancel-btn");

if (changePasswordBtn) {
  changePasswordBtn.addEventListener("click", (event) => {
    event.preventDefault();
    let isValid =
      currentPasswordValidation() &&
      newPasswordValidation() &&
      confirmPasswordValidation();
    if (isValid) {
        alert("Password has been changed");
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
