<?php
require_once '../model/accounts.php';
require_once '../model/users.php';
require_once '../model/connection.php';
require_once '../model/deposits.php';
//account_id	user_id	account_number	account_type	balance	currency	account_status	created_at	updated_at
function accountController(){
    $userId = $_GET['approveUser'];
    $user = [
        'user_id' => $userId
    ];
    $allUsers = fetchIndivisualUserbyID($user);

    $account = [
        'user_id' => $allUsers['user_id'],
        'account_number' => rand(1000000000, 9999999999),
        'account_type' => $allUsers['accountType'],
        'balance' => $allUsers['depositAmount'],
        'currency' => 'BDT',
        'account_status' => 'active',
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s')
    ];

    $status = insertAccounts($account);
    if($status){
        $_SESSION['account_number'] = $account['account_number'];
        approveUserByAdmin($user);
    } else{
        echo "Account creation failed.";
    } 
}

?>