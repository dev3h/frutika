<?php
session_start();
require_once './classes/db.php';
require_once './check_login.php';
$conn = Database::getConnection();

if (!isset($_SESSION['id'])) {
    $res = [
        'status' => 302,
        'message' => 'Yêu cầu đăng nhập',
        'redirect' => '/login-register'
    ];
    echo json_encode($res);
    return false;
} else {
    $customer_id = $_SESSION['id'];
}
if (isset($_POST['comment'])) {
    $product_id = $conn->real_escape_string($_POST['product_id']);
    $content = $conn->real_escape_string($_POST['content']);
    $rating = $_POST['rating'] ? $conn->real_escape_string($_POST['rating']) : null;

    if ($content == NULL || $rating == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $sql = "SELECT * FROM products_rating WHERE product_id = '$product_id' AND customer_id = '$customer_id'";
    $result = Database::getInstance()->query($sql);
    if ($result->num_rows == 1) {
        $res = [
            'status' => 401,
            'message' => 'Bạn chỉ được bình luận 1 lần ở sản phẩm này'
        ];
        echo json_encode($res);
        return false;
    } else {
        $query = "INSERT INTO products_rating (product_id, customer_id, comment, rating) VALUES ('$product_id', '$customer_id', '$content', '$rating')";
        $query_run = Database::getInstance()->query($query);

        if ($query_run) {
            $res = [
                'status' => 200,
                'message' => 'Bình luận thành công'
            ];
            echo json_encode($res);
            return false;
        } else {
            $res = [
                'status' => 500,
                'message' => 'Bình luận thất bại'
            ];
            echo json_encode($res);
            return false;
        }
    }
}
