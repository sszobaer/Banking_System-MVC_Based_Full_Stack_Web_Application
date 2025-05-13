//Zobaer
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

let cardTypeValidation = () => {
  const cardType = document.getElementById("cardType").value;
  const errorDiv = document.getElementById("cardTypeError");

  if (cardType === "") {
    errorDiv.textContent = "Please select an card type.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};
let cardBrandValidation = () => {
  const cardBrand = document.getElementById("cardBrand").value;
  const errorDiv = document.getElementById("cardBrandError");

  if (cardBrand === "") {
    errorDiv.textContent = "Please select an Card brand.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};
let occupationValidation = () => {
  const occupation = document.getElementById("occupation").value.trim();
  const occupationError = document.getElementById("occupationError");

  if (occupation === "") {
    occupationError.textContent = "Occupation is required.";
    occupationError.style.color = "red";
    return false;
  } else {
    occupationError.textContent = "";
    return true;
  }
};

let monthlyIncomeValidation = () => {
  const monthlyIncome = document.getElementById("monthlyIncome").value.trim();
  const errorDiv = document.getElementById("monthlyIncomeError");

  if (monthlyIncome === "" || isNaN(monthlyIncome) || Number(monthlyIncome) <= 0) {
    errorDiv.textContent = "Please enter a valid income amount.";
    return false;
  }

  errorDiv.textContent = "";
  return true;
};

let presentAddressValidation = () => {
  const presentAddress = document.getElementById("presentAddress").value.trim();
  const errorDiv = document.getElementById("presentAddressError");

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
    .getElementById("permanentAddress")
    .value.trim();
  const errorDiv = document.getElementById("permanentAddressError");

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
let termsValidation = () => {
  const terms = document.getElementById("terms");
  const termsError = document.getElementById("termsError");
  if (!terms.checked) {
    termsError.textContent = "Terms and condition must be checked";
    termsError.style.color = "red";
    return false;
  } else {
    termsError.textContent = "";
    return true;
  }
};
const applyValidation = () => {
  return (
    nameValidation() &&
    emailValidation() &&
    phoneValidation() &&
    dobValidation() &&
    genderValidation() &&
    cardTypeValidation()&&
    cardBrandValidation()&&
    occupationValidation()&&
    monthlyIncomeValidation()&&
    presentAddressValidation() &&
    permanentAdressVAlidation() &&
    profilePhotoValidation() &&
    termsValidation()
  );
};

const applyButton = document.getElementById("applyBtn");
const  cardApplyForm  = document.getElementById("cardApplyForm");
cardApplyForm.addEventListener("submit", (event) => {
  event.preventDefault();
  if (applyValidation()) {
    cardApplyForm.submit(); 
  }
});
