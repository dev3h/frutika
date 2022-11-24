<?php

session_start();

if(!isset($_SESSION['id'])) {
    header('location: login-register');
    exit;
}
require_once './classes/db.php';
$conn = Database::getConnection();

if (empty($_GET['id'])) {
    $res = [
        'status' => 204,
        'message' => 'ID không tồn tại'
    ];
    echo json_encode($res);
    return false;
}
$id = $conn->real_escape_string($_GET['id']);

$sql = "SELECT * FROM products WHERE id='$id'";
$result = Database::getInstance()->query($sql);
$each = $result->fetch_assoc();
$name = $each['name'];
if (empty($_SESSION['cart'][$id])) {

    $_SESSION['cart'][$id]['name'] = $name;
    $_SESSION['cart'][$id]['photo'] = $each['photo'];
    $_SESSION['cart'][$id]['price'] = $each['price'];
    $_SESSION['cart'][$id]['quantity'] = 1;

    $res = [
        'status' => 200,
        'message' => "Thêm thành công " . $name . ' vào giỏ hàng',
        'data' => sizeof($_SESSION['cart'])
    ];
} else {
    $_SESSION['cart'][$id]['quantity']++;

    $res = [
        'status' => 200,
        'message' => 'Tăng số lượng ' . $name . ' thành công',
    ];
}
echo json_encode($res);
return false;
