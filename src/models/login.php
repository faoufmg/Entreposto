<?php
require_once("../../config/db.php");
session_start();

$login = isset($_POST["nome_cadastro"]) ? addslashes(trim($_POST["nome_cadastro"])) : FALSE;
$senha = isset($_POST["senha_cadastro"]) ? md5(trim($_POST["senha_cadastro"])) : FALSE;

//$login = $_POST['nome_cadastro'];
//$senha = $_POST[md5('senha_cadastro')];

if (!$login || !$senha) {
  echo
    "<script>
        alert('Você deve digitar seu login e senha!');
        window.location.href = '../pages/login.php';
    </script>";
}

$SQL = "SELECT Nome, Senha FROM Usuario WHERE Nome = '" . $login . "'";
$result_id = mysqli_query($link, $SQL) or die("Erro no banco de dados!");
$total = mysqli_num_rows($result_id);

if ($total) {
  $dados = mysqli_fetch_array($result_id);

  if (!strcmp($senha, $dados["Senha"])) {
    $_SESSION["nome_cadastro"] = stripslashes($dados["Nome"]);
    echo
      "<script>
        window.location.href = '../pages/index.php';
      </script>";
  }
  // Senha inválida
  else {
    echo
      "<script>
          alert('A senha fornecida por você é inválida!');
          window.location.href = '../pages/login.php';
      </script>";
  }
}
// Login inválido
else {
  echo
    "<script>
        alert('O login fornecido por você é inexistente!');
        window.location.href = '../pages/login.php';
    </script>";
}
?>