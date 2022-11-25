<?php
include("../Core/Connect.php");



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $file = 'usersReport.xls';

  $html = '';
  $html .= '<table border="1">';
  $html .= '<tr>';
  $html .= '<td colspan="3">Relatório de itens</tr>';
  $html .= '</tr>';

  $html .= '<tr>';
  $html .= '<td><b>ID</b></td>';
  $html .= '<td><b>Username</b></td>';
  $html .= '<td><b>Email</b></td>';
  $html .= '</tr>';


  $bd = Connect::getInstance();

  $query = "SELECT * FROM dataUser";

  $stmt = $bd->prepare($query);

  $stmt->execute();


  while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $html .= '<tr>';
    $html .= '<td>' . $row["idUser"] . '</td>';
    $html .= '<td>' . $row["username"] . '</td>';
    $html .= '<td>' . $row["email"] . '</td>';
    $html .= '</tr>';
  };

  // Configurações header para forçar o download
  header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
  header("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Content-type: application/x-msexcel");
  header("Content-Disposition: attachment; filename=\"{$file}\"");
  header("Content-Description: PHP Generated Data");
  // Envia o conteúdo do arquivo
  echo $html;
  exit;

  ?>

</body>

</html>