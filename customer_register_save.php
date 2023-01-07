<?php
include 'db.php';

// Username duplicate check
$stmt = $conn->prepare("(select username from customer where username = ?) union all (select username from seller where username = ?)");
$stmt->bind_param("ss", $_POST['username'], $_POST['username']);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['alert'] = 'มีผู้ใช้นี้อยู่แล้ว';
    $_SESSION['alert-class'] = 'alert-warning';
    header('location:customer_register.php');
    exit;
}

//passwoed not match check 
if ($_POST['password'] != $_POST['re-password']) {
    $_SESSION['alert'] = 'รหัสผ่านไม่ตรงกัน';
    $_SESSION['alert-class'] = 'alert-danger';
    header('location:customer_register.php');
    exit;
};

$sql = "INSERT INTO customer value (null,
'{$_POST['username']}',
'{$_POST['password']}',
'{$_POST['first_name']}',
'{$_POST['last_name']}',
'{$_POST['phone']}',
'{$_POST['email']}')";

$insert = set($sql);
// var_dump($insert);
if ($insert == true) {
    $_SESSION['alert'] = 'ลงทะเบียนสำเร็จ';
    $_SESSION['alert-class'] = 'alert-seccess';
    header('location:login.php');
    exit;
} else {
    $_SESSION['alert'] = 'รหัสผ่านไม่ตรงกัน';
    $_SESSION['alert-class'] = 'alert-danger';
    header('location:customer_register.php');
    exit;
}
