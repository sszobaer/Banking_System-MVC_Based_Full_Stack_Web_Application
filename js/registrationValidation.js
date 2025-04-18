//Registration validation and verification
let nameValidation = () => {
  const firstName = document.getElementById("firstName").value.trim();
  const lastName = document.getElementById("lastName").value.trim();
  const firstNameError = document.getElementById("firstNameError");
  const lastNameError = document.getElementById("lastNameError");

  let isValid = true;

  if (firstName === "") {
    firstNameError.textContent = "Please enter your first name.";
    isValid = false;
  } else {
    firstNameError.textContent = "";
  }

  if (lastName === "") {
    lastNameError.textContent = "Please enter your last name.";
    isValid = false;
  } else {
    lastNameError.textContent = "";
  }

  return isValid;
};

let emailValidation = () => {
  const email = document.getElementById("email").value.trim();
  const errorDiv = document.getElementById("emailError");
  const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

  if (email === "") {
    errorDiv.textContent = "Please enter your email.";
    return false;
  } else if (!emailRegex.test(email)) {
    errorDiv.textContent = "Invalid email format.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let phoneValidation = () => {
  const phone = document.getElementById("phone").value.trim();
  const errorDiv = document.getElementById("phoneError");
  const phoneRegex = /^\d{10}$/;

  if (phone === "") {
    errorDiv.textContent = "Please enter your phone number.";
    return false;
  } else if (!phoneRegex.test(phone)) {
    errorDiv.textContent = "Phone number must be 10 digits.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let dobValidation = () => {
  const dob = document.getElementById("dob").value.trim();
  const errorDiv = document.getElementById("dobError");

  if (dob === "") {
    errorDiv.textContent = "Please enter your date of birth.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let genderValidation = () => {
  const genderElems = document.getElementsByName("gender");
  const errorDiv = document.getElementById("genderError");
  let isSelected = false;

  for (let gender of genderElems) {
    if (gender.checked) {
      isSelected = true;
      break;
    }
  }

  if (!isSelected) {
    errorDiv.textContent = "Please select your gender.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let accountTypeValidation = () => {
  const accountType = document.getElementById("accountType").value;
  const errorDiv = document.getElementById("accountTypeError");

  if (accountType === "") {
    errorDiv.textContent = "Please select an account type.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let depositValidation = () => {
  const deposit = document.getElementById("initialDeposit").value.trim();
  const errorDiv = document.getElementById("initialDepositError");

  if (deposit === "" || isNaN(deposit) || Number(deposit) <= 0) {
    errorDiv.textContent = "Please enter a valid deposit amount.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let passwordValidation = () => {
  const password = document.getElementById("password").value.trim();
  const errorDiv = document.getElementById("passwordError");

  if (password.length < 6) {
    errorDiv.textContent = "Password must be at least 6 characters.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let confirmPasswordValidation = () => {
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document
    .getElementById("confirmPassword")
    .value.trim();
  const errorDiv = document.getElementById("confirmPasswordError");

  if (confirmPassword !== password) {
    errorDiv.textContent = "Passwords do not match.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};
const registrationValidation = () => {
  const isValid =
    nameValidation() &&
    emailValidation() &&
    phoneValidation() &&
    dobValidation() &&
    genderValidation() &&
    accountTypeValidation() &&
    depositValidation() &&
    passwordValidation() &&
    confirmPasswordValidation();

    if(isValid){
      window.location.href = "login.html";
    }
    return false;
};
