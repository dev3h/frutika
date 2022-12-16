<?php
require '../classes/db.php';
$conn = Database::getConnection();
session_start();
$customer_id = $_SESSION['id'];

// UPDATE
if (isset($_POST['cancel_my_order'])) {
    $id = $conn->real_escape_string($_POST['order_id']);
    $status = $conn->real_escape_string($_POST['status']);


    $query = "UPDATE orders SET status = $status WHERE id = '$id' AND customer_id = '$customer_id'";
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
