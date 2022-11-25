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

if (!isset($_SESSION['admin'])) {
  header('Location: ../index.php');
}
?>

<body>

  <div class="modalDelete">
    <div class="insideModalDelete">
      <form class="formDisable">
        <input type=" text" class='idDisable' name="idDisable" style="display: none;">
        <h3>Confirmar Desativação:</h3>
        <input type="submit" value="Sim" class="btnSubmitDisable defaultBtn">
      </form>
      <input type="submit" value="Não" class="btnFecharDelete defaultBtn">

    </div>
  </div>

  <div class="containerTableUsers">
    <div class="upsideBtns">
      <a href="../../index.php"><button class="defaultBtn btnRedirecionador">Home</button></a>
      <a href="../../Source/App/generateExcelUsers.php"><button class="defaultBtn btnExcel">EXCEL</button></a>
    </div>
    <span class="statusDisableUser"></span>
    <table class="containerTable">
      <tr>
        <th>Id</th>
        <th>Username</th>
        <th>Email</th>
        <th>Desativar</th>
      </tr>
      <tbody class="tableEmployees">

      </tbody>
    </table>

  </div>

  <script src="../../Assets/formsJS/listEmployees.js"></script>
</body>

</html>