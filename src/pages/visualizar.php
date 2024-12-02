<?php
include_once("../partials/header.php");
include_once("../../config/db.php");
?>

<section class="principal-index bg-color-cinza">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Visualizar</h1>
    </figure>

    <div class="row justify-content-center">
      <div class="col">
        <div class="row gy-2">

          <div class="col-md-12 col-lg-12 d-flex justify-content-center">
            <a class="redirecionamento" href="visualizar_entrada.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/criar.svg" width="65px" height="65px" alt="Adicionar Produto">
                <p class="acoes text-center fw-bold">Entrada</p>
              </div>
            </a>
          </div>

          <div class="col-md-12 col-lg-12 d-flex justify-content-center">
            <a class="redirecionamento" href="visualizar_saida.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/editar.svg" width="65px" height="65px" alt="Retirar Produto">
                <p class="acoes text-center fw-bold">Saída</p>
              </div>
            </a>
          </div>

          <div class="col-md-12 col-lg-12 d-flex justify-content-center">
            <a class="redirecionamento" href="visualizar_demanda.php">
              <div class="box d-flex flex-column align-items-center">
                <img src="../../public/image/icons/criar.svg" width="65px" height="65px" alt="Adicionar Produto">
                <p class="acoes text-center fw-bold">Demanda</p>
              </div>
            </a>
          </div>

            <div class="col text-center mt-3">
              <a type="button" class="btn btn-primary" style="background-color: #831D1C" href="index.php">Voltar</a>
            </div>

        </div>
      </div>
    </div>
  </div>
</section>

<?php
include_once('../partials/footer.php');
?>