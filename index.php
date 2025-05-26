<!-- ZOBAER AHMED -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/_variable.css">
    <link rel="stylesheet" href="assets/css/_global.css">
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
    include "./view/header.php";
    ?>
        <!---------------------Hero Start(Zobaer)--------------------------------->
        <section class="hero" id="hero">
            <div class="hero-content">
                <div class="hero-title">
                    <h1>Innovative Banking Solution For Future </h1>
                </div>
                <p>Bank smarter with secure, fast, and effortless digital
                    banking—anytime, anywhere.</p>
                    
                <div class="button">
                    <a href="#calculator" class="btn">Interest Calculator</a>
                    <a href="#contact" class="btn2">Contact US</a>
                </div>
            </div>
        </section>
        <!---------------------Hero End----------------------------------->

        <!---------------------Services Start(Zobaer)----------------------------->
        <section class="services" id="services">
            <div class="section-header">
                <p class="tagline">We Offer Banking For Everyone</p>
                <h2>World Class Banking Services</h2>
                <p class="subheading">Your financial needs, our banking
                    expertise delivered</p>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="icon">
                        <i class="fa-solid fa-mobile-screen"></i>
                    </div>
                    <h3>mobile banking</h3>
                    <p>Manage your finances on the go with secure and
                        user-friendly mobile banking at your fingertips.</p>
                    <a href="#" class="read-more">Read More
                        <span>&#10140;</span></a>
                </div>

                <div class="service-card">
                    <div class="icon">
                        <span class="material-symbols-outlined">
                            finance_mode
                        </span>
                    </div>
                    <h3>Return Strategies</h3>
                    <p>Maximize your investments with tailored return strategies
                        designed to grow your wealth confidently.</p>
                    <a href="#" class="read-more">Read More
                        <span>&#10140;</span></a>
                </div>

                <div class="service-card">
                    <div class="icon">
                        <span class="material-symbols-outlined">
                            wallet
                        </span>
                    </div>
                    <h3>saving accounts</h3>
                    <p>Build your future with high-interest savings accounts
                        that offer flexibility and peace of mind.</p>
                    <a href="#" class="read-more">Read More
                        <span>&#10140;</span></a>
                </div>
            </div>

        </section>
        <!---------------------Services End------------------------------->

        <!---------------------About Start(Zobaer)------------------------------->
        <section class="about" id="about">
            <div class="about-container">
                <div class="about-image">
                    <img src="./assets/./img/./aboutImg.jpg" alt="About Image">
                </div>
                <div class="about-content">
                    <span class="subtitle">About Our Bank</span>
                    <h2>Building A More Compact<br>Our Future Economy</h2>
                    <p>
                        We deliver modern financial services with secure, smart,
                        and simple solutions.
                        Our mission is to support future-ready banking through
                        innovation and trust.
                    </p>

                    <div class="features">
                        <div class="feature-box">💼 banking Solutions</div>
                        <div class="feature-box">📊 Industry Expertise</div>
                    </div>

                    <div class="note-box">
                        We are committed to empowering your financial future.
                    </div>

                    <a href="view/registration.php" class="btn">Apply For An Account
                        <i
                            class="fa-solid fa-arrow-right"></i></a>
                </div>
            </div>
        </section>
        <!---------------------About End----------------------------------->

        <!---------------------Interest Calculator Start----------------------------->
<section class="calculator" id="calculator">
    <div class="container">
        <h2>Interest Calculator</h2>
        <div class="calculator-tabs">
            <button class="tab-button active" onclick="showTab('savings')">Savings Projector</button>
            <button class="tab-button" onclick="showTab('cd')">CD Compare</button>
            <button class="tab-button" onclick="showTab('loan')">Loan Savings</button>
        </div>

        <div class="calculator-content">
            <div class="tab-content active" id="savings">
                <form id="savings-form">
                    <input type="number" placeholder="Initial Amount" id="initialAmount" required>
                    <input type="number" placeholder="Monthly Deposit" id="monthlyDeposit" required>
                    <input type="number" placeholder="Annual Interest Rate (%)" id="interestRate" required>
                    <input type="number" placeholder="Years" id="years" required>
                    <button type="button" onclick="calculateSavings()">Calculate</button>
                    <p id="savingsResult"></p>
                </form>
            </div>

            <div class="tab-content" id="cd">
                <form id="cd-form">
                    <input type="number" placeholder="Amount" id="cdAmount" required>
                    <input type="number" placeholder="Term 1 Rate (%)" id="term1Rate" required>
                    <input type="number" placeholder="Term 2 Rate (%)" id="term2Rate" required>
                    <input type="number" placeholder="Years" id="cdYears" required>
                    <button type="button" onclick="compareCD()">Compare</button>
                    <p id="cdResult"></p>
                </form>
            </div>

            <div class="tab-content" id="loan">
                <form id="loan-form">
                    <input type="number" placeholder="Loan Amount" id="loanAmount" required>
                    <input type="number" placeholder="Interest Rate (%)" id="loanRate" required>
                    <input type="number" placeholder="Current Term (months)" id="loanTerm" required>
                    <input type="number" placeholder="Early Payoff (months)" id="earlyPayoff" required>
                    <button type="button" onclick="calculateLoanSavings()">Calculate</button>
                    <p id="loanResult"></p>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/interestCalculator.js"></script>
<!---------------------Interest Calculator End----------------------------->

        <!---------------------Features Start(Shuvra)---------------------------->
        <section class="features" id="features">
            <div class="container">
                <h2>Our Core Features</h2>
                <div class="features-grid">
                    <div class="feature-item">
                        <i class="fa-solid fa-shield-halved"></i>
                        <h3>Secure Transactions</h3>
                        <p>We ensure your transactions are safe with end-to-end
                            encryption and fraud detection.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-mobile-screen-button"></i>
                        <h3>Mobile Banking</h3>
                        <p>Manage your money on the go with our feature-rich
                            mobile app.</p>
                    </div>
                    <div class="feature-item">
                        <i class="fa-solid fa-headset"></i>
                        <h3>24/7 Support</h3>
                        <p>Our dedicated team is always here to help you with
                            any queries or issues.</p>
                    </div>
                </div>
            </div>
        </section>
        <!---------------------Features End------------------------------->

        <!---------------------Testimonials Start(Shuvra)----------------------------->
        <section class="testimonials" id="testimonials">
            <div class="container">
                <h2>What Our Clients Say</h2>
                <div class="testimonials-grid">
                    <div class="testimonial">
                        <p>"Switching to this platform was the best decision I made for my finances. Highly recommended!"</p>
                        <h4>- Sarah A., Entrepreneur</h4>
                    </div>
                    <div class="testimonial">
                        <p>"Fantastic support and seamless experience. Their mobile app is my favorite banking tool."</p>
                        <h4>- James T., Developer</h4>
                    </div>
                    <div class="testimonial">
                        <p>"Super secure and fast. I love how easy it is to manage my accounts."</p>
                        <h4>- Rina K., Teacher</h4>
                    </div>
                </div>
            </div>
        </section>
        <!---------------------Testimonials End------------------------------->

        <!---------------------Contact Start(Shuvra)------------------------------------->
        <section class="contact" id="contact">
            <div class="contact-container">
                <div class="contact-info">
                    <h4>Contacts</h4>
                    <h2>GET IN TOUCH</h2>
                    <p>Please fill out the form on this section to contact with
                        me.<br>
                        Or call/mail/massage between 08:00 a.m. and 12:00 p.m.
                        ET,<br>
                        Sunday through Wednesday.
                    </p>
                    <div class="info">
                        <p><i class="fas fa-map-marker-alt"></i> ka-3/F-4,
                            Basundhara R/D, Vatara, Dhaka-1229</p>
                        <p><i class="fas fa-phone"></i> +880 16987654</p>
                        <p><i class="fas fa-envelope"></i>
                            aurabank@fake.com</p>
                    </div>
                </div>
                <div class="contact-form">
                    <form id="form">
                        <input type="text" name="name" placeholder="Name"
                            required />
                        <input type="email" name="email" placeholder="Email"
                            required />
                        <textarea name="message" placeholder="Massage"
                            required></textarea>
                        <button type="submit" class="btn">Submit <i
                                class="fas fa-arrow-right"></i></button>

                    </form>
                </div>
            </div>
        </section>
        <!---------------------Contact End--------------------------------------->
    <?php include "../BankingSystem/view/footer.php";?>
    <script src="../assets/js/index.js"></script>
</body>

</html>