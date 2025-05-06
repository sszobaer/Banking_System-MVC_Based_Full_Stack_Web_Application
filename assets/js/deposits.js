//Zobaer
let accountNumberValidation = () => {
    const accountNumber = document.getElementById("accountNumber").value.trim();
    const errorDiv = document.getElementById("accountNumberError");

    if (accountNumber === "") {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Please enter your account number.";
        return false;
    }

    if (accountNumber.length < 8 || accountNumber.length > 12) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Account number must be 8-12 digits.";
        return false;
    }

    for (let i = 0; i < accountNumber.length; i++) {
        if (accountNumber[i] < "0" || accountNumber[i] > "9") {
            errorDiv.style.color = "red";
            errorDiv.textContent = "Account number must contain only digits.";
            return false;
        }
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

let depositTypeValidation = () => {
    const depositType = document.getElementById("depositType").value;
    const errorDiv = document.getElementById("depositTypeError");

    if (depositType === "") {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Please select a deposit type.";
        return false;
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

let tenureValidation = () => {
    const depositType = document.getElementById("depositType").value;
    const tenure = document.getElementById("tenure").value;
    const errorDiv = document.getElementById("tenureError");

    if (depositType === "fixed" && tenure === "") {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Please select a tenure for fixed deposit.";
        return false;
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

let frequencyValidation = () => {
    const depositType = document.getElementById("depositType").value;
    const frequency = document.getElementById("frequency").value;
    const errorDiv = document.getElementById("frequencyError");

    if (depositType === "recurring" && frequency === "") {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Please select a deposit frequency.";
        return false;
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

let currencyValidation = () => {
    const currency = document.getElementById("currency").value;
    const errorDiv = document.getElementById("currencyError");

    if (currency === "") {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Please select a currency.";
        return false;
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

let amountValidation = () => {
    const amount = document.getElementById("amount").value.trim();
    const depositType = document.getElementById("depositType").value;
    const errorDiv = document.getElementById("amountError");

    if (amount === "") {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Please enter an amount.";
        return false;
    }

    let decimalCount = 0;
    let isValid = true;
    for (let i = 0; i < amount.length; i++) {
        if (amount[i] === ".") {
            decimalCount++;
            if (decimalCount > 1) {
                isValid = false;
                break;
            }
        } else if (amount[i] < "0" || amount[i] > "9") {
            isValid = false;
            break;
        }
    }

    if (!isValid || decimalCount > 1) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Amount must be a valid number.";
        return false;
    }

    const amountValue = parseFloat(amount);
    if (amountValue <= 0) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Amount must be a positive number.";
        return false;
    }

    if (depositType === "fixed" && amountValue < 1000) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Fixed deposit requires minimum $1000.";
        return false;
    } else if (depositType === "recurring" && amountValue > 5000) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Recurring deposit cannot exceed $5000 per deposit.";
        return false;
    } else if (amountValue > 10000) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Amount cannot exceed $10,000.";
        return false;
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

let memoValidation = () => {
    const memo = document.getElementById("memo").value.trim();
    const errorDiv = document.getElementById("memoError");

    if (memo.length > 50) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "Memo cannot exceed 50 characters.";
        return false;
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

let termsValidation = () => {
    const terms = document.getElementById("terms").checked;
    const errorDiv = document.getElementById("termsError");

    if (!terms) {
        errorDiv.style.color = "red";
        errorDiv.textContent = "You must agree to the terms and conditions.";
        return false;
    }

    errorDiv.style.color = "";
    errorDiv.textContent = "";
    return true;
};

const depositForm = document.getElementById("depositForm");
const depositTypeSelect = document.getElementById("depositType");
const tenureGroup = document.getElementById("tenureGroup");
const frequencyGroup = document.getElementById("frequencyGroup");
const depositMethodGroup = document.getElementById("depositMethodGroup");
const amountLabel = document.getElementById("amountLabel");
const amountInput = document.getElementById("amount");

depositTypeSelect.addEventListener("change", () => {
    if (depositTypeSelect.value === "fixed") {
        tenureGroup.style.display = "block";
        frequencyGroup.style.display = "none";
        depositMethodGroup.style.display = "none";
        document.getElementById("frequency").value = "";
        document.getElementById("depositMethod").value = "";
        document.getElementById("frequencyError").textContent = "";
        document.getElementById("depositMethodError").textContent = "";
        amountLabel.textContent = "Deposit Amount";
        amountInput.placeholder = "Enter deposit amount";
    } else if (depositTypeSelect.value === "recurring") {
        frequencyGroup.style.display = "block";
        tenureGroup.style.display = "none";
        depositMethodGroup.style.display = "none";
        document.getElementById("tenure").value = "";
        document.getElementById("depositMethod").value = "";
        document.getElementById("tenureError").textContent = "";
        document.getElementById("depositMethodError").textContent = "";
        amountLabel.textContent = "Amount per Deposit";
        amountInput.placeholder = "Enter amount per deposit";
    } else {
        tenureGroup.style.display = "none";
        frequencyGroup.style.display = "none";
        depositMethodGroup.style.display = "block";
        document.getElementById("tenure").value = "";
        document.getElementById("frequency").value = "";
        document.getElementById("tenureError").textContent = "";
        document.getElementById("frequencyError").textContent = "";
        amountLabel.textContent = "Deposit Amount";
        amountInput.placeholder = "Enter deposit amount";
    }
});

depositForm.addEventListener("submit", (event) => {
    event.preventDefault();
    if (
        accountNumberValidation() &&
        depositTypeValidation() &&
        tenureValidation() &&
        frequencyValidation() &&
        currencyValidation() &&
        amountValidation() &&
        memoValidation() &&
        termsValidation()
    ) {
        const depositType = document.getElementById("depositType").value;
        const depositMethod = document.getElementById("depositMethod").value;
        const accountNumber = document.getElementById("accountNumber").value.trim();
        const amount = document.getElementById("amount").value.trim();
        const currency = document.getElementById("currency").value;
        const memo = document.getElementById("memo").value.trim();

        if ((depositType === "checking" || depositType === "savings") && depositMethod === "transfer") {
            depositForm.submit();
        } else {
            const successMessage = `Deposit successful! Amount: ${currency} ${amount}`;
            alert(successMessage);
            depositForm.reset();
            tenureGroup.style.display = "none";
            frequencyGroup.style.display = "none";
            depositMethodGroup.style.display = "none";
            amountLabel.textContent = "Deposit Amount";
            amountInput.placeholder = "Enter deposit amount";
        }
    }
});