<?php

include "../connect.php";

$username = filterRequest("username");
$password = sha1($_POST['password']);
$email = filterRequest("email");
$phone = filterRequest("phone");
$verfiycode     = rand(10000 , 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE email = ? OR phone = ? ");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();
if ($count > 0) {
    printFailure("PHONE OR EMAIL");
} else {

    $data = array(
        "name" => $username,
        "password" =>  $password,
        "email" => $email,
        "phone" => $phone,
        "users_verfiycode" => $verfiycode ,
    );


    insertData("users" , $data) ; 

}
