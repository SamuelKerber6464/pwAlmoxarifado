<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../style.css">

  <title>Document</title>
</head>

<?php

session_start();

if (!isset($_SESSION['logged'])) {
  header('Location: ../index.php');
}
?>

<body>

  <div class="containerTableDeleted">
    <div class="upsideBtns">
      <a href="../../index.php"><button class="defaultBtn btnRedirecionador">Home</button></a>
      <a href="../../Source/App/generateExcelExcludeds.php"><button class="defaultBtn btnExcel">EXCEL</button></a>
      <a href="./registerItemsPage.php"><button class="defaultBtn btnRedirecionador">Cadastrar Item</button></a>
    </div>

    <table class="containerTable">
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Quantidade</th>
        <th>Tipo</th>
        <th>Localização</th>
        <th>Prateleira</th>
        <th>Deletado por:</th>
        <th>Deletado em:</th>
      </tr>
      <tbody class="tableDeletedItems">

      </tbody>
    </table>

  </div>

  <script src="../../Assets/formsJS/deletedItems.js"></script>
</body>

</html>