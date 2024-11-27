<?php
include_once('../partials/header.php');
?>

<section class="principal-index bg-color-cinza">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Entreposto</h1>
    </figure>

    <div class="row justify-content-center">
      <div class="col">
        <div class="row gy-2">

          <div class="col-md-6 col-lg-6 d-flex justify-content-center">
            <a class="redirecionamento" href="../pages/cadastro_produto.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/criar.svg" width="65px" height="65px" alt="Adicionar Produto">
                <p class="acoes text-center fw-bold">Cadastro</p>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-6 d-flex justify-content-center">
            <a class="redirecionamento" href="../pages/editar.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/editar.svg" width="65px" height="65px" alt="Retirar Produto">
                <p class="acoes text-center fw-bold">Editar Produto</p>
              </div>
            </a>
          </div>

          <div class="col-md-4 col-lg-4 d-flex justify-content-center">
            <a class="redirecionamento" href="../pages/entrada.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/criar.svg" width="65px" height="65px" alt="Adicionar Produto">
                <p class="acoes text-center fw-bold">Entrada</p>
              </div>
            </a>
          </div>

          <div class="col-md-4 col-lg-4 d-flex justify-content-center">
            <a class="redirecionamento" href="../pages/retirada.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/retirar.svg" width="65px" height="65px" alt="Retirar Produto">
                <p class="acoes text-center fw-bold">Retirar Produto</p>
              </div>
            </a>
          </div>

          <div class="col-md-4 col-lg-4 d-flex justify-content-center">
            <a class="redirecionamento" href="../pages/demanda.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/pendente.svg" width="65px" height="65px" alt="Retirar Produto">
                <p class="acoes text-center fw-bold">Solicitar Produto</p>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-6 d-flex justify-content-center">
            <a class="redirecionamento" href="../pages/visualizar.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/listar.svg" width="65px" height="65px" alt="Listar Produtos">
                <p class="acoes text-center fw-bold">Listar Produtos</p>
              </div>
            </a>
          </div>

          <div class="col-md-6 col-lg-6 d-flex justify-content-center">
            <a class="redirecionamento" href="../pages/relatorio.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/relatorio.svg" width="65px" height="65px" alt="Relatório de Estoque">
                <p class="acoes text-center fw-bold">Relatório de Estoque
                </p>
              </div>
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>
</section>


<?php
include_once('../partials/footer.php');
?>