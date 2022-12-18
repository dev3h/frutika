<?php
session_start();
require_once '../classes/db.php';

require_once '../path.php';
$conn = Database::getConnection();

// GET customer info by id
if (isset($_GET['customer_id'])) {
    $customer_id = $conn->real_escape_string($_GET['customer_id']);

    $query = "SELECT SUM(totalPrice) as totalPricePayment, email, create_at, customers.name as customer_name FROM orders JOIN customers ON customer_id = customers.id
                                        WHERE customer_id = '$customer_id' GROUP BY customer_id";
    $query_run = Database::getInstance()->query($query);

    if ($query_run->num_rows == 1) {
        $accounts = $query_run->fetch_assoc();
        $res = [
            'status' => 200,
            'message' => 'Lấy thông tin khách hàng thành công',
            'data' => $accounts
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 404,
            'message' => 'Không tìm thấy thông tin khách hàng'
        ];
        echo json_encode($res);
        return false;
    }
}
