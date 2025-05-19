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

let phoneNoValidation = () => {
  const phoneNo = document.getElementById("mobile").value.trim();
  const errorDiv = document.getElementById("mobileError");
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

let employmentValidation = () => {
  const employment = document.getElementById("employment").value;
  const errorDiv = document.getElementById("employmentError");
  if (employment === "") {
    errorDiv.textContent = "Please select your employment type.";
    return false;
  }
  errorDiv.textContent = "";
  return true;
};

let NIDPassportValidation = () => {
  const nid = document.getElementById("nid-passport").value.trim();
  const errorDiv = document.getElementById("nidPassportError");
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

let currencyValidation = () => {
  const currency = document.getElementById("currency").value;
  const errorDiv = document.getElementById("currencyError");
  if (currency === "") {
    errorDiv.textContent = "Please select a currency.";
    return false;
  }
  errorDiv.textContent = "";
  return true;
};

let loanTypeValidation = () => {
  const loanType = document.getElementById("loan-type").value;
  const errorDiv = document.getElementById("loanTypeError");
  if (loanType === "") {
    errorDiv.textContent = "Please select a loan type.";
    return false;
  }
  errorDiv.textContent = "";
  return true;
};

let monthlyIncomeValidation = () => {
  const income = document.getElementById("monthly-income").value.trim();
  const errorDiv = document.getElementById("monthlyIncomeError");
  if (!income) {
    errorDiv.textContent = "Income is required.";
    return false;
  } else if (Number(income) <= 0) {
    errorDiv.textContent = "Enter a valid monthly income.";
    return false;
  }
  for (let i = 0; i < income.length; i++) {
    if (income[i] < "0" || income[i] > "9") {
      errorDiv.textContent = "Income must contain only digits.";
      return false;
    }
  }
  errorDiv.textContent = "";
  return true;
};

let loanAmountValidation = () => {
  const amount = document.getElementById("loan-amount").value.trim();
  const errorDiv = document.getElementById("loanAmountError");
  if (amount === "") {
    errorDiv.textContent = "Loan Amount is required.";
    return false;
  } else if (Number(amount) <= 0) {
    errorDiv.textContent = "Enter a valid loan amount.";
    return false;
  }
  errorDiv.textContent = "";
  return true;
};

let taxSlipValidation = () => {
  const taxSlip = document.getElementById("tax-slip").value.trim();
  const errorDiv = document.getElementById("taxSlipError");
  if (taxSlip === "") {
    errorDiv.textContent = "Tax slip number is required.";
    return false;
  }
  for (let i = 0; i < taxSlip.length; i++) {
    if (taxSlip[i] < "0" || taxSlip[i] > "9") {
      errorDiv.textContent = "Tax number must contain only digits.";
      return false;
    }
  }
  errorDiv.textContent = "";
  return true;
};

let termsValidation = () => {
  const terms = document.getElementById("terms").checked;
  const errorDiv = document.getElementById("termsError");
  if (!terms) {
    errorDiv.textContent = "You must agree to the terms and conditions.";
    return false;
  }
  errorDiv.textContent = "";
  return true;
};

let validateLoanApplication = () => {
  return (
    nameValidation() &&
    phoneNoValidation() &&
    employmentValidation() &&
    NIDPassportValidation() &&
    emailValidation() &&
    currencyValidation() &&
    loanTypeValidation() &&
    monthlyIncomeValidation() &&
    loanAmountValidation() &&
    taxSlipValidation() &&
    termsValidation()
  );
};

const loanData = {
  personal: {
    type: "Personal Loan",
    interest: "6.5%",
    term: "1-5 years",
    amount: "$1,000-$50,000",
  },
  home: {
    type: "Home Loan",
    interest: "3.8%",
    term: "15-30 years",
    amount: "$50,000-$500,000",
  },
  auto: {
    type: "Auto Loan",
    interest: "4.2%",
    term: "3-7 years",
    amount: "$5,000-$100,000",
  },
  business: {
    type: "Business Loan",
    interest: "7.0%",
    term: "1-10 years",
    amount: "$10,000-$250,000",
  },
};

let selectedLoans = [];

document.addEventListener("DOMContentLoaded", () => {
  const loanApplicationButton = document.getElementById("loan-application-btn");
  const tabs = document.querySelectorAll(".tab");
  const compareButtons = document.querySelectorAll(".compare-btn");
  const compareSelectedButton = document.getElementById("compare-selected");
  const compareModal = document.getElementById("compareModal");
  const submitModal = document.getElementById("submitModal");
  const closeCompare = document.getElementById("close-compare");
  const closeSubmit = document.getElementById("close-submit");
  const comparisonBody = document.getElementById("comparisonBody");

  // Tab switching
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

  compareButtons.forEach((button) => {
    button.addEventListener("click", () => {
      const loanType = button.id.replace("compare-", "");
      if (!selectedLoans.includes(loanType)) {
        selectedLoans.push(loanType);
        button.textContent = "Remove from Compare";
      } else {
        selectedLoans = selectedLoans.filter((loan) => loan !== loanType);
        button.textContent = "Add to Compare";
      }
    });
  });

  // Show comparison modal
  compareSelectedButton.addEventListener("click", () => {
    if (selectedLoans.length === 0) {
      alert("Please select at least one loan to compare.");
      return;
    }
    comparisonBody.innerHTML = "";
    selectedLoans.forEach((loanType) => {
      const loan = loanData[loanType];
      const row = `
      <table>
        <tr>
          <td>${loan.type}</td>
          <td>${loan.interest}</td>
          <td>${loan.term}</td>
          <td>${loan.amount}</td>
        </tr>
      </table>
      `;
      comparisonBody.innerHTML += row;
    });
    compareModal.style.display = "block";
  });

  // Close comparison modal
  closeCompare.addEventListener("click", () => {
    compareModal.style.display = "none";
  });

  // Submit loan application
  const loanForm = document.getElementById('loan-form');
  loanForm.addEventListener("csubmit", (event) => {
    event.preventDefault();
    if (validateLoanApplication()) {
      loanForm.submit();
    }
  });

  // Close submit modal
  closeSubmit.addEventListener("click", () => {
    submitModal.style.display = "none";
    document.getElementById("loan-form").reset();
  });

  // Close modals when clicking outside
  window.addEventListener("click", (event) => {
    if (event.target === compareModal) {
      compareModal.style.display = "none";
    }
    if (event.target === submitModal) {
      submitModal.style.display = "none";
      document.getElementById("loan-form").reset();
    }
  });
});
