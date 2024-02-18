<?php

include "../connect.php";
$order_user_id = $_GET["order_user_id"];
$orders = getData("orders", "order_user_id=$order_user_id");

// Check if orders is iterable before processing
if (is_iterable($orders)) {
    foreach ($orders as &$order) {
        // Check if order_items is a JSON string before decoding
        if (is_string($order['order_items'])) {
            // Do nothing, keep the order_items as is
        } else {
            $order['order_items'] = array();
        }
    }
} else {
    // Handle the case where $orders is not iterable
    $orders = array();
}

// Now $orders contains order_items in the same shape as they appear in the database

?>
