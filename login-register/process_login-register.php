<?php
require_once '../path.php';
require_once ROOT . 'classes/db.php';
$conn = Database::getConnection();

// login
function createToken($id) {
    $token = uniqid('user_', true);
    $sql = "UPDATE customers SET token = '$token' WHERE id='$id'";
    Database::getInstance()->query($sql);
    setcookie('remember', $token, time() + 60 * 60 * 24 * 30);
    // $_SESSION['token'] = $token;
}

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

    if ($query_run->num_rows > 0) {
        session_start();
        $each = $query_run->fetch_assoc();

        $id = $each['id'];
        $_SESSION['id'] = $each['id'];
        $_SESSION['name'] = $each['name'];

        if ($remember) {
            createToken($id);
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
            'message' => 'Email hoặc mật khẩu không đúng'
        ];
        echo json_encode($res);
        return false;
    }
}

// register
if (isset($_POST['register'])) {
    $name = $conn->real_escape_string($_POST['name']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);

    if ($email == NULL || $password == NULL || $name == NULL || $phone_number == NULL || $address == NULL) {
        $res = [
            'status' => 422,
            'message' => 'Vui lòng nhập đầy đủ thông tin'
        ];
        echo json_encode($res);
        return false;
    }

    $sql = "SELECT COUNT(*) FROM customers WHERE email = '$email'";
    $result = Database::getInstance()->query($sql);

    if ($result->fetch_assoc() == 1) {
        $res = [
            'status' => 303,
            'message' => 'Email đã tồn tại'
        ];
        echo json_encode($res);
        return false;
    }

    $query = "INSERT INTO customers (name, email, password, phone_number, address) VALUES ('$name', '$email', '$password', '$phone_number', '$address')";
    $query_run = Database::getInstance()->query($query);

    if ($query_run) {
        $sql = "SELECT id from customers WHERE email = '$email'";
        $result = Database::getInstance()->query($sql);
        if($result->num_rows == 1) {
            $id = $result->fetch_assoc()['id'];
            $_SESSION['id'] =$id;
            $_SESSION['name'] = $each['name'];
            createToken($id);
            $res = [
                'status' => 200,
                'message' => 'Đăng ký thành công',
            ];
            echo json_encode($res);
            return false;
        }
    } else {
        $res = [
            'status' => 500,
            'message' => 'Đăng ký thất bại'
        ];
        echo json_encode($res);
        return false;
    }
}
