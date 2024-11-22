<?php
// Inclui o arquivo de verificação
include("../models/verifica.php");

// Verifica se a sessão 'nome_cadastro' está definida
$nome = isset($_SESSION['nome_cadastro']) ? $_SESSION['nome_cadastro'] : 'Usuário Desconhecido';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Controle de Estoque: Entreposto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="../../public/image/favicon.svg" type="image/x-icon" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />
  <link rel="stylesheet" href="../../public/css/reset.css" />
  <link rel="stylesheet" href="../../public/css/bootstrap.min.css" />
  <link rel="stylesheet" href="../../public/css/css.css" />
  <link rel="stylesheet" href="../../public/css/footer.css" />
  <link rel="stylesheet" href="../../public/css/cabecalho.css" />
  <link rel="stylesheet" type="text/css"
    href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.bootstrap4.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
  <script src="../js/script.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.css">
  <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script type="text/javascript" charset="utf8"
    src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js"></script>

</head>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg">
      <a class="logo-laranjal" href="../pages/index.php"> <img src="../../public/image/fao_ufmg.png" width="200px"
          height="auto" alt="Logo FAO"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active"> <a class="nav-link" href="../pages/entrada.php">Entrada</a> </li>
          <li class="nav-item active"> <a class="nav-link" href="../pages/retirada.php">Retirada</a> </li>
          <li class="nav-item active"> <a class="nav-link" href="../pages/demanda.php">Demanda</a> </li>
          <li class="nav-item active"> <a class="nav-link" href="../pages/editar.php">Editar</a> </li>
          <li class="nav-item active"> <a class="nav-link" href="../pages/visualizar.php">Visualizar</a> </li>
          <li class="nav-item active"> <a class="nav-link" href="../pages/relatorio.php">Relatório</a> </li>
        </ul>
      </div>
      <div>
        <ul class="nav  justify-content-end">
          <li class="nav-item dropdown">
          <li class="nav-item"><strong>Usuário: </strong></li>
          <li class="nav-item"><?php echo ($nome); ?></li>
          </li>
          <li><a href="../models/logout.php" title="Sair"><i class="fas fa-sign-out-alt"></i></a></li>

        </ul>
      </div>
    </nav>
  </header>
</body>