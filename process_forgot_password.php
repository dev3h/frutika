<?php

function current_url()
{
    $url = "http://" . $_SERVER['HTTP_HOST'];
    return $url;
}

$email = $_POST['email'];

require './classes/db.php';

$sql = "SELECT id, name FROM customers WHERE email = '$email'";

$result =Database::getInstance()->query($sql);
if ($result->num_rows == 1) {
    $each = $result->fetch_assoc();
    $id = $each['id'];
    $name = $each['name'];
    $sql = "DELETE FROM forgot_password WHERE customer_id = '$id'";
    $result= Database::getInstance()->query($sql);
    $token = uniqid();
    $sql = "INSERT INTO forgot_password(customer_id, token) VALUES('$id', '$token')";
    Database::getInstance()->query($sql);

    $link = current_url() . '/change_new_password.php?token=' . $token;
    require './mail.php';
    $title = 'Đổi mật khẩu';
    $content = "Click vào link sau để đổi mật khẩu: <a href='$link'>Đổi mật khẩu</a>";
    sendMail($email, $name, $title, $content);
}
