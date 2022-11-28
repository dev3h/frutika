<?php

session_start();
unset($_SESSION['id']);
unset($_SESSION['displayname']);
unset($_SESSION['role']);
unset($_SESSION['token']);

// setcookie('remember', null, -1);

header('location:/admin');
exit;
