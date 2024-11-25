<?php
$nome = getenv("Shib-Person-CommonName");
include_once("../../model/verifica.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Controle de Estoque: Entreposto</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="../../../public/image/jad.jpg" type="image/x-icon" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" />

  <!-- DataTables -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.5/css/jquery.dataTables.min.css" />
  <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.13.5/js/jquery.dataTables.min.js"></script>

  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />

  <!-- Estilos customizados -->
  <link rel="stylesheet" href="../../../public/css/css.css" />
  <link rel="stylesheet" href="../../../public/css/footer.css" />
</head>

<body>

  <header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg">
      <a class="logo-laranjal-fao" href="../pages/index.php"> <img class="img-logo-header" src="../../public/image/logo-entreposto.svg" alt="Logo Entreposto"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExampleDefault"
        aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav me-auto">
          <li class="nav-item active"><a class="nav-link" href="../pages/entrada.php">Entrada</a></li>
          <li class="nav-item active"><a class="nav-link" href="../pages/retirada.php">Retirada</a></li>
          <li class="nav-item active"><a class="nav-link" href="../pages/demanda.php">Demanda</a></li>
          <li class="nav-item active"><a class="nav-link" href="../pages/editar.php">Editar</a></li>
          <li class="nav-item active"><a class="nav-link" href="../pages/visualizar.php">Visualizar</a></li>
          <li class="nav-item active"><a class="nav-link" href="../pages/relatorio.php">Relatório</a></li>
        </ul>
      </div>
      <div>
        <ul class="nav justify-content-end">
          <li class="nav-item dropdown">
          <li class="nav-item"><strong>Usuário: </strong></li>
          <li class="nav-item"><strong><a
                class="redirecionamento"><?php echo ($_SESSION["nome_cadastro"]); ?></a></strong></li>
          </li>
          <li><a href="../models/logout.php" title="Sair"><i class="fas fa-sign-out-alt"></i></a></li>
        </ul>
      </div>
    </nav>
  </header>

</body>

</html>