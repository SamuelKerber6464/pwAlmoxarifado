
<?php
include("../Core/Connect.php");

$bd = Connect::getInstance();

$query = "SELECT * FROM dataItems";

$stmt = $bd->prepare($query);

$stmt->execute();

$datadb = null;
$datadb = $stmt->fetchAll(PDO::FETCH_OBJ);
$stmt = null;

echo json_encode($datadb);
