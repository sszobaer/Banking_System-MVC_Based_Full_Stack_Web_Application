<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apply for Card</title>
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
    ?>

    <!--------------------Card Apply Start-------------------------------->
    <section class="cardApply" id="cardApply">
        <div class="cardApplyContainer">
            <h1>Apply for Credit/Debit Card</h1>
            <form id="cardApplyForm" method="post"
                action="../controller/cardApplyController.php"
                enctype="multipart/form-data">
                <div class="form-group">
                    <div class="name-group">
                        <div class="name-field">
                            <label for="firstName">First Name</label>
                            <input type="text" id="firstName"
                                name="firstName"
                                placeholder="Enter your first name">
                            <div id="firstNameError" class="error-message"
                                name="error-message"></div>
                        </div>
                        <div class="name-field">
                            <label for="lastName">Last Name</label>
                            <input type="text" id="lastName" name="lastName"
                                placeholder="Enter your last name">
                            <div id="lastNameError"
                                class="error-message"></div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email"
                        placeholder="Enter your email">
                    <div id="emailError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <input type="text" id="phone" name="phone"
                        placeholder="Enter your phone number">
                    <div id="phoneError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="dob">Date of Birth</label>
                    <input type="date" id="dob" name="dob">
                    <div id="dobError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label>Gender</label>
                    <div class="gender-group">
                        <input type="radio" id="male" name="gender"
                            value="male">
                        <label for="male">Male</label>
                        <input type="radio" id="female" name="gender"
                            value="female">
                        <label for="female">Female</label>
                        <input type="radio" id="other" name="gender"
                            value="other">
                        <label for="other">Other</label>
                    </div>
                    <div id="genderError" class="error-message"></div>
                </div>
                <div class="form-group">
                    <label for="acc-no">Current Account no.</label>
                    <input type="text" id="acc-no" name="acc-no"
                        placeholder="Enter your account number">
                    <div id="accNoError" class="error-message"></div>
                </div>
                <div class="form-group-checkBox">
                    <input type="checkbox" id="terms" name="terms">
                    I haven't any account right now
                    <div id="termsError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="cardType">Card Type</label>
                    <select id="cardType" name="cardType">
                        <option value>Select Card Type</option>
                        <option value="debit">Debit Card</option>
                        <option value="credit">Credit Card</option>
                        <option value="prepaid">Prepaid Card</option>
                    </select>
                    <div id="cardTypeError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="cardBrand">Card Brand</label>
                    <select id="cardBrand" name="cardBrand">
                        <option value>Select Card Brand</option>
                        <option value="visa">VISA</option>
                        <option value="mastercard">MasterCard</option>
                        <option value="amex">American Express</option>
                        <option value="rupay">Rupay</option>
                    </select>
                    <div id="cardBrandError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="occupation">Occupation</label>
                    <input type="text" id="occupation" name="occupation"
                        placeholder="Enter your occupation">
                    <div id="occupationError" class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="monthlyIncome">Monthly Income (USD)</label>
                    <input type="number" id="monthlyIncome"
                        name="monthlyIncome"
                        placeholder="Enter your monthly income">
                    <div id="monthlyIncomeError"
                        class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="presentAddress">Present Address</label>
                    <input type="text" id="presentAddress"
                        name="presentAddress"
                        placeholder="Enter your present address">
                    <div id="presentAddressError"
                        class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="permanentAddress">Permanent Address</label>
                    <input type="text" id="permanentAddress"
                        name="permanentAddress"
                        placeholder="Enter your permanent address">
                    <div id="permanentAddressError"
                        class="error-message"></div>
                </div>

                <div class="form-group">
                    <label for="profile-photo">Profile Picture</label>
                    <input type="file" id="profile-photo"
                        name="profile-photo">
                    <div id="profilePhotoError" class="error-message"></div>
                </div>


                <div class="form-group-checkBox">
                    <input type="checkbox" id="terms" name="terms">
                    I agree to the <a href="./terms.php" target="_blank"
                        class="termsNdcondition">Terms & Conditions</a>
                    <div id="termsError" class="error-message"></div>
                </div>

                <button class="btn" id="applyBtn" name="applyBtn">Apply
                    Now</button>
            </form>
        </div>
    </section>
    <?php include "./footer.php"; ?>
    <!--------------------Card Apply End---------------------------------->
    <script src="../assets/js/cardApply.js"></script>
    <script src="../assets/js/index.js"></script>
</body>

</html>