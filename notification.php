<?php 

include "./connect.php"  ;

$userid = filterRequest("id") ; 

getAllData("notification"  , "notification_userid IN ( $userid, '0') ORDER BY notification_datetime DESC" ) ; 


?>