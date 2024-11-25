<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

$PesquisaProduto = mysqli_query($conn, "SELECT DISTINCT CONCAT(UCASE(LEFT(Nome, 1)), LCASE(SUBSTRING(Nome, 2))) AS Nome FROM Entrada ORDER BY Nome ASC");
$PesquisaDestino = mysqli_query($conn, "SELECT Destino FROM Destino ORDER BY Destino");
?>

<section class="conteudo">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Acrescentar Novo Lote</h1>
    </figure>

    <div class="row list-box">
      <div class="col">
        <form action="../models/entrada.php" method="POST" enctype="multipart/form-data">
          <div class="row">

            <div class="col-md-12 text-center" name="SeletorEntrada">
              <select class="form-select" data-width="100%" data-size="6" id="SeletorEntrada" data-live-search="true"
                name="SeletorEntrada" title="Selecione o Produto" onchange="Validade(this.value)">
                <option selected>Selecionar Produto</option>
                <?php
                while ($linha1 = mysqli_fetch_array($PesquisaProduto)) {
                  echo '<option value="' . $linha1['Nome'] . '">' . $linha1['Nome'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 text-center">
              <label for="Informacoes"><strong>Informações do Produto</strong></label>
              <input type="text" name="Informacoes" readonly class="form-control" id="Informacoes" required>
            </div>

            <div class="col-md-6 text-center">
              <label for="Quantidade"><strong>Quantidade</strong></label>
              <input type="text" name="Quantidade" placeholder="Digite a quantidade a ser retirada" class="form-control"
                id="Quantidade" min="0" max="9999999" oninput="validity.valid||(value='');" required>
            </div>

            <div class="col-md-6 text-center" name="SeletorEntrada">
              <label for="Destino"><strong>Destino</strong></label>
              <select class="form-select" data-width="100%" data-size="6" id="SeletorEntrada" data-live-search="true"
                name="SeletorEntrada" title="Selecione o Produto" onchange="Dados(this.value)">
                <option selected>Selecione o Destino</option>
                <?php
                while ($linha3 = mysqli_fetch_array($PesquisaDestino)) {
                  echo '<option value="' . $linha3['Destino'] . '">' . $linha3['Destino'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 text-center">
              <label for="Observacao"><strong>Observação</strong></label>
              <input type="number" name="Observacao" class="form-control"
                id="Observacao" min="0" max="999999" required>
            </div>

          </div>

          <div class="col text-center mt-3">
            <button type="submit" class="btn btn-primary me-2" style="background-color: #831D1C">Cadastrar</button>
            <a class="btn btn-secondary" href="../pages/index.php">Voltar</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

<?php
include_once('../partials/footer.php');
?>