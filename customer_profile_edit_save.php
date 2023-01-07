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
    header('location:customer_profile_edit.php');
    exit;
}

//Update customer
$sql = "UPDATE customer SET 
username = '{$_POST['username']}',
password = '{$_POST['password']}', 
first_name = '{$_POST['first_name']}',
last_name = '{$_POST['last_name']}',
phone = '{$_POST['phone']}',
email = '{$_POST['email']}' 
WHERE customer.id = '{$_POST['id']}'";

$update = set($sql);

if ($update == true) {
    $_SESSION['user'] = $_POST;
    $_SESSION['user']['type'] = 'customer';
    $_SESSION['alert'] = 'แก้ไขข้อมูลสำเร็จ';
    $_SESSION['alert-class'] = 'alert-success';
    header('location:customer_profile.php');
    exit;
} else {
    $_SESSION['alert'] = 'ไม่สามารถบันทึกข้อมูลได้';
    $_SESSION['alert-class'] = 'alert-danger';
    header('location:customer_profile.php');
    exit;
}
?>