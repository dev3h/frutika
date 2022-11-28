<?php
try {
    $username = $_POST['username'];
    $password = $_POST['password'];

    require_once './classes/db.php';
    if (empty($username) || empty($password)) {
        throw new Exception("Vui lòng nhập đầy đủ thông tin");
    }
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";
    $result = Database::getInstance()->query($sql);

    $num_rows = $result->num_rows;
    if ($num_rows > 0) {
        $each = $result->fetch_assoc();

        session_start();
        $_SESSION['username'] = $username;
        $_SESSION['displayName'] = $each['displayname'];
        $_SESSION['photo'] = $each['photo'];
        $_SESSION['role'] = $each['role'];

        header('location: dashboard.php');
        exit;
    } else {
        throw new Exception("Tên đăng nhập hoặc mật khẩu không đúng");
    }
} catch (\Throwable $e) {
    session_start();
    $_SESSION['error'] = $e->getMessage();
    header('location: index.php');
}
