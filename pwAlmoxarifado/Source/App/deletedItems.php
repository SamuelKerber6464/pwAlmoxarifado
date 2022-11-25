<?php

include("../Core/Connect.php");

session_start();

$data = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$output = array();

$bd = Connect::getInstance();

$query = "SELECT * FROM dataItems where is_deleted=1";

$stmt = $bd->prepare($query);

$stmt->execute();

$datadb = null;
$datadb = $stmt->fetchAll(PDO::FETCH_OBJ);
$stmt = null;

echo json_encode($datadb);
