<?php
include "../connect.php";


$username     =filterRequest('username');
$email        =filterRequest('email');
$phone        =filterRequest('phone');
$password     =sha1('password');
$verifayCode  ="0";

$stmt=$con->prepare("SELECT * FROM `users` WHERE users_email=? OR users_phone=?");

$stmt->execute(array($email, $phone));

$count=$stmt->rowCount();
if($count> 0){
    printFailure("email or phone number must be uniqe");
}
else{
    $data=array(
        "users_name"         =>$username,
        "users_password"     =>$password,
        "users_email"        =>$email,
        "users_phone"        =>$phone,
        "users_verifaycode"  =>"0",
    );
    insertData("users", $data);
}
