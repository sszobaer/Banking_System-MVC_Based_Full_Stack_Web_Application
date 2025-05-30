<!-- ZOBAER AHMED -->
 <?php 
    session_start(); 
    if(isset($_SESSION['email'])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management</title>
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
    include_once "../view/header.php";
    include_once "../view/adminSidebar.php";
    require_once "../controller/loanApplicationController.php";
    $loans = showLoanApplications();
    ?>
    <div class="all-users">
        <div class="all-users-title">
            <h1>ALL Loan Applications</h1>
        </div>
        <div class="all-users-controls">
            <input type="text" id="search-reference"
                placeholder="Search Users">
            <a href="./addUsers.php" class="btn btn-add-user">Add New Users</a>
        </div>
        <div class="all-users-table-div">
            <table class="all-users-table">
                <thead>
                    <!-- [loan_id] => 1 [employment_type] => salaried 
                    [currency] => 0 [loan_type] => home 
                    [monthly_income] => 30000 
                    [loan_amount] => 5000000 
                    [acknowledgement_slip_no] => 982909221' -->
                    <tr>
                        <th>Loan Id</th>
                        <th>Loan Type</th>
                        <th>Monthly Income</th>
                        <th>Loan Amount</th>
                        <th>Tax Slip No.</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <?php if (!empty($loans)) { ?>
                    <tbody>
                        <?php foreach ($loans as $loan) { ?>
                            <tr>
                                <td><?=$loan['loan_id']?></td>
                                <td><?=$loan['employment_type']?></td>
                                <td><?=$loan['monthly_income']?></td>
                                <td><?=$loan['loan_amount']?></td>
                                <td><?=$loan['acknowledgement_slip_no']?></td>
                                <td>
                                    <a href="../controller/userManagementController.php?approveLoan=<?= $loan['loan_id']; ?>" class="approve" 
                                    onclick="return confirm('Are you sure you want to approve this user?');">Approve</a>
                                    <a href="../controller/userManagementController.php?rejectUser=<?= $loan['loan_id']; ?>" class="reject"
                                    onclick="return confirm('Are you sure you want to reject this user?');">Reject</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                <?php } else { ?>
                    <tbody>
                        <tr>
                            <td colspan="6">No users found.</td>
                        </tr>
                    </tbody>
                <?php } ?>

            </table>
        </div>
    </div>
</body>

</html>

<?php
    } else {
        header("Location: ../view/login.php");
        exit();
    }
?>