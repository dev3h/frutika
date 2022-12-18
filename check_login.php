<?php

if (!isset($_SESSION['id'])) {
    $res = [
        'status' => 302,
        'message' => 'Yêu cầu đăng nhập',
        'redirect' => '/login-register'
    ];
    echo json_encode($res);
    return false;
};