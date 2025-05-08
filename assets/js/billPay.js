let selectAccountValidation = () => {
  const selectAccount = document.getElementById("selectAccount").value;
  const selectAccountError = document.getElementById("selectAccountError");

  if (selectAccount === "") {
    selectAccountError.textContent = "Please select an account.";
    selectAccountError.style.color = "red";
    return false;
  } else {
    selectAccountError.textContent = "";
    return true;
  }
};

let paymentAccountNumberValidation = () => {
  const paymentAccountNumber = document
    .getElementById("PaymentAccountNumber")
    .value.trim();
  const paymentAccountNumberError = document.getElementById(
    "paymentAccountNumberError"
  );

  if (paymentAccountNumber === "") {
    paymentAccountNumberError.style.color = "red";
    paymentAccountNumberError.textContent = "Please enter your account number.";
    return false;
  }

  if (paymentAccountNumber.length < 8 || paymentAccountNumber.length > 12) {
    paymentAccountNumberError.style.color = "red";
    paymentAccountNumberError.textContent =
      "Account number must be 8-12 digits.";
    return false;
  }

  for (let i = 0; i < paymentAccountNumber.length; i++) {
    if (paymentAccountNumber[i] < "0" || paymentAccountNumber[i] > "9") {
      paymentAccountNumberError.style.color = "red";
      paymentAccountNumberError.textContent =
        "Account number must contain only digits.";
      return false;
    }
  }

  paymentAccountNumberError.style.color = "";
  paymentAccountNumberError.textContent = "";
  return true;
};

let billerValidation = () => {
  const biller = document.getElementById("biller").value;
  const billerError = document.getElementById("payeeError");

  if (biller === "") {
    billerError.textContent = "Please select a biller.";
    billerError.style.color = "red";
    return false;
  } else {
    billerError.textContent = "";
    return true;
  }
};

let amountValidation = () => {
  const amount = document.getElementById("amount").value.trim();
  const amountError = document.getElementById("amountError");

  if (amount === "" || isNaN(amount) || Number(amount) <= 0) {
    amountError.textContent = "Please enter a valid payment amount.";
    amountError.style.color = "red";
    return false;
  }

  amountError.textContent = "";
  return true;
};

let currencyValidation = () => {
  const currency = document.getElementById("currency").value;
  const currencyError = document.getElementById("currencyError");

  if (currency === "") {
    currencyError.textContent = "Please select a currency.";
    currencyError.style.color = "red";
    return false;
  } else {
    currencyError.textContent = "";
    return true;
  }
};

let receiptValidation = () => {
  const receipt = document.getElementById("upload-receipt");
  const receiptError = document.getElementById("uploadRreceiptError");
  const receiptFile = receipt.files[0];
  const isValidFile = [
    "image/jpg",
    "image/jpeg",
    "image/png",
    "application/pdf",
  ];
  const maxSize = 5 * 1024 * 1024;

  if (!receiptFile) {
    receiptError.textContent = "Receipt file is required.";
    receiptError.style.color = "red";
    return false;
  } else if (!isValidFile.includes(receiptFile.type)) {
    receiptError.textContent =
      "Only JPG, JPEG, PNG, or PDF formats are allowed.";
    receiptError.style.color = "red";
    return false;
  } else if (receiptFile.size > maxSize) {
    receiptError.textContent = "File size must be less than 5MB.";
    receiptError.style.color = "red";
    return false;
  } else {
    receiptError.textContent = "";
    return true;
  }
};

let termsValidation = () => {
  const terms = document.getElementById("terms");
  const termsError = document.getElementById("termsError");

  if (!terms.checked) {
    termsError.textContent = "You must agree to the terms and conditions.";
    termsError.style.color = "red";
    return false;
  } else {
    termsError.textContent = "";
    return true;
  }
};

let billPayValidation = () => {
  return (
    selectAccountValidation() &&
    paymentAccountNumberValidation() &&
    billerValidation() &&
    amountValidation() &&
    currencyValidation() &&
    receiptValidation() &&
    termsValidation()
  );
};

const payButton = document.getElementById("pay-btn");
payButton.addEventListener("click", (event) => {
  event.preventDefault();
  if (billPayValidation()) {
    const selectAccountText = document.getElementById("selectAccount").options[document.getElementById("selectAccount").selectedIndex].text;
    const billerText = document.getElementById("biller").options[document.getElementById("biller").selectedIndex].text;
    const amount = parseFloat(document.getElementById("amount").value).toFixed(2);
    const currency = document.getElementById("currency").value;
    const receiptFileName = document.getElementById("upload-receipt").files[0].name;

    const successMessage = document.createElement("div");
    successMessage.className = "success-message";
    successMessage.style.cssText = "background-color: #e6f3e6; color: #2e7d32; padding: 15px; border-radius: 4px; margin-bottom: 20px;";
    successMessage.innerHTML = `
        <p>Payment successfully processed!</p>
        <p>Paid from: <strong>${selectAccountText}</strong></p>
        <p>Biller: <strong>${billerText}</strong></p>
        <p>Amount: <strong>${amount} ${currency}</strong></p>
        <p>Receipt: <strong>${receiptFileName}</strong></p>
      `;
    const form = document.getElementById("billPayForm");
    form.parentNode.insertBefore(successMessage, form);

    // PDF download functionality
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();
      doc.setFontSize(12);
      doc.text("Payment Confirmation", 20, 20);
      doc.text(`Paid from: ${selectAccountText}`, 20, 30);
      doc.text(`Biller: ${billerText}`, 20, 40);
      doc.text(`Amount: ${amount} ${currency}`, 20, 50);
      doc.text(`Receipt: ${receiptFileName}`, 20, 60);
      doc.save("payment_confirmation.pdf");
    }
  }
);
