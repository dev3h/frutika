<?php

if (!isset($_SESSION['role'] )&& !isset($_SESSION['active']) && $_SESSION['active'] != 1 ) {
    header('location: /admin/index.php');
}
