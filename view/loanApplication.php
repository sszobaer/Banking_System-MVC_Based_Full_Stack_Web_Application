<!-- ZOBAER AHMED -->
<?php 
    session_start(); 
    if(isset($_SESSION['email'])){
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Loan Application</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/_variable.css">
    <link rel="stylesheet" href="../assets/css/_global.css">
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined"
        rel="stylesheet">
</head>
<body>
    <?php
    include "./header.php";
    include "./userSidebar.php";
    ?>
    <!-- Main Section -->
    <section class="loan" id="loan">
        <div class="loanContainer">
            <h1>Loan Application System</h1>
            <!-- Tabs -->
            <div class="tabs">
                <div class="tab active" data-tab="compare-loans">Compare Loans</div>
                <div class="tab" data-tab="apply-loan">Apply for Loan</div>
            </div>

            <!-- Compare Loans Tab -->
            <div id="compare-loans" class="tab-content active">
                <div class="loan-flex">
                    <div class="loan-card">
                        <h3>Personal Loan</h3>
                        <p>Interest Rate: 6.5%</p>
                        <p>Term: 1-5 years</p>
                        <p>Amount: $1,000-$50,000</p>
                        <button class="btn compare-btn" id="compare-personal">Add to Compare</button>
                    </div>
                    <div class="loan-card">
                        <h3>Home Loan</h3>
                        <p>Interest Rate: 3.8%</p>
                        <p>Term: 15-30 years</p>
                        <p>Amount: $50,000-$500,000</p>
                        <button class="btn compare-btn" id="compare-home">Add to Compare</button>
                    </div>
                    <div class="loan-card">
                        <h3>Auto Loan</h3>
                        <p>Interest Rate: 4.2%</p>
                        <p>Term: 3-7 years</p>
                        <p>Amount: $5,000-$100,000</p>
                        <button class="btn compare-btn" id="compare-auto">Add to Compare</button>
                    </div>
                    <div class="loan-card">
                        <h3>Business Loan</h3>
                        <p>Interest Rate: 7.0%</p>
                        <p>Term: 1-10 years</p>
                        <p>Amount: $10,000-$250,000</p>
                        <button class="btn compare-btn" id="compare-business">Add to Compare</button>
                    </div>
                </div>
                <button class="btn" id="compare-selected">Compare Selected Loans</button>
            </div>

            <!-- Apply for Loan Tab -->
            <div id="apply-loan" class="tab-content">
                <form id="loan-form" method="post" action="../controller/loanManagementController.php">
                    <div class="form-group">
                        <div class="name-group">
                            <div class="name-field">
                                <label for="firstName">First Name</label>
                                <input type="text" id="firstName" name="firstName" placeholder="Enter your first name" value = <?= $_SESSION['firstName']?>>
                                <div id="firstNameError" class="error-message"></div>
                            </div>
                            <div class="name-field">
                                <label for="lastName">Last Name</label>
                                <input type="text" id="lastName" name="lastName" placeholder="Enter your last name" value = <?= $_SESSION['lastName']?>>
                                <div id="lastNameError" class="error-message"></div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="mobile">Mobile Number</label>
                        <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" value = <?= $_SESSION['phoneNo']?>>
                        <div id="mobileError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="employment">Type of Employment</label>
                        <select id="employment" name="employment">
                            <option value="">Select employment type</option>
                            <option value="salaried">Salaried</option>
                            <option value="self-employed">Self-Employed</option>
                            <option value="unemployed">Unemployed</option>
                            <option value="retired">Retired</option>
                        </select>
                        <div id="employmentError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="nid-passport">NID/Passport Number</label>
                        <input type="text" id="nid-passport" name="nid-passport" placeholder="Enter NID or Passport number" value = <?= $_SESSION['nid/passport']?>>
                        <div id="nidPassportError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" placeholder="Enter your email" value = <?= $_SESSION['email']?>>
                        <div id="emailError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="currency">Select Currency</label>
                        <select id="currency" name="currency">
                            <option value="">Select currency</option>
                            <option value="USD">USD</option>
                            <option value="EUR">EUR</option>
                            <option value="BDT">BDT</option>
                        </select>
                        <div id="currencyError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="loan-type">Loan Type</label>
                        <select id="loan-type" name="loan-type">
                            <option value="">Select loan type</option>
                            <option value="personal">Personal Loan</option>
                            <option value="home">Home Loan</option>
                            <option value="auto">Auto Loan</option>
                            <option value="business">Business Loan</option>
                        </select>
                        <div id="loanTypeError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="monthly-income">Monthly Income</label>
                        <input type="number" id="monthly-income" name="monthly-income" placeholder="Enter your monthly income">
                        <div id="monthlyIncomeError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="loan-amount">Desired Loan Amount</label>
                        <input type="number" id="loan-amount" name="loan-amount" placeholder="Enter desired loan amount">
                        <div id="loanAmountError" class="error-message"></div>
                    </div>

                    <div class="form-group">
                        <label for="tax-slip">Tax Return Acknowledgement Slip No</label>
                        <input type="text" id="tax-slip" name="tax-slip" placeholder="Enter tax slip number">
                        <div id="taxSlipError" class="error-message"></div>
                    </div>

                    <div class="form-group-terms">
                    <input type="checkbox" id="terms" name="terms">
                    I agree to the <a href="terms.html" target="_blank"
                        class="termsNdcondition">Terms & Conditions</a>
                    <div id="termsError" class="error-message"></div>
                </div>

                    <button class="btn" id="loan-application-btn">Submit Application</button>
                </form>
            </div>
        </div>
    </section>

    <!-- Comparison Modal -->
    <div id="compareModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-compare">×</span>
            <h2>Loan Comparison</h2>
            <table class="comparison-table">
                <thead>
                    <tr>
                        <th>Loan Type</th>
                        <th>Interest Rate</th>
                        <th>Term</th>
                        <th>Amount</th>
                    </tr>
                </thead>
                <tbody id="comparisonBody"></tbody>
            </table>
        </div>
    </div>

    <!-- Signature Modal -->
    <div id="signModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-sign">×</span>
            <h2>Agreement Signed</h2>
            <p>Your loan agreement has been successfully signed.</p>
        </div>
    </div>

    <!-- Application Submission Modal -->
    <div id="submitModal" class="modal">
        <div class="modal-content">
            <span class="close" id="close-submit">×</span>
            <h2>Application Submitted</h2>
            <p>Your loan application has been successfully submitted.</p>
        </div>
    </div>
    <script src="../assets/js/loanApplication.js"></script>
</body>
</html>
<?php
    } else {
        header("Location: login.php");
        exit();
    }
?>