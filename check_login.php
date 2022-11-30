<?php 

if(!isset($_SESSION['id'])) {
    header('location: /login-register');
    exit;
}