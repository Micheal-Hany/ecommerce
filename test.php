<?php 

include './connect.php';
$table = "users";
// $name = filterRequest("namerequest");
$data = array( 
"users_name" => "micheal",
"users_email" => "micheal@gmail.com",
"users_phone" => "324234",
"users_approve" => "0",
"users_verifaycode" => "3243243",       
);
$count = insertData($table , $data);