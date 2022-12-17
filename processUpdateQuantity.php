<?php

session_start();
require_once './check_login.php';
$id = $_GET['id'];
$type = $_GET['type'];

if ($type == '0') {

    if ($_SESSION['cart'][$id]['quantity'] > 1) {
        $_SESSION['cart'][$id]['quantity']--;
    } else {
        unset($_SESSION['cart'][$id]);
    }
} else {
    $_SESSION['cart'][$id]['quantity']++;
}
$res = [
    'data' => sizeof($_SESSION['cart']),
];
echo json_encode($res);
return false;
