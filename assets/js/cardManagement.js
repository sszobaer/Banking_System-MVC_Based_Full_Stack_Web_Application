//ZOBAER AHMED
let cardStatusValidation = () => {
  const errorDiv = document.getElementById("control-message");
  errorDiv.style.color = "";
  errorDiv.textContent = "";
  return true;
};

let spendingLimitValidation = () => {
  const category = document.getElementById("category").value;
  const amount = document.getElementById("limit-amount").value.trim();
  const categoryErrorDiv = document.getElementById("categoryError");
  const amountErrorDiv = document.getElementById("limitAmountError");
  const currency = document.getElementById("currency").value;
  const currencyError = document.getElementById("currencyError");
  if (category === "") {
    categoryErrorDiv.style.color = "red";
    categoryErrorDiv.textContent = "Please select a category.";
    return false;
  }

  if (amount === "") {
    amountErrorDiv.style.color = "red";
    amountErrorDiv.textContent = "Please enter a limit amount.";
    return false;
  }

  let isValid = true;
  for (let i = 0; i < amount.length; i++) {
    if (amount[i] < "0" || amount[i] > "9") {
      isValid = false;
      break;
    }
  }

  if (!isValid) {
    amountErrorDiv.style.color = "red";
    amountErrorDiv.textContent = "Limit amount must be a valid number.";
    return false;
  }

  if (currency === "") {
    currencyError.style.color = "red";
    currencyError.textContent = "Please select a currency.";
    return false;
  }

  const amountValue = parseInt(amount);
  if (amountValue <= 0) {
    amountErrorDiv.style.color = "red";
    amountErrorDiv.textContent = "Limit amount must be a positive number.";
    return false;
  }

  if (currency == "USD" && amountValue > 10000) {
    amountErrorDiv.style.color = "red";
    amountErrorDiv.textContent = "Limit amount cannot exceed $10,000.";
    return false;
  } else if (currency == "EUR" && amountValue > 8880) {
    amountErrorDiv.style.color = "red";
    amountErrorDiv.textContent = "Limit amount cannot exceed 8880 EUR.";
    return false;
  } else if (currency == "BDT" && amountValue > 1215000) {
    amountErrorDiv.style.color = "red";
    amountErrorDiv.textContent = "Limit amount cannot exceed bdt 12,15,000.";
    return false;
  }

  currencyError.style.color = "";
  categoryErrorDiv.style.color = "";
  categoryErrorDiv.textContent = "";
  amountErrorDiv.style.color = "";
  amountErrorDiv.textContent = "";
  currencyError.textContent = "";
  return true;
};

let pinValidation = () => {
  const currentPin = document.getElementById("current-pin").value.trim();
  const newPin = document.getElementById("new-pin").value.trim();
  const confirmPin = document.getElementById("confirm-pin").value.trim();
  const currentPinErrorDiv = document.getElementById("currentPinError");
  const newPinErrorDiv = document.getElementById("newPinError");
  const confirmPinErrorDiv = document.getElementById("confirmPinError");

  if (currentPin === "") {
    currentPinErrorDiv.style.color = "red";
    currentPinErrorDiv.textContent = "Please enter your current PIN.";
    return false;
  }

  if (newPin === "") {
    newPinErrorDiv.style.color = "red";
    newPinErrorDiv.textContent = "Please enter a new PIN.";
    return false;
  }

  if (confirmPin === "") {
    confirmPinErrorDiv.style.color = "red";
    confirmPinErrorDiv.textContent = "Please confirm your new PIN.";
    return false;
  }

  if (newPin !== confirmPin) {
    confirmPinErrorDiv.style.color = "red";
    confirmPinErrorDiv.textContent = "New PINs do not match.";
    return false;
  }

  if (newPin.length !== 4) {
    newPinErrorDiv.style.color = "red";
    newPinErrorDiv.textContent = "New PIN must be exactly 4 digits.";
    return false;
  }

  for (let i = 0; i < newPin.length; i++) {
    if (newPin[i] < "0" || newPin[i] > "9") {
      newPinErrorDiv.style.color = "red";
      newPinErrorDiv.textContent = "New PIN must contain only digits.";
      return false;
    }
  }

  currentPinErrorDiv.style.color = "";
  currentPinErrorDiv.textContent = "";
  newPinErrorDiv.style.color = "";
  newPinErrorDiv.textContent = "";
  confirmPinErrorDiv.style.color = "";
  confirmPinErrorDiv.textContent = "";
  return true;
};

let fraudDetailsValidation = () => {
  const details = document.getElementById("fraud-details").value.trim();
  const errorDiv = document.getElementById("fraudDetailsError");

  if (details === "") {
    errorDiv.style.color = "red";
    errorDiv.textContent = "Please provide details of the suspicious activity.";
    return false;
  }

  if (details.length > 200) {
    errorDiv.style.color = "red";
    errorDiv.textContent = "Details cannot exceed 200 characters.";
    return false;
  }

  errorDiv.style.color = "";
  errorDiv.textContent = "";
  return true;
};

document.addEventListener("DOMContentLoaded", () => {
  const tabs = document.querySelectorAll(".tab");
  const freezeButton = document.getElementById("freeze-button");
  const reportLostButton = document.getElementById("report-lost-button");
  const setLimitButton = document.getElementById("set-limit-button");
  const changePinButton = document.getElementById("change-pin-button");
  const reportFraudButton = document.getElementById("report-fraud-button");
  const togglePasswordButtons = document.querySelectorAll(".toggle-password");

  tabs.forEach((tab) => {
    tab.addEventListener("click", () => {
      const tabId = tab.dataset.tab;
      document
        .querySelectorAll(".tab")
        .forEach((t) => t.classList.remove("active"));
      document
        .querySelectorAll(".tab-content")
        .forEach((c) => c.classList.remove("active"));
      tab.classList.add("active");
      document.getElementById(tabId).classList.add("active");
    });
  });

  freezeButton.addEventListener("click", (event) => {
    event.preventDefault();
    const controlMessage = document.getElementById("control-message");
    controlMessage.style.color = "red";
    controlMessage.textContent =
      "Can't added the freeze button functonality yet.";
  });

  reportLostButton.addEventListener("click", (event) => {
    event.preventDefault();
    const controlMessage = document.getElementById("control-message");
    controlMessage.style.color = "red";
    controlMessage.textContent =
      "Can't added the report lost button functonality yet.";
  });

  setLimitButton.addEventListener("click", () => {
    if (spendingLimitValidation()) {
      const errorDiv = document.getElementById("setLimitMessage");
      errorDiv.style.color = "red";
      errorDiv.textContent = "Limit addition successful";
    }
  });

  changePinButton.addEventListener("click", () => {
    if (pinValidation()) {
      const pinMessageError = document.getElementById("pin-message");
      pinMessageError.style.color = "red";
      pinMessageError.textContent = "Your pin has been changed";
    }
  });

  reportFraudButton.addEventListener("click", () => {
    const fraudMessage = document.getElementById("fraud-message");
    if(fraudDetailsValidation()){
        fraudMessage.style.color = "red";
        fraudMessage.textContent = "Fraud details successful";
    }
  });
});
