<?php

include("../Core/Connect.php");
session_start();

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);


$name = $data['name'];
$quantity = $data['quantity'];
$type = $data['type'];
$location = $data['location'];
$shelf = $data['shelf'];

$output = array();

$bd = Connect::getInstance();

if (!empty($name) && !empty($quantity) && !empty($type) && !empty($location) && !empty($shelf)) {
  $query = "INSERT INTO dataitems (itemName, itemQuantity, itemType, itemLocation, itemShelf, itemUser) VALUES (:itemName, :itemQuantity, :itemType, :itemLocation, :itemShelf, :itemUser)";
  $stmt = $bd->prepare($query);
  $stmt->bindParam(":itemName", $name);
  $stmt->bindParam(":itemQuantity", $quantity);
  $stmt->bindParam(":itemType", $type);
  $stmt->bindParam(":itemLocation", $location);
  $stmt->bindParam(":itemShelf", $shelf);
  $stmt->bindParam(":itemUser", $_SESSION['username']);
}






if ($stmt->execute()) {
  $output['status'] = "sucesso";
} else {
  $stmt = "";
  $output['status'] = "erro";
}

echo json_encode($output);
