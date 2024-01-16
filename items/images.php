<?php

include "../connect.php";

$itemsid = filterRequest("itemsid");

$images  = getAllData("images", "images_items = $itemsid", null, false);


echo json_encode(array(
    "status" => "success",
    "images" => $images,
));