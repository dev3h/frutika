<?php

require 'classes/db.php';
$conn = Database::getConnection();

// login
if (isset($_POST['login'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    if (isset($_POST['remember'])) {
        $remember = true;
    } else {
        $remember = false;
    }

    if ($email == NULL || $password == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "SELECT * FROM customers WHERE email = '$email' AND password = '$password'";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        session_start();
        $each = $query_run->fetch_assoc();

        $id = $each['id'];
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];

        if ($remember) {
            $token = uniqid('user_', true);
            $sql = "UPDATE customers SET token = '$token' WHERE id='$id'";
            Database::getInstance()->query($sql);
            setcookie('remember', $token, time() + 60 * 60 * 24 * 30);
        }

        $res = [
            'status' => 200,
            'message' => 'Đăng nhập thành công',
        ];
        echo json_encode($res);
        return false;
    } else {
        $res = [
            'status' => 500,
            'message' => 'Đăng nhập thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}
