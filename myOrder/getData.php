<?php

require_once '../classes/db.php';

function getOrder($customer_id, $status, $create_at)
{
    $sql = "SELECT orders.*, quantity, products.name as product_name,price, photo FROM orders 
JOIN order_product ON orders.id = order_product.order_id
JOIN products ON order_product.product_id = products.id
WHERE orders.customer_id='$customer_id' AND status='$status' AND create_at='$create_at'";
   return Database::getInstance()->query($sql);
}

function getCreateAt($customer_id, $status) {
    $sql="SELECT create_at FROM orders WHERE customer_id='$customer_id' AND status='$status' ORDER BY create_at DESC";
    return Database::getInstance()->query($sql);
}
