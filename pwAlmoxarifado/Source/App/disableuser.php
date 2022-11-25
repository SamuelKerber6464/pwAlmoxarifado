<?php

include("../Core/Connect.php");

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$output = array();

$bd = Connect::getInstance();

$id = $data['idDisable'];

if (!empty($id)) {
  $query = "UPDATE dataUser SET is_active=1 WHERE idUser=:id";
  $stmt = $bd->prepare($query);
  $stmt->bindParam(":id", $id);
  $stmt->execute();
  if ($stmt->rowCount()) {
    $output['status'] = "sucesso";
    $output['message'] = "item deletado com sucesso";
  }
}
echo json_encode($output);
