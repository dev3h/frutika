<?php

session_start();
require_once './classes/db.php';

$conn = Database::getConnection();

$product_quantity = 1;
$customer_id = $_SESSION['id'] ?? null;
if ($customer_id == null) {
    $res = [
        'status' => 307,
        'message' => 'chưa đăng nhập',
        'redirect' => 'login-register',
    ];
    echo json_encode($res);
    return false;
}

if (isset($_POST['add_product_to_cart'])) {
    $product_quantity = $conn->real_escape_string($_POST['quantity-product']);
}

if (isset($_GET['id'])) {
    $id = $conn->real_escape_string($_GET['id']);
} else {
    $id = $conn->real_escape_string($_POST['id']);
}

$sql = "SELECT * FROM products WHERE id='$id'";
$result = Database::getInstance()->query($sql);
if ($result->num_rows == 0) {
    $res = [
        'status' => 204,
        'message' => 'ID không tồn tại',
    ];
    echo json_encode($res);
    return false;
} else {
    $each = $result->fetch_assoc();
    $name = $each['name'];
}
if (empty($_SESSION['cart'][$customer_id][$id])) {

    $_SESSION['cart'][$customer_id][$id]['name'] = $name;
    $_SESSION['cart'][$customer_id][$id]['photo'] = $each['photo'];
    $_SESSION['cart'][$customer_id][$id]['price'] = $each['price'];
    $_SESSION['cart'][$customer_id][$id]['quantity'] = $product_quantity;

    $res = [
        'status' => 200,
        'message' => "Thêm thành công " . $name . ' vào giỏ hàng',
        'data' => sizeof($_SESSION['cart'][$customer_id]),
    ];
} else {
    $_SESSION['cart'][$customer_id][$id]['quantity'] += $product_quantity;

    $res = [
        'status' => 200,
        'message' => 'Tăng số lượng ' . $name . ' thành công',
    ];
}
echo json_encode($res);
return false;
