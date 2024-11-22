<?php
include_once('../partials/header.php');
?>

<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Controle de Estoque : Entreposto FAO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="../../public/image/favicon.svg" />
</head>

<body>

  <section class="principal bg-color-cinza" height="100%">
    <div class="container-fluid">
      <div class="row">
        <div class="col">
          <div class="row">

            <div class="col-md-6 col-lg-6">
              <div class="box align-middle">
                <a href="../Home/Entrada.php">
                  <img src="../../public/image/icons/criar.svg" width="65px" height="65px" alt="Adicionar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Novo</span> Produto</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="box align-middle">
                <a href="../Home/Saida.php">
                  <img src="../../public/image/icons/retirar.svg" width="65px" height="65px" alt="Retirar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Retirar</span> Produto</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="box align-middle">
                <a href="../Home/Demanda.php">
                  <img src="../../public/image/icons/pendente.svg" width="65px" height="65px" alt="Retirar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Solicitar</span> Produto</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="box align-middle">
                <a href="../Home/Editar.php">
                  <img src="../../public/image/icons/editar.svg" width="65px" height="65px" alt="Retirar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Editar</span> Produto</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="box align-middle">
                <a href="../Home/Visualizar.php">
                  <img src="../../public/image/icons/listar.svg" width="65px" height="65px" alt="Listar Produtos">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Listar</span> Produtos</p>
                </a>
              </div>
            </div>

            <div class="col-md-6 col-lg-6">
              <div class="box align-middle">
                <a href="../Home/Relatorio.php">
                  <img src="../../public/image/icons/relatorio.svg" width="65px" height="65px"
                    alt="Relatório de Estoque">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Relatório</span> de Estoque
                  </p>
                </a>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </section>
</body>


<?php
include_once('../partials/footer.php');
?>