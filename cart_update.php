<?php
include "db.php";

// เช็คว่ามีการล็อกอิน และ user type ถูกต้อง
if (!isset($_SESSION['login']) || $_SESSION['user_type'] == 'seller') {
    header('location:login.php');
    exit;
}elseif(!isset($_GET['pid'])){
    header('location:index.php');
    exit;
}

// foreach 
$cart = $_SESSION['cart'];

$_SESSION['cart_sum']['total'] = 0;

foreach($cart as $c){
    $pid = $c['id'];
    $_SESSION['cart'][$pid]['amount'] = $_POST['amount'][$pid];
    $_SESSION['cart'][$pid]['sum'] = $_SESSION['cart'][$pid]['price'] * $_SESSION['cart'][$pid]['amount'];
    
    //คำณวนราคาใหม่
    $_SESSION['cart_sum']['total'] += $c['sum'];
    $_SESSION['cart_sum']['vat'] = $_SESSION['cart_sum']['total'] * 0.07;
    $_SESSION['cart_sum']['shipping'] = 40;
    $_SESSION['cart_sum']['netprice'] = $_SESSION['cart_sum']['total'] + $_SESSION['cart_sum']['vat'] + $_SESSION['cart_sum']['shipping'];
}
header('location:cart.php');

?>