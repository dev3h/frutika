<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);

setcookie('remember', null, -1);
// $_COOKIE['remember'] = null;
unset($_SESSION['token']);

header('location: index.php');
