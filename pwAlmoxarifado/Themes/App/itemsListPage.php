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
  <div class="modalDelete">
    <div class="insideModalDelete">
      <form class="formDeleted">
        <input type=" text" class='idDelete ' name="deletedItem" style="display: none;">
        <h3 class="titleDelete">Confirmar Delete:</h3>
        <input type="submit" value="Sim" class="btnSubmitDelete defaultBtn">
      </form>
      <input type="submit" value="Não" class="btnFecharDelete defaultBtn">

    </div>
  </div>

  <div class="modalEdit">
    <div class="insideModalEdit">
      <span class="btnFechar">&times;</span>
      <form class="formEdit">
        <input type="text" class='idEdit' name="id" style="display: none;">

        <div>
          <label for=" name">Nome</label>
          <input type="text" class="nameEdit" name="name">
        </div>
        <div>
          <label for="tipo">Tipo</label>
          <input type="text" name="type" class="typeEdit">
        </div>
        <div>
          <label for="nome">Quantidade</label>
          <input type="text" name="quantity" class="quantityEdit">
        </div>
        <div>
          <label for="nome">Localização</label>
          <input type="text" name="location" class="locationEdit">
        </div>
        <div>
          <label for="nome">Prateleira</label>
          <input type="text" name="shelf" class="shelfEdit">
          <input type="submit" value="Enviar" class="btnSubmitEdit">
        </div>
        <span>Preencha apenas um campo por envio</span>
      </form>
    </div>
  </div>



  <div class="flex-table">
    <div class="upsideBtns">
      <a href="../../index.php"><button class="defaultBtn btnRedirecionador">Home</button></a>
      <a href="../../Source/App/generateSpreadsheet.php"><button class="defaultBtn btnExcel">EXCEL</button></a>
      <a href="./registerItemsPage.php"><button class="defaultBtn btnRedirecionador">Cadastrar Item</button></a>
    </div>
    <div class=" filterContainer">
      <select name="filters" class="selectFilter">
        <option value="Filtro" selected="selected">Filtro</option>
        <option value="nenhum">Nenhum</option>
        <option value="tipo">tipo</option>
        <option value="usuario">usuario</option>
      </select>
      <form class="formSelect">
        <input type="text" name="inputTypeList" class="inputType defaultInput">
        <input type="text" name="inputUserList" class="inputUser defaultInput">
      </form>
      <button type="submit" class="btnFilter">Gerar</button>
    </div>
    <span class="statusDelete"></span>

    <table class="containerTable">
      <tr>
        <th>Id</th>
        <th>Nome</th>
        <th>Tipo</th>
        <th>Quantidade</th>
        <th>Localização</th>
        <th>Prateleira</th>
        <th>Cadastrado por:</th>
        <th>Editar</th>
        <th>Remover</th>
      </tr>
      <tbody class="table">

      </tbody>


    </table>
  </div>

  <script src="../../Assets/formsJS/itemsList.js"></script>
  <script src="../../Assets/formsJS/editItems.js"></script>
</body>

</html>