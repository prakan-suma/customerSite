<?php

include('db.php');
customerAuth();
if (empty($_GET['purid'])) {
    header('Location: index.php');
}
$purid = $_GET['purid'];

//================================================

$sql = "SELECT p.* , c.first_name, c.last_name 
from purchase p 
inner join customer c on c.id = p.customer_id 
where p.id = " . $purid;
$purchase = get($sql)[0];

echo '<pre>';
var_dump($purchase);
echo '</pre>';
//================================================

$sql = "SELECT * from purchase_list pl 
inner join product p on p.id = pl.product_id 
where purchase_id = " . $purid;
$cart = get($sql)[0];

echo '<pre>';
var_dump($cart);
echo '</pre>';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar">
        <div class="m-auto">
            <a href="index.php">home</a>
            <a href="customer_register.php">register</a>
            <a href="customer_profile.php">Profile</a>
            <a href="customer_cart.php">Cart</a>
            <a href="customer_Purchase.php">Purchase</a>
            <a href="logout.php">logout</a>
        </div>
        <h3><?= user('type'); ?> </h3>
    </nav>

    <main class="p-5">
        <div class="text-center rounded m-auto">
            <h3>ใบเสร็จ</h3>
            <div class="d-flex justify-content-between">
                <p>รหัสใบสั่งซื้อที่</p>
                <p><?= $purchase['id'] ?></p>
            </div>
            <div class="d-flex justify-content-between">
                <p>วันที่สั่งซื้อ</p>
                <p><?= $purchase['buy_date'] ?></p>
            </div>
            <div class="d-flex justify-content-between">
                <p>รหัสสินค้า</p>
                <p><?= $cart['id'] ?></p>
            </div>
            <div class="d-flex justify-content-between">
                <p>ชื่อสินค้า</p>
                <p><?= $cart['name'] ?></p>
            </div>
            <div class="d-flex justify-content-between">
                <p>จำนวน</p>
                <p><?= $cart['amount'] ?></p>
            </div>
            <div class="d-flex justify-content-between">
                <p>ราคาสินค้า</p>
                <p><?= $cart['price'] ?></p>
            </div>
            <br>

        </div>
        <div class="text-right">
            <p>ชื่อผู้ซื้อ : <?= $purchase['first_name'] ?> <?= $purchase['last_name'] ?></p>
            <p>ภาษี : <?= $purchase['vat'] ?> บาท</p>
            <p>ค่าจัดส่ง : <?= $purchase['shipping_price'] ?> บาท</p>
            <p class="bg-info text-white p-2">รวม : <?= $purchase['net_price'] ?> บาท</p>
        </div>
    </main>


    </section>
















    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>
<?php
unset($_SESSION['alert']);
unset($_SESSION['alert-class']);
?>