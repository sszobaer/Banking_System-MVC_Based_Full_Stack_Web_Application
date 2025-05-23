<?php
    require_once "../model/users.php";
    function deleteUserController(){
        $userId = $_GET['deleteUser'];
        $user = [
            'user_id' => $userId
        ];
        deleteUserFromAdmin($user);
        header("Location: ../view/userManagement.php");
        exit();
    }

    function editUserController(){
        $userId = $_GET['editUser'];
        $user = [
            'user_id' => $userId
        ];
        $data=editUserFromAdmin($user);
        session_start();
        $_SESSION['user_id'] = $data['user_id'];    
        $_SESSION['firstName'] = $data['firstName'];
        $_SESSION['lastName'] = $data['lastName'];
        $_SESSION['email'] = $data['email'];
        $_SESSION['phoneNo'] = $data['phoneNo'];
        $_SESSION['nid/passport'] = $data['nid/passport'];
        $_SESSION['role_id'] = $data['role_id'];
        $_SESSION['presentAddress'] = $data['presentAddress'];
        $_SESSION['permanentAddress'] = $data['permanentAddress'];
        header("Location: ../view/editUserFromAdmin.php");
        exit();
        // print_r($_SESSION);
    }


    if($_SERVER["REQUEST_METHOD"] == "GET"){
        if(isset($_GET['deleteUser'])){
            deleteUserController();
        }
        if(isset($_GET['editUser'])){
            editUserController();
        }
    }
?>