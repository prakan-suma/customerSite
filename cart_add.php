<?php
include "db.php";

// เช็คว่ามีการล็อกอิน และ user type ถูกต้อง
customerAuth();

if(!isset($_GET['pid'])){
    header('location:index.php');
    exit;
}

$pid = $_GET['id'];
$product = get("SELECT * FROM product where id = $pid");

if ($product) {
    // ตรวจสอบว่าสินค้าอยู่ในตะกร้าแล้วsหรือป่าว
    if (!isset($_SESSION['cart'][$pid])) {
        //เพิ่มสินค้าลงตะกร้า
        $_SESSION['cart'][$pid] = $product[0];
        $_SESSION['cart'][$pid]['amount'] = 1;
        $_SESSION['cart'][$pid]['sum'] = $_SESSION['cart'][$pid]['price'] * $_SESSION['cart'][$pid]['amount'];
    } else {
        // อัพเดทจำนวนสินค้าในตะกร้า
        $_SESSION['cart'][$pid]['amount']++;
        $_SESSION['cart'][$pid]['sum'] = $_SESSION['cart'][$pid]['price'] * $_SESSION['cart'][$pid]['amount'];
    }
    
    $_SESSION['cart_sum']['total'] = 0;
    //loop cart arrays เพื่อเก็บ cart summary
    foreach($_SESSION['cart'] as $c){
        $_SESSION['cart_sum']['total'] += $c['sum'];
        $_SESSION['cart_sum']['vat'] = $_SESSION['cart_sum']['total'] * 0.07;
        $_SESSION['cart_sum']['shipping'] = 40;
        $_SESSION['cart_sum']['netprice'] = $_SESSION['cart_sum']['total'] + $_SESSION['cart_sum']['vat'] +  $_SESSION['cart_sum']['shipping'];
    }
    
    //redirect 
    header('location:cart.php');
}
