<?php
include "db.php";

// เช็คว่ามีการล็อกอิน และ user type ถูกต้อง
customerAuth();
if(!isset($_GET['pid'])){
    header('location:index.php');
    exit;
}

//เก็บข้อมูล 
$cart = $_SESSION['cart'];
$uid = $_SESSION['user']['id'];
$buyDate = date('Y-m-d H:i:s');
$total = $_SESSION['cart_sum']['total'];
$vat = $_SESSION['cart_sum']['vat'];
$shipp = $_SESSION['cart_sum']['shipping'];
$nPrice = $_SESSION['cart_sum']['net_price'];

//save
$sql = "insert into purchase values(null,'$uid','$buyDate','$total','$vat','$shipp','$nPrice')";
$insert = set($sql);

//เก็บ ID ที่ insert ล่าสุดเข้า purID  
$purId = mysqli_insert_id($conn);

//loop ข้อมูลใน cart into variable and insert into table >u<
foreach($cart as $c){
    $pid = $c['id'];
    $amount = $c['amount'];
    $price = $c['price'];
    $sum = $c['sum'];
    $sql = "insert into purchase_list values('$purId','$pid','$amount','$price','$sum')";
    $inPurl = set($sql);
}

//ลบข้อมูล ในหน้า cart 
unset($_SESSION['cart']);
unset($_SESSION['cart_summary']);

//redirect
header('location:cart_detail.php?purid='.$purId);


?>