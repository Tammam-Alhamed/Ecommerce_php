<?php


include "../connect.php";


$usersid = filterRequest("usersid");
$itemsid = filterRequest("itemsid");
$itemsqua = filterRequest("itemsqua");
$itemscolor = filterRequest("itemscolor");
$itemssize = filterRequest("itemssize");


  getData("cart", "cart_itemsid = $itemsid AND cart_usersid = $usersid AND cart_orders = 0" ,null  , false );


$data = array(
    "cart_usersid" =>  $usersid,
    "cart_itemsid" =>  $itemsid,
    "cart_qua" =>  $itemsqua,
    "cart_colors" =>  $itemscolor,
    "cart_sizes" =>  $itemssize,
);

insertData("cart", $data);




 
   // Mysql 

    // PHP 