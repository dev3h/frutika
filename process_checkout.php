<?php
session_start();
$customer_id = $_SESSION['id'];
require './classes/db.php';

$conn = Database::getConnection();

try {
    $name_receiver = $conn->real_escape_string($_POST['name_receiver']);
    $phone_receiver = $conn->real_escape_string($_POST['phone_receiver']);
    $address_receiver = $conn->real_escape_string($_POST['address_receiver']);

    $cart = $_SESSION['cart'][$customer_id];

    $total_price = 0;
    foreach ($cart as $each) {
        $total_price += $each['quantity'] * $each['price'];
    }

    $status = 0;

    $sql = "INSERT INTO orders( customer_id ,  name_receiver ,  phone_receiver ,  address_receiver ,  status ,  totalPrice ) 
VALUES ('$customer_id' ,  '$name_receiver' ,  '$phone_receiver' ,  '$address_receiver' ,  '$status' ,  '$total_price')
";
    Database::getInstance()->query($sql);

    $sql = "SELECT MAX(id) FROM orders WHERE customer_id = '$customer_id'";
    $result = Database::getInstance()->query($sql);
    $order_id = $result->fetch_assoc()['MAX(id)'];

    foreach ($cart as $product_id => $each) {
        $quantity = $each['quantity'];
        $sql = "INSERT INTO order_product( order_id ,  product_id ,  quantity )
    VALUES ('$order_id' ,  '$product_id' ,  '$quantity')";
        Database::getInstance()->query($sql);
    }
    // $_SESSION['order_id'] =$order_id;
    // $_SESSION['totalPrice']= $total_price;
    // $_SESSION['payment'] = $cart;

    unset($_SESSION['cart']);

    $res = [
        'status' => 200,
        'message' => 'Đặt hàng thành công'
    ];
    echo json_encode($res);
    return false;
} catch (\Throwable $e) {
    $res = [
        'status' => 500,
        'message' => "Lỗi" . $e->getMessage()
    ];
    echo json_encode($res);
    return false;
}
