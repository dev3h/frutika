<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['name']);

// setcookie('remember', '', time() - 60 * 60 * 24 * 15);
unset($_SESSION['token']);

header('location: /index.php');
