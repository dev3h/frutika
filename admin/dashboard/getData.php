<?php
require_once '../includes/sidebar.php';
require_once '../classes/db.php';

$query = "SELECT COUNT(*) AS sumOfCategory FROM categories";
$result = Database::getInstance()->query($query);
$categories = $result->fetch_assoc();

$query = "SELECT COUNT(*) AS sumOfProduct FROM products";
$result = Database::getInstance()->query($query);
$products = $result->fetch_assoc();

$query = "SELECT COUNT(*) AS sumOfCustomerJoined FROM customers";
$result = Database::getInstance()->query($query);
$customersJoined = $result->fetch_assoc();

$query = "SELECT COUNT(*) AS sumOfPost FROM posts";
$result = Database::getInstance()->query($query);
$posts = $result->fetch_assoc();