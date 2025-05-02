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

let phoneValidation = () => {
  const phoneNo = document.getElementById("phone").value.trim();
  const errorDiv = document.getElementById("phoneError");

  if (phoneNo === "") {
    errorDiv.textContent = "Please enter your phone number.";
    return false;
  } else if (phoneNo.length !== 11) {
    errorDiv.textContent = "Phone number must be 11 digits.";
    return false;
  }

  for (let i = 0; i < phoneNo.length; i++) {
    if (phoneNo[i] < "0" || phoneNo[i] > "9") {
      errorDiv.textContent = "Phone number must contain only digits.";
      return false;
    }
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
  const genders = document.getElementsByName("gender");
  const errorDiv = document.getElementById("genderError");
  let isSelected = false;

  for (let gender of genders) {
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
  if(password === ""){
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
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document
    .getElementById("confirmPassword")
    .value.trim();
  const errorDiv = document.getElementById("confirmPasswordError");
  if(!confirmPassword){
    errorDiv.textContent = "Confirm Password is required";
    errorDiv.style.color = "red";
    return false;
  }
  if (confirmPassword !== password) {
    errorDiv.textContent = "Passwords do not match.";
    errorDiv.style.color = "red"
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let presentAddressValidation = () => {
  const presentAddress = document.getElementById("presentAdress").value.trim();
  const errorDiv = document.getElementById("presentAdressError");

  if (presentAddress === "") {
    errorDiv.textContent = "Present address is required.";
    errorDiv.style.color = "red";
    return false;
  } else {
    errorDiv.textContent = "";
    return true;
  }
};
let permanentAdressVAlidation = () => {
  const permanentAddress = document
    .getElementById("permanentAdress")
    .value.trim();
  const errorDiv = document.getElementById("permanentAdressError");

  if (permanentAddress === "") {
    errorDiv.textContent = "Permanent address is required.";
    errorDiv.style.color = "red";
    return false;
  } else {
    errorDiv.textContent = "";
    return true;
  }
};

let profilePhotoValidation = () => {
  const profilePhoto = document.getElementById("profile-photo");
  const profilePhotoError = document.getElementById("profilePhotoError");
  const photoFile = profilePhoto.files[0];
  const isValidImg = ["image/jpg", "image/jpeg", "image/png"];

  if (!photoFile) {
    profilePhotoError.textContent = "Profile photo is required";
    profilePhotoError.style.color = "red";
    return false;
  } else if (!isValidImg.includes(photoFile.type)) {
    profilePhotoError.textContent = "Only jpg, jpeg, or png format are allowed";
    profilePhotoError.style.color = "red";
    return false;
  } else {
    profilePhotoError.textContent = "";
    return true;
  }
};
const registrationValidation = () => {
  return (
    nameValidation() &&
    emailValidation() &&
    phoneValidation() &&
    dobValidation() &&
    genderValidation() &&
    accountTypeValidation() &&
    depositValidation() &&
    passwordValidation() &&
    confirmPasswordValidation() &&
    presentAddressValidation() &&
    permanentAdressVAlidation() &&
    profilePhotoValidation()
  );
};

const regButton = document.getElementById("regBtn");
regButton.addEventListener("click", (event) => {
  event.preventDefault();
  if (registrationValidation()) {
    alert("Registration successful!");
    window.location.href = "login.html";
  }
});
