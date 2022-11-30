<?php

if (!isset($_SESSION['role']) && !isset($_SESSION['active']) && $_SESSION['active'] != 1 && $_SESSION['role'] != 1) {
    header('location: /admin/dashboard');
    exit;
}
