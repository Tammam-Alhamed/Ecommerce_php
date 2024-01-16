<?php


include "../connect.php";


$usersid = filterRequest("usersid");
$cartid = filterRequest("cartid");
$itemsid = filterRequest("itemsid");

 $stmt = $con->prepare("SELECT cart_qua + 1 FROM cart WHERE $cartid = cart_id");
 $stmt->execute() ; 
  $data1 = $stmt->fetchColumn() ; 


$data = array(
    "cart_qua" =>  $data1
);

updateData("cart" , $data , "$cartid = cart_id");