<?php

$token = $_POST['token'];
$password = $_POST['password'];

require './classes/db.php';

$sql = "SELECT customer_id FROM forgot_password WHERE token = '$token'";
$result = Database::getInstance()->query($sql);
if ($result->num_rows === 0) {
    header('location:index.php');
    exit;
}
$customer_id = $result->fetch_assoc()['customer_id'];
$sql = "UPDATE customers SET password = '$password' WHERE id = '$customer_id'";
Database::getInstance()->query($sql);

$sql = "DELETE FROM forgot_password WHERE token = '$token'";
Database::getInstance()->query($sql);
