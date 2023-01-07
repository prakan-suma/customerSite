<?php
include('db.php');
if (empty($_SESSION['cart'])) {
    $_SESSION['alert'] = "ยังไม่มีสินค้าในตะกล้า";
    $_SESSION['alert-class'] = "ยังไม่มีสินค้าในตะกล้า";
}
$cart = $_SESSION['cart'] ?? [];
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
        <?= alert(); ?>
        <h4>ตะกล้าสินค้า</h4>
        <form action="cart_update.php" method="POST">
            <div>

                <table class="table table-bordered table-hover">
                    <tr>
                        <th>รหัสสินค้า</th>
                        <th>ชื่อสินค้า</th>
                        <th>ราคา</th>
                        <th>จำนวน</th>
                        <th>ราคารวม</th>
                    </tr>
                    <?php
                    foreach ($cart as $c) {
                    ?>
                        <tr>
                            <td><?= $c['id'] ?></td>
                            <td><?= $c['name'] ?></td>
                            <td><?= $c['price'] ?></td>
                            <td><input name="amount[<?= $c['id'] ?>]" value="<?= $c['amount'] ?>"></td>
                            <td><?= $c['sum'] ?></td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary">คำณวนราคาใหม่</button>
                <a href="cart_confirm.php" class="btn btn-success "> ยืนยันสั่งซื้อ </a>
            </div>
        </form>
        <div class="row">
            <div class="col-md-1 offset-md-9">
                ราคารวม
            </div>
            <div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['total'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-9">
                ภาษี 7%
            </div>
            <div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['vat'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-9">
                ค่าขนส่ง
            </div>
            <div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['shipping'] ?></div>
        </div>
        <div class="row">
            <div class="col-md-1 offset-md-9">
                ราคาสุทธิ
            </div>
            <div class="col-md-2 text-right"><?= $_SESSION['cart_summary']['net_price'] ?></div>
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