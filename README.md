# 💳 Banking System – MVC Based Full Stack Web Application

A secure, role-based **MVC architecture** web banking system built using **PHP**, **MySQL**, **AJAX**, **Chart.js**, and **JSON**. It simulates core banking operations including user registration, admin approval, loan processing, deposits, and real-time financial visualization.

---

## 📚 Table of Contents

1. [Setup Instructions (Start Here)](#️-setup-instructions-start-here)
2. [Features at a Glance](#-features-at-a-glance)
3. [Control Flow](#-control-flow)
4. [User Functionalities](#-user-functionalities)
5. [Admin Functionalities](#-admin-functionalities)
6. [Shared Functionalities (Admin & User)](#-shared-functionalities-admin--user)
7. [How MVC Is Implemented](#-how-mvc-is-implemented)
8. [Future Enhancements](#-future-enhancements)
9. [License](#license)
10. [Acknowledgements](#acknowledgements)
11. [Contact](#contact)

---

## ⚙️ Setup Instructions (Start Here)

### ✅ Prerequisites

* Local server environment: **XAMPP**, **WAMP**, or **MAMP**
* PHP 7.x or higher
* MySQL 5.x or higher

### 📥 Cloning the Project

```bash
git clone https://github.com/your-username/banking-system-mvc.git
```

### 🗃️ Database Setup

1. Locate the `banking_system.sql` file included in the project.
2. Import it into MySQL:

   * Via phpMyAdmin:

     * Open `http://localhost/phpmyadmin`
     * Create a new DB (e.g., `banking_system`)
     * Import `banking_system.sql`
   * Or via MySQL CLI:

     ```bash
     mysql -u root -p banking_system < banking_system.sql
     ```

### 🔧 Configure Database Connection

In `config/db.php` or your DB config file:

```php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "banking_system";
```

### ▶️ Run the Application

Start Apache and MySQL in your server tool, then visit:

```
http://localhost/banking-system-mvc/
```

---

## 📁 Features at a Glance

* Full **MVC architecture**
* User authentication and role-based access
* Admin approval system for registration, loans, and user control
* Real-time data visualization using **Chart.js**
* Clean and functional dashboard for both user and admin

---

## 🔄 Control Flow

1. **Registration**: User signs up and is auto-redirected to the login page.
2. **Login & Role Check**:

   * If not approved:

     > *"You are not authorized to access this page right now. Please wait for admin approval. You will get an email soon."*
3. **Admin Approval**:

   * On approval:

     * Entry created in `accounts` table
     * Role (`client`) added in `roles` table
     * Role assigned to the user via foreign key in `users` table

---

## 👤 User Functionalities

* Register & login
* Pay bills
* Apply for loan (on approval, amount is added to user’s balance and shown on dashboard)
* Apply for card (pending future control)
* Deposit money
* View bills, transactions, and deposits using **Chart.js** with real data via **AJAX + JSON**
* Update avatar
* Edit profile info
* Change password

---

## 🛠 Admin Functionalities

* Add new users
* Delete users
* Approve or reject:

  * User registrations
  * Loan applications

---

## 🔐 Shared Functionalities (Admin & User)

* "Remember Me" login using cookies
* View and edit profile (via sessions)
* Change password
* Update avatar

---

## 🧠 How MVC Is Implemented

| Component      | Role                                                  |
| -------------- | ----------------------------------------------------- |
| **Model**      | Handles all database logic and queries                |
| **View**       | Displays the frontend (HTML/PHP templates)            |
| **Controller** | Bridges the model and view; handles all request logic |

### 🛣 Example Workflow

User submits loan request → Controller validates and forwards → Model inserts into DB → Admin views it → On approval, model updates user balance → View updates UI.

---

## 🚧 Future Enhancements

* 💸 **Money transfer** between users
* 🛠️ Admin dashboard with full banking control
* 💳 Card approval and user-side card management

---

## Feedback

If you have any feedback or suggestions for this project, please feel free to reach out or submit an issue on the [GitHub repository](https://github.com/sszobaer/PharmacyApplicationManagementSystem/issues).

---

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

---

## Acknowledgements

Special thanks to:
- **Microsoft** for their development tools and platform.
- **Stack Overflow** and **GitHub** communities for their valuable support and resources.
- And Also <br>
🎓 **MD. AL-AMIN**  <br>
🎓 Assistant Professor, Department of Computer Science, AIUB <br>
I really appreciate your guidance in the development of this project.

---

## Contact

For more information, reach out to:

- **Email:** [ahmedsszobaer@gmail.com](mailto:ahmedsszobaer@gmail.com)
- **GitHub:** [S. S. Zobaer Ahmed](https://www.github.com/sszobaer)
- **Linkedin:** [S. S. Zobaer Ahmed](https://www.linkedin.com/in/s-s-zobaer-ahmed-209bab296?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app)
- **YouTube Channel:** [Code Craft Zobaer](https://www.youtube.com/@CodeCraftZobaer)


