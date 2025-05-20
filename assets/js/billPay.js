//ZOBAER AHMED
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

let receiptValidation = () => {
  const receipt = document.getElementById("upload-receipt");
  const receiptError = document.getElementById("uploadReceiptError");
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
    currencyValidation() &&
    amountValidation() &&
    receiptValidation() &&
    termsValidation()
  );
};

const payButton = document.getElementById("pay-btn");
const billPayForm = document.getElementById("billPayForm");
billPayForm.addEventListener("submit", (event) => {
  event.preventDefault();

  if (billPayValidation()) {
    const selectAccountText =
      document.getElementById("selectAccount").options[
        document.getElementById("selectAccount").selectedIndex
      ].text;
    const billerText =
      document.getElementById("biller").options[
        document.getElementById("biller").selectedIndex
      ].text;
    const amount = parseFloat(document.getElementById("amount").value).toFixed(
      2
    );
    const currency = document.getElementById("currency").value;
    const receiptFile = document.getElementById("upload-receipt").files[0];
    const receiptFileName = receiptFile ? receiptFile.name : "No file uploaded";

    const successMessage =
    `Payment successfully processed!\nPaid from: ${selectAccountText}\nBiller: ${billerText}\nAmount: ${amount} ${currency}\nReceipt: ${receiptFileName}`;

    alert(successMessage);
    billPayForm.submit();

    // ✅ PDF generation
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF();

    // Header
    doc.setFontSize(16);
    doc.text("Payment Confirmation Receipt", 20, 20);

    // Table data
    const tableColumn = ["Field", "Details"];
    const tableRows = [
      ["Paid from", selectAccountText],
      ["Biller", billerText],
      ["Amount", `${amount} ${currency}`],
      ["Receipt", receiptFileName],
    ];

    doc.autoTable({
      startY: 30,
      head: [tableColumn],
      body: tableRows,
      styles: { fontSize: 12 },
      theme: 'grid',
      headStyles: { fillColor: [255, 165, 0] },
    });

    doc.save("payment_confirmation.pdf");
  }
});
