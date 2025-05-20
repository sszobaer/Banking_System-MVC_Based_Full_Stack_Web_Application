<!-- ZOBAER AHMED -->
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
    ?>
    <div class="all-users">
        <div class="all-users-title">
            <h1>ALL USERS</h1>
        </div>

        <div class="all-users-controls">
            <input type="text" id="search-reference"
                placeholder="Search Users">
            <a href="#" class="btn btn-add-user">Add New Users</a>
        </div>
        <div class="all-users-table-div">
            <table class="all-users-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                        <th>Actions</th>
                        <th>Status Control</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>S. S. Zobaer Ahmed</td>
                        <td>zobaer@fake.com</td>
                        <td>Admin</td>
                        <td class="active">Active</td>
                        <td>
                            <a href="./editUser.php" class="edit">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                        <td>
                            <button class="approve">Approve</button>
                            <button class="reject">Reject</button>
                        </td>
                    </tr>
                    <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td class="active">Active</td>
                        <td>
                            <a href="./editUser.php" class="edit">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                        <td>
                            <button class="approve">Approve</button>
                            <button class="reject">Reject</button>
                        </td>
                    </tr>
                    <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td class="inactive">Inactive</td>
                        <td>
                            <a href="./editUser.php" class="edit">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                        <td>
                            <button class="approve">Approve</button>
                            <button class="reject">Reject</button>
                        </td>
                    </tr>
                    <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td class="active">Active</td>
                        <td>
                            <a href="./editUser.php" class="edit">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                        <td>
                            <button class="approve">Approve</button>
                            <button class="reject">Reject</button>
                        </td>
                    </tr>
                    <tr>
                        <td>--</td>
                        <td>--</td>
                        <td>--</td>
                        <td class="active">Active</td>
                        <td>
                            <a href="./editUser.php" class="edit">Edit</a>
                            <a href="#" class="delete">Delete</a>
                        </td>
                        <td>
                            <button class="approve">Approve</button>
                            <button class="reject">Reject</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>