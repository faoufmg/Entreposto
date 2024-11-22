<?php
include_once('../partials/header.php');
?>

<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <title>Controle de Estoque: Entreposto FAO</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="shortcut icon" href="../../public/image/favicon.svg" />
</head>

<body>

  <section class="principal bg-color-cinza" height="100%">
    <div class="container-fluid">

      <figure class="text-center mt-3">
        <h1>Entreposto</h1>
      </figure>

      <div class="row">
        <div class="col">
          <div class="row">

            <div class="col-md-6 col-lg-6">
              <a href="../pages/entrada.php">
                <div class="box align-middle">
                  <img src="../../public/image/icons/criar.svg" width="65px" height="65px" alt="Adicionar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Novo</span> Produto</p>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-6">
              <a href="../pages/retirada.php">
                <div class="box align-middle">
                  <img src="../../public/image/icons/retirar.svg" width="65px" height="65px" alt="Retirar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Retirar</span> Produto</p>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-6">
              <a href="../pages/demanda.php">
                <div class="box align-middle">
                  <img src="../../public/image/icons/pendente.svg" width="65px" height="65px" alt="Retirar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Solicitar</span> Produto</p>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-6">
              <a href="../pages/editar.php">
                <div class="box align-middle">
                  <img src="../../public/image/icons/editar.svg" width="65px" height="65px" alt="Retirar Produto">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Editar</span> Produto</p>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-6">
              <a href="../pages/visualizar.php">
                <div class="box align-middle">
                  <img src="../../public/image/icons/listar.svg" width="65px" height="65px" alt="Listar Produtos">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Listar</span> Produtos</p>
                </div>
              </a>
            </div>

            <div class="col-md-6 col-lg-6">
              <a href="../pages/relatorio.php">
                <div class="box align-middle">
                  <img src="../../public/image/icons/relatorio.svg" width="65px" height="65px"
                    alt="Relatório de Estoque">
                  <p class="acoes text-center align-middle"><span class="font-weight-bold">Relatório</span> de Estoque
                  </p>
                </div>
              </a>
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