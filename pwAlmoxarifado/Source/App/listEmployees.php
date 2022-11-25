<?php
include("../Core/Connect.php");

$bd = Connect::getInstance();

$query = "SELECT * FROM datauser";

$stmt = $bd->prepare($query);

$stmt->execute();

$datadb = $stmt->fetchAll(PDO::FETCH_OBJ);
$stmt = null;

echo json_encode($datadb);
