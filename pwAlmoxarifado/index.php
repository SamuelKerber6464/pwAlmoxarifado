<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./style.css">
  <title>Almoxarifado</title>
</head>

<body>
  <?php
  session_start();


  ?>

  <div class="modalLogin">
    <div class="insideML">
      <span class="btnFechar">&times;</span>

      <span class="loginError"></span>
      <form class="loginForm">
        <div class="loginDivision">
          <label for="Email">Email</label>
          <input type="email" name="email" placeholder="Email" class="inputEmail" />
        </div>

        <div class="loginDivision">
          <label for="senha">Senha</label>
          <input type="password" name="password" placeholder="Password" class="inputPassword" />
        </div>
        <input type="submit" value="Logar" class="btnLogar">
      </form>


    </div>
  </div>

  <header class="container">
    <div class="logoBox">
      <div class="logo">
        <img src="./Assets/styles/img/logo.png" alt="logoEmpresa">
      </div>
      <p class="nome">
        LOREM <br />
        IPSUM
      </p>
    </div>

    <ul class="menu">
      <li class="menu-item">
        <a class="btnModalLogin" href="../index.html">
          Login
          <?php
          if (isset($_SESSION['logged'])) {
            echo "<script src='./Assets/formsJS/logged.js'></script>";
          };
          ?>
        </a>
      </li>
      <?php

      if (isset($_SESSION['admin'])) {
        echo "<li class='menu-item'> 
        <a href='./Themes/Admin/registerUsersPage.php'>Usuário</a>
        </li>";
        echo "<li class='menu-item'>
        <a href='./Themes/App/registerItemsPage.php'>Itens</a>
        </li>";
      } else if (isset($_SESSION['logged'])) {
        echo "<li class='menu-item'>
        <a href='./Themes/App/registerItemsPage.php'>CadastrarItem</a>
        </li>";
      };
      ?>
    </ul>
  </header>

  <div class="layoutCont somos" id="somosid">
    <img class="layoutIMG" src="./Assets/styles/img/somos.png" alt="" />
    <div class="conteudo">
      <div class="container">
        <h1 class="titulo">Somos a Lorem Ipsum</h1>
        <p>Olá! Somos a Lorem Ipsum</p>
        <p>Nosso trabalho é desenvolver textos de marcação</p>
        <button class="saibaMais">Saiba mais ></button>
      </div>
    </div>
  </div>
  <div class="layoutServices">
    <h1 class="titleServices">Nossos serviços</h1>
    <div class="imgsServices">
      <div class="imgService">
        <img src="./Assets/styles/img/management.png" alt="">

      </div>
      <div class="imgService">
        <img src="./Assets/styles/img/inventory.png" alt="">

      </div>
    </div>
  </div>

  <footer>
    <div class="container flex-footer">
      <div class="logoBox">
        <div class="logo">
          <img src="./Assets/styles/img/logo.png" alt="logoEmpresa">
        </div>
        <p class="nome nomeFooter">
          LOREM <br />
          IPSUM
        </p>
      </div>



      <p class="cop cinza">
        Copyright ©. Todos os direitos reservados.
      </p>



    </div>
  </footer>

  <script type="module" src="./script.js"></script>
  <script src="./Assets/formsJS/login.js"></script>
</body>

</div>


</html>