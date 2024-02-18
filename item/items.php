<?php
include "../connect.php";
 $categoryId=$_GET["categories_id"];
$items = getAllData("itemsview", "categories_id=$categoryId");


// include "../connect.php";

// // Ensure that the "categories_id" parameter is set
// if (!isset($_GET["categories_id"])) {
//     // Handle the case when "categories_id" is not provided
//     echo json_encode(array("status" => "failure", "message" => "Missing 'categories_id' parameter"));
//     exit;
// }

// $categoryId = $_GET["categories_id"];

// try {
//     // Use prepared statements to prevent SQL injection
//     $stmt = $con->prepare("SELECT * FROM itemsview WHERE categories_id = :categoryId");
//     $stmt->bindParam(':categoryId', $categoryId, PDO::PARAM_INT);
//     $stmt->execute();

    
//     $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
//     $count = $stmt->rowCount();

  
//     if ($count > 0) {
//         echo json_encode(array("status" => "success", "data" => $data));
//     } else {
//         echo json_encode(array("status" => "failure", "message" => "No data found for the specified 'categories_id'"));
//     }
// } catch (PDOException $e) {

//     echo json_encode(array("status" => "failure", "message" => "Database error: " . $e->getMessage()));
// }
?>

