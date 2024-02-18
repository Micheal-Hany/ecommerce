<?php

include "../connect.php";

$search = $_GET["search"];



getAllData("itemsview", "item_name_en LIKE '%$search%' OR item_name_ar LIKE '%$search%'");
?>
