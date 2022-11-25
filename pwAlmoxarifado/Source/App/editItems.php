<?php

include("../Core/Connect.php");

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$output = array();

$bd = Connect::getInstance();

$id = $data['id'];
$nameItem = $data['name'];
$type = $data['type'];
$quantity = $data['quantity'];
$location = $data['location'];
$shelf = $data['shelf'];

if (!empty($nameItem)) {
  $query = "UPDATE dataItems SET itemName=:nameItem WHERE idItem=:id";
  $stmt = $bd->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":nameItem", $nameItem);
  $stmt->execute();
  if ($stmt->rowCount()) {
    $output['status'] = "sucesso";
  }
} elseif (!empty($type)) {
  $query = "UPDATE dataItems SET itemType=:typeItem WHERE idItem=:id";
  $stmt = $bd->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":typeItem", $type);
  $stmt->execute();
  if ($stmt->rowCount()) {
    $output['status'] = "sucesso";
  }
} elseif (!empty($quantity)) {
  $query = "UPDATE dataItems SET itemQuantity=:quantityItem WHERE idItem=:id";
  $stmt = $bd->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":quantityItem", $quantity);
  $stmt->execute();
  if ($stmt->rowCount()) {
    $output['status'] = "sucesso";
  }
} elseif (!empty($location)) {
  $query = "UPDATE dataItems SET itemLocation=:locationItem WHERE idItem=:id";
  $stmt = $bd->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":locationItem", $location);
  $stmt->execute();
  if ($stmt->rowCount()) {
    $output['status'] = "sucesso";
  }
} elseif (!empty($shelf)) {
  $query = "UPDATE dataItems SET itemShelf=:locationShelf WHERE idItem=:id";
  $stmt = $bd->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->bindParam(":locationShelf", $shelf);
  $stmt->execute();
  if ($stmt->rowCount()) {
    $output['status'] = "sucesso";
  }
} else {
  $output['status'] = "error";
}




echo json_encode($data);
