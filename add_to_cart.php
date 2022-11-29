<?php

session_start();
require_once './classes/db.php';
$conn = Database::getConnection();

$product_quantity = 1;
if (!isset($_SESSION['id'])) {
    $res = [
        'status' => 302,
        'message' => 'Yêu cầu đăng nhập',
        'redirect' => '/login-register'
    ];
    echo json_encode($res);
    return false;
};
if (isset($_POST['add_product_to_cart'])) {
    $product_quantity = $conn->real_escape_string($_POST['quantity-product']);
}

// if (empty($_GET['id']) || empty($_POST['id'])) {
//     $res = [
//         'status' => 204,
//         'message' => 'ID không tồn tại'
//     ];
//     echo json_encode($res);
//     return false;
// }
if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
} else {
    $id = $conn->real_escape_string($_POST['id']);
}

$sql = "SELECT * FROM products WHERE id='$id'";
$result = Database::getInstance()->query($sql);
$each = $result->fetch_assoc();
$name = $each['name'];
if (empty($_SESSION['cart'][$id])) {

    $_SESSION['cart'][$id]['name'] = $name;
    $_SESSION['cart'][$id]['photo'] = $each['photo'];
    $_SESSION['cart'][$id]['price'] = $each['price'];
    $_SESSION['cart'][$id]['quantity'] = $product_quantity;

    $res = [
        'status' => 200,
        'message' => "Thêm thành công " . $name . ' vào giỏ hàng',
        'data' => sizeof($_SESSION['cart'])
    ];
} else {
    $_SESSION['cart'][$id]['quantity'] += $product_quantity;

    $res = [
        'status' => 200,
        'message' => 'Tăng số lượng ' . $name . ' thành công',
    ];
}
echo json_encode($res);
return false;
