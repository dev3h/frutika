<?php

session_start();

$id = $_GET['id'];
unset($_SESSION['cart'][$id]);
$res = [
    'data' => sizeof($_SESSION['cart']),
];
echo json_encode($res);
return false;

