<?php 

include "connect.php" ; 

$alldata = array() ; 

$alldata['status'] = "success" ; 

// $settings = getAllData("setings" , "1 = 1" , null , false )  ;

// $alldata['settings'] = $settings ; 

///////
$shope = getAllData("shopes" , null , null , false )  ;

$alldata['shope'] = $shope ; 
////////
$slides = getAllData("slides" , null , null , false )  ;

$alldata['slides'] = $slides ; 

$categories = getAllData("categories" , null , null , false )  ;

$alldata['categories'] = $categories ; 

$items = getAllData("itemstopselling" , "1 = 1 ORDER BY countitems DESC  " , null , false )  ;

$alldata['items'] = $items ; 


echo json_encode($alldata) ;
