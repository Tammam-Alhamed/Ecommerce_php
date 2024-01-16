<?php 

include "../connect.php" ; 

$categoryid = filterRequest("id");


getAllData("categories" , "categories_shope = $categoryid")  ;
?>