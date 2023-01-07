<?php include('db.php'); ?>
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
        <section class="">
            <div class="m-auto col-5 text-center">
                <h4>ข้อมูลของคุณ</h4>
                <?= alert() ?>
                <div class="d-flex">
                    <p>ชื่อผู้ใช้งาน : </p>
                    <p class=""> <?= user('username') ?></p>
                </div>

                <div class="d-flex">
                    <p>ชื่อจริง : </p>
                    <p><?= user('first_name') ?></p>
                </div>

                <div class="d-flex">
                    <p>นามกลุล : </p>
                    <p><?= user('last_name') ?></p>
                </div>

                <div class="d-flex">
                    <p>เบอร์มือถือ : </p>
                    <p><?= user('phone') ?></p>
                </div>
                <div class="d-flex">
                    <p>อีเมล : </p>
                    <p><?= user('email') ?></p>
                </div>
                <div class="d-flex">
                    <p>รหัสผ่าน : </p>
                    <p><?= user('password') ?></p>
                </div>
                <a href="customer_profile_edit.php?uid=<?= user('id') ?>" class="btn btn-outline-primary btn-block">แก้ไขข้อมูล</a>
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