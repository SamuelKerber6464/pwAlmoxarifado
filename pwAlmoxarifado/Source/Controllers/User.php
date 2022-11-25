
<?php

include("../Core/Connect.php");


class User
{

  private $username;
  private $email;
  private $senha;

  public function __construct(
    ?string $username = NULL,
    ?string $email = NULL,
    ?string $senha = NULL
  ) {

    $this->username = $username;
    $this->email = $email;
    $this->senha = $senha;
  }

  public function insert()
  {
    $bd = Connect::getInstance();

    $username = $this->username;
    $email = $this->email;
    $password = $this->senha;

    //Verifica se o username já existe
    $queryVerifyUser = "SELECT username from datauser WHERE username=:username";
    $stmtVU = $bd->prepare($queryVerifyUser);
    $stmtVU->bindParam(":username", $username);
    $stmtVU->execute();
    $dataVU = $stmtVU->fetch(PDO::FETCH_OBJ);
    $db_username = ($dataVU != false and isset($dataVU->username)) ? $dataVU->username : false;


    //Verifica se o email já existe
    $queryVerifyEmail = "SELECT email from datauser WHERE email=:email";
    $stmtVE = $bd->prepare($queryVerifyEmail);
    $stmtVE->bindParam(":email", $email);
    $stmtVE->execute();
    $dataVE = $stmtVE->fetch(PDO::FETCH_OBJ);
    $db_email = ($dataVE != false and isset($dataVE->email)) ? $dataVE->email : false;


    if (!empty($username) && !empty($email)) {
      $query = "INSERT INTO datauser VALUES (NULL, :username, :email, :senha,0,0)";
      $stmt = $bd->prepare($query);
      $stmt->bindParam(":username", $username);
      $stmt->bindParam(":email", $email);
      $stmt->bindParam(":senha", $hashed_pass);
    }
    $hashed_pass = password_hash($password, PASSWORD_DEFAULT);



    if ($db_email) {
      $output['status'] = "Erro";
      $output['message'] = 'Email já existente';
    } else if ($db_username) {
      $output['status'] = "Erro";
      $output['message'] = 'Username já existente';
    } else {
      $output['status'] = "sucesso";
      $stmt->execute();
    }

    if ($stmt->rowCount()) {
      $output['status'] = "sucesso";
      $output['message'] = 'usuario cadastrado com sucesso';
    }


    echo json_encode($output);
  }

  public function Login()
  {
    $bd = Connect::getInstance();

    $email = $this->email;
    $password = $this->senha;

    $query = "SELECT username, email, senha, adm FROM datauser WHERE email=:email";
    $stmt = $bd->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $datadb = $stmt->fetch(PDO::FETCH_OBJ);
    $stmt = null;

    $db_username = ($datadb != false and isset($datadb->username)) ? $datadb->username : false;
    $db_email = ($datadb != false and isset($datadb->email)) ? $datadb->email : false;
    $db_pass = ($datadb != false and isset($datadb->senha)) ? $datadb->senha : false;
    $db_adm = ($datadb != false and isset($datadb->adm)) ? $datadb->adm : false;

    if ($db_adm == "1") {
      if ($db_email == $email && password_verify($password, $db_pass)) {
        session_start();
        if (isset($_SESSION['logged']) && isset($_SESSION['admin'])) {
          $output["status"] = "sucesso";
        } else {
          $_SESSION['logged'] = 1;
          $_SESSION['admin'] = true;
          $_SESSION['username'] = $db_username;
          $output["status"] = "sucesso";
          $output["message"] = "Logado com sucesso";
        }
      } else {
        $output["status"] = "erro";
        $output["message"] = "Usuário com as credenciais informadas não foi encontrado.";
      }
    } elseif ($db_email == $email && password_verify($password, $db_pass)) {
      session_start();
      if (isset($_SESSION['logged'])) {
        $output["status"] = "sucesso";
      } else {
        $_SESSION['logged'] = 0;
        $_SESSION['username'] = $db_username;

        $output["status"] = "sucesso";
        $output["message"] = "Logado com sucesso";
      }
    } else {
      $output["status"] = "erro";
      $output["message"] = "Usuário com as credenciais informadas não foi encontrado.";
    }

    echo json_encode($output);
  }
}
