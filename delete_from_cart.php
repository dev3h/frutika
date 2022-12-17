<?php

session_start();
require_once './check_login.php';

$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
$res = [
    'data' => sizeof($_SESSION['cart']),
];
echo json_encode($res);
return false;

