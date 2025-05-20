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

  let nidValidation = () =>{
  const nid = document.getElementById("nidNumber").value.trim();
  const errorDiv = document.getElementById("nidNumberError");

  if (nid === "") {
    errorDiv.textContent = "Please enter your nid/passport number.";
    return false;
  } else if (nid.length !== 10) {
    errorDiv.textContent = "NID / Passport number must be 10 digits.";
    return false;
  }

  for (let i = 0; i < nid.length; i++) {
    if (nid[i] < "0" || nid[i] > "9") {
      errorDiv.textContent = "NID / Passport number must contain only digits.";
      return false;
    }
  }
  errorDiv.textContent = "";
  return true;
};
let roleValidation = () => {
  const role = document.getElementById("role").value;
  const errorDiv = document.getElementById("roleError");
  if (role === "") {
    errorDiv.textContent = "Please select a role.";
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
  let permanentAddressValidation = () => {
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

  const editProfileValidation = () => {
    return (
      nameValidation() &&
      emailValidation() &&
      phoneValidation() &&
      nidValidation()&&
      roleValidation()&&
      presentAddressValidation() &&
      permanentAddressValidation()
    );
  };
  
 const editProfileForm = document.getElementById("editProfileForm");
  editProfileForm.addEventListener("submit", (event) => {
    event.preventDefault();
    if (editProfileValidation()) {
      editProfileForm.submit();
    }
  });