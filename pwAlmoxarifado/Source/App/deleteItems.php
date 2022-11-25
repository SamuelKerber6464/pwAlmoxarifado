<?php

include("../Core/Connect.php");

session_start();

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$output = array();

$bd = Connect::getInstance();

$id = $data['deletedItem'];

$query = "UPDATE dataItems SET is_deleted=1, deleted_by=:deleted_by, deleted_at=CURRENT_TIME WHERE idItem=:id";
$stmt = $bd->prepare($query);
$stmt->bindParam(":id", $id);
$stmt->bindParam(":deleted_by", $_SESSION['username']);
$stmt->execute();

if ($stmt->rowCount()) {
  $output['status'] = "sucesso";
  $output['message'] = "item deletado com sucesso";
}

echo json_encode($output);
