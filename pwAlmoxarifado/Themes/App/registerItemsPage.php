<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../style.css">

  <title>Register Item</title>
</head>

<?php

session_start();

if (!isset($_SESSION['logged'])) {
  header('Location: ../index.php');
}
?>

<body>

  <div class="containerItens">
    <div class="upsideBtns">
      <a href="../../index.php"><button class="defaultBtn btnRedirecionador">Home</button></a>
      <a href="./itemsListPage.php"><button class="defaultBtn btnRedirecionador">Listagem de Itens</button></a>
      <a href="./deletedItens.php"><button class="defaultBtn btnRedirecionador">Itens Apagados</button></a>
    </div>
    <h1>Cadastrar Itens</h1>
    <span class="statusRegisterItem"></span>
    <form class="formRegisterItems">

      <div class="field">
        <label for="name">Nome</label>
        <input type="text" for="name" name="name" placeholder="Nome" class="name item">
      </div>

      <div class="field">
        <label for="quantity">Quantidade</label>
        <input type="text" for="quantity" name="quantity" placeholder="Quantidade" class="quantity item">
      </div>

      <div class="field">
        <label for="type">Tipo</label>
        <input type="text" for="type" name="type" placeholder="Tipo" class="type item">
      </div>

      <div class="field">
        <label for="location">Localização</label>
        <input type="text" for="location" name="location" placeholder="Localização" class="location item">
      </div>

      <div class="field">
        <label for="shelf">Prateleira</label>
        <input type="text" for="shelf" name="shelf" placeholder="Prateleira" class="shelf item">
        <input type="submit" value="Cadastrar" class="btnCadastrarItem defaultBtn">
      </div>

    </form>
  </div>

  <script src="../../Assets/formsJS/registerItems.js"></script>
</body>

</html>