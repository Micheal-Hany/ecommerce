<?php
include "../connect.php";

$product_id     = filterRequest("product_id");
$reviewer_name  = filterRequest('reviewer');
$review_note    = filterRequest('note');
$review_rate    = filterRequest('rate');

try {
    $stmt = $con->prepare("INSERT INTO reviews (item_id, reviewer_name, review_note, review_rate) VALUES (?, ?, ?, ?)");
    $stmt->execute(array($product_id, $reviewer_name, $review_note, $review_rate));
    $count = $stmt->rowCount();
    if ($count == 0) {
        printFailure("");
    } else {
        printSuccess();
    }
} catch (PDOException $e) {
    // Check if the error is related to the foreign key constraint
    if ($e->getCode() == '23000') {
        // Print failure message if the item_id does not exist in the items table
        printFailure("");
    } else {
        // Handle other database errors
        echo "Database Error: " . $e->getMessage();
    }
}
?>
