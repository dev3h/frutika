<?php

session_start();

$customer_id = $_SESSION['id'];
$id = $_GET['id'];
unset($_SESSION['cart'][$customer_id][$id]);
$res = [
    'data' => sizeof($_SESSION['cart'][$customer_id]),
];
echo json_encode($res);
return false;

