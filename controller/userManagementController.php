<?php
    require_once "../model/connection.php";
    function deleteUser(){
        $conn = getConnection();
        $id = $_GET['deleteUser'];
        $query = "DELETE FROM users WHERE user_id = $id";
        
        if(mysqli_query($conn, $query)){
            echo "Deleted Successfully";
        }else{
            echo "Invalid";
        }
    }
    deleteUser();
?>