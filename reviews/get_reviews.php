<?php
include "../connect.php";

// Get the item ID from the request
$item_id = filterRequest("item_id");

// Prepare and execute the SQL query to fetch reviews for the given item ID
$stmt = $con->prepare("SELECT * FROM reviews WHERE item_id = ?");
$stmt->execute(array($item_id));

// Fetch all rows of the result as an associative array
$reviews = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Check if there are any reviews found
if (count($reviews) > 0) {
    // Construct an array to hold review data
    $reviewsArray = array();
    foreach ($reviews as $review) {
        // Add each review to the array
        $reviewsArray[] = array(
            'review_id' => $review['review_id'],
            'reviewer_name' => $review['reviewer_name'],
            'review_note' => $review['review_note'],
            'review_rate' => $review['review_rate']
        );
    }

    // Encode the reviews array as JSON
    $jsonResponse = json_encode(array("status" => "success", "data" => $reviewsArray));

    // Return the JSON response
    echo $jsonResponse;
} else {
    // No reviews found for the given item ID
    // Return a JSON response indicating no reviews found
    echo json_encode(array("status" => "failure", "data" => ""));
}
?>
