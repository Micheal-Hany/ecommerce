<?php
include "../connect.php";


$email        =filterRequest('email');
$verifaycode=rand(99999, 10000);

$stmt=$con->prepare("SELECT * FROM `users` WHERE users_email=? ");

$stmt->execute(array($email));

$count=$stmt->rowCount();
if($count> 0){
    $data=array("users_verifaycode"=>$verifaycode);
    updateData("users",$data, "users_email='$email'", false);
    //send email
    printResult($count);
}