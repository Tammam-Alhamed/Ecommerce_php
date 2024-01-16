<?php

include "../connect.php";
 
$password = sha1($_POST['password']);
$email = filterRequest("email"); 
// $stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? AND  users_password = ? AND users_approve = 1 ");
// $stmt->execute(array($email, $password));
// $count = $stmt->rowCount();
// result($count) ; 

getData("users" , "phone = ? AND  password = ?" , array($email , $password)) ; 

// ---------------------------------------------------------------------------------------------------------------------

function getData1($table, $where = null, $values = null, $json = true)
{
    global $con;
    $dataa = array();
    $stmt = $con->prepare("SELECT id FROM $table WHERE   $where ");
    $stmt->execute($values);
    $dataa = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($json == true) {

         json_encode(array("dataa" => $dataa));

        return $dataa;
    }
}

$id = array();
$id = getData1( "users" , "phone = ? AND  password = ?" , array($email , $password));

// $address = array(
//     "address_city" => "any",
//     "address_usersid" => $id['id'],
//     "address_name" => "any",
//     "address_street" => "any",
//     "address_lat" => "1234",
//     "address_long" => "3456"
// );

// function insertData1($table, $data, $json = true)
// {
//     global $con;
//     foreach ($data as $field => $v)
//         $ins[] = ':' . $field;
//     $ins = implode(',', $ins);
//     $fields = implode(',', array_keys($data));
//     $sql = "INSERT INTO $table ($fields) VALUES ($ins)";

//     $stmt = $con->prepare($sql);
//     foreach ($data as $f => $v) {
//         $stmt->bindValue(':' . $f, $v);
//     }
//     $stmt->execute();
//     $count = $stmt->rowCount();
//     if ($json == true) {
//         if ($count > 0) {
//              json_encode(array("status" => "success"));
//         } else {
//              json_encode(array("status" => "failure"));
//         }
//     }
//     return $count;
// }

// insertData1("address" , $address);