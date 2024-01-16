<?php 

 include "../connect.php" ; 

 $usersid = filterRequest("usersid") ; 
 $itemsid = filterRequest("itemsid") ; 

$images  = getAllData("images", "images_items = $itemsid", null, false);

$colors  = getAllData("colors", "colors_items = $itemsid", null, false);

$sizes = getAllData("sizes", "sizes_items = $itemsid", null, false);


 $stmt = $con->prepare("SELECT COUNT(cart.cart_id) as countitems  FROM `cart` WHERE cart_usersid = $usersid AND cart_itemsid  =  $itemsid   AND cart_orders = 0 ");
 $stmt->execute() ; 

 $count = $stmt->rowCount() ;

 $data = $stmt->fetchColumn() ; 
 

  if ($count > 0 ){
    
    echo json_encode(array("status" => "success" , "data" => $data , "images" => $images  , "colors" => $colors, "sizes" => $sizes)) ; 

  } else {

    echo json_encode(array("status" => "success" , "data" => "0" ,"images" => $images  , "colors" => $colors, "sizes" => $sizes )) ; 

  }


?>