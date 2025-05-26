//Zobaer
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

const applyButton = document.getElementById("applyBtn");
const cardApplyForm = document.getElementById("cardApplyForm");
cardApplyForm.addEventListener("submit", (event) => {
  event.preventDefault();
  if (cardTypeValidation() && cardBrandValidation() && termsValidation()) {
    cardApplyForm.submit();
  }
});
