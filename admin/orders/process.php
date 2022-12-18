<?php
session_start();
require '../classes/db.php';

$conn = Database::getConnection();

// UPDATE
if (isset($_POST['update_order']) || isset($_POST['cancel_order'])) {
    $id = $conn->real_escape_string($_POST['category_id']);
    $status = $conn->real_escape_string($_POST['status']);


    $query = "UPDATE orders SET status = $status WHERE id = '$id'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $res = [
            'status' => 200,
            'message' => 'Cập nhập trạng thái đơn hàng thành công'
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Cập nhập trạng thái đơn hàng thất bại thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}

if (isset($_GET['order_id'])) {
    $order_id = $conn->real_escape_string($_GET['order_id']);

    $query = "SELECT * FROM order_product 
        JOIN products ON products.id = order_product.product_id WHERE order_id = '$order_id' ";
    $query_run = Database::getInstance()->query($query);
    $arr = [];



    if ($query_run) {
        foreach ($query_run as $each) {
            $arr[] = [
                'photo' => $each['photo'],
                'name' => $each['name'],
                'price' => $each['price'],
                'quantity' => $each['quantity']
            ];
        }
        $res = [
            'status' => 200,
            'message' => 'Lấy đơn hàng thành công',
            'data' => $arr
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Không tìm thấy đơn hàng'
        ];
        echo json_encode($res);
        return false;
    }
}
