<?php

session_start();

$id = $_GET['id'];
$type = $_GET['type'];
$customer_id = $_SESSION['id'];

if ($type == '0') {

    if ($_SESSION['cart'][$customer_id][$id]['quantity'] > 1) {
        $_SESSION['cart'][$customer_id][$id]['quantity']--;
    } else {
        unset($_SESSION['cart'][$customer_id][$id]);
    }
} else {
    $_SESSION['cart'][$customer_id][$id]['quantity']++;
}
$res = [
    'data' => sizeof($_SESSION['cart'][$customer_id]),
];
echo json_encode($res);
return false;
