<?php

include "../connect.php";

$user_id                 = filterRequest('user_id');
$order_address           = filterRequest('address');
$order_delivery_price    = filterRequest('delivery_price');
$order_price             = filterRequest('price');
$order_items       = filterRequest("items");

// Decode HTML entities to get the actual JSON string
// $order_items_json = html_entity_decode($order_items_json);

// If $order_items_json is empty or not set, initialize it as an empty array
// if (empty($order_items_json)) {
//     $order_items = [];
// } else {
//     // Trim the JSON data
//     $trimmed_order_items_json = trim($order_items_json);
    
//     // Debugging JSON string
//     echo "Trimmed JSON String: " . $trimmed_order_items_json;
    
//     // Decode the JSON data
//     $order_items = json_decode($trimmed_order_items_json, true);
    
//     // Check for JSON decoding errors
//     if ($order_items === null && json_last_error() !== JSON_ERROR_NONE) {
//         die("Error: Unable to decode JSON data for order items. Error Message: " . json_last_error_msg());
//     }
// }

$stmt = $con->prepare("SELECT * FROM `orders` WHERE order_user_id=?");
$stmt->execute(array($user_id));

$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("id must be unique");
} else {
    $data = array(
        "order_user_id"         => $user_id,
        "order_address"         => $order_address,
        "order_delivery_price"  => $order_delivery_price,
        "order_price"           => $order_price,
        "order_items"           => $order_items,
    );
    
    insertData("orders", $data);
}


?>
