<?php
// Include the database connection file
include_once 'db.php';

$seller_result = get("SELECT * FROM seller WHERE username = '{$_POST['username']}' AND password = '{$_POST['password']}'");
$customer_result = get("SELECT * FROM customer WHERE username = '{$_POST['username']}' AND password = '{$_POST['password']}'");

if (count($seller_result) >= 1 ) {
    $_SESSION['login'] = 'true';
    $_SESSION['user'] = $seller_result[0];
    $_SESSION['user']['type'] = 'seller';
    header('location:seller_profile.php');

} elseif (count($customer_result) >= 1) {
    $_SESSION['login'] = 'true';
    $_SESSION['user'] = $customer_result[0];
    $_SESSION['user']['type'] = 'customer';
    header('location:customer_profile.php');
}

?>
 