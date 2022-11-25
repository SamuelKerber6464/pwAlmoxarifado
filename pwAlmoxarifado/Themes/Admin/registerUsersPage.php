<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../style.css">
  <title>Registrar Usuários</title>
</head>


<?php
session_start();

if (!isset($_SESSION['admin'])) {
  header('Location: ../index.php');
}
?>

<body>

  <div class="containerForm">
    <div class="upsideBtns">
      <a href="../../index.php"><button class="defaultBtn btnRedirecionador">Home</button></a>
      <a href="./listEmployeesPage.php"><button class="defaultBtn btnRedirecionador">Lista funcionários</button></a>
    </div>
    <h1>Registrar Usuários</h1>
    <span class="statusRegister"></span>
    <form class="formRegisterUser">
      <div class="field">
        <label for="username">Username</label>
        <input type="text" for="username" name="username" placeholder="username" class="username">
      </div>
      <div class="field">
        <label for="email">Email</label>
        <input type="email" for="email" name="email" placeholder="Email" class="email">
      </div>
      <div class="field">
        <label for="password">Senha</label>
        <input type="password" for="password" name="password" placeholder="Senha" class="password">
        <input type="submit" class="btnCadastrarUser defaultBtn" value="Registrar">
      </div>

    </form>
  </div>

  <script src="../../Assets/formsJS/registerUsers.js"></script>
</body>

</html>