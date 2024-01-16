<?php

include "../connect.php";


$categoryid = filterRequest("id");

// getAllData("itemsview", "categories_id = $categoryid");

$userid = filterRequest("usersid");

 

$stmt = $con->prepare("SELECT items1view.* , 1 as favorite ,
 round((items_price_d ) * price.price,-3)  as itemsprice
,round((items_price_d - (items_price_d * items_discount / 100 )) * price.price , -3) as itemspricedisount_d 
FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid = $userid
JOIN price
WHERE categories_id = $categoryid
UNION ALL 
SELECT items1view.*  , 0 as favorite  ,
 round((items_price_d ) * price.price,-3)  as itemsprice
,round((items_price_d - (items_price_d * items_discount / 100 )) * price.price , -3)  as itemspricedisount_d
FROM items1view
JOIN price
WHERE  categories_id = $categoryid AND items_id NOT IN  ( SELECT items1view.items_id FROM items1view 
INNER JOIN favorite ON favorite.favorite_itemsid = items1view.items_id AND favorite.favorite_usersid =  $userid 
JOIN price )
ORDER BY items_filter ASC");

$stmt->execute();
$data = $stmt->fetchAll(PDO::FETCH_ASSOC) ;
$count  = $stmt->rowCount();

if ($count > 0) {
    echo json_encode(array("status" => "success", "data" => $data  ));
} else {
    echo json_encode(array("status" => "failure"));
}
