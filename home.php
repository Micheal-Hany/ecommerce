<?php

include "connect.php";

$data =array();

$data['status'] = "success";



$categories = getAllData("categories", "1=1", null, false);

$data['categories'] = $categories;



// $items = getAllData("itemsview", null, null, false);

// $data['items'] = $items;

echo json_encode($data);

?>


