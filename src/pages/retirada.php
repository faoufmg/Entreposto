<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

$PesquisaProduto = mysqli_query($conn, "SELECT DISTINCT CONCAT(UCASE(LEFT(Nome, 1)), LCASE(SUBSTRING(Nome, 2))) AS Nome FROM Entrada ORDER BY Nome ASC");
$PesquisaDestino = mysqli_query($conn, "SELECT Destino FROM Destino ORDER BY Destino");

?>

<section class="conteudo">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Retirar Produto</h1>
    </figure>

    <div class="row list-box">
      <div class="col">
        <form action="../Funcoes/FuncaoSaida.php" method="POST" enctype=multipart/form-data>
          <div class="form-row">
            <div class="form-group col-md-12 col-lg-12">
              <label for="SeletorProduto" class="form-label"><strong>Selecionar Produto</strong></label>
              <select class="selectpicker" data-width="100%" data-size="4" id="SeletorProduto" name="SeletorProduto"
                data-live-search="true" title="Selecione o produto" onchange="Validade(this.value)" required>
                <?php
                while ($linha1 = mysqli_fetch_array($PesquisaProduto)) {
                  echo '<option value="' . $linha1['Nome'] . '">' . $linha1['Nome'] . '</option>';
                }
                ?>
              </select>
            </div>
          </div>

          <div class="form-row">

            <div class="form-group col-md-6 col-lg-6">
              <label for="Informacoes" class="form-label"><strong>Informações do Produto</strong></label>
              <div class="form-row">
                <div class="form-group col-md-12 col-lg-12">
                  <input type="selectpicker" id="Informacoes" name="Informacoes" class="form-control form-control-mr"
                    readonly>
                </div>
              </div>
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label class="form-label" for="Quantidade"><strong>Quantidade</strong></label>
              <input type="number" class="form-control" id="Quantidade" name="Quantidade"
                placeholder="Digite a quantidade a ser retirada" class="form-control" required min="1" max="9999999"
                oninput="validity.valid||(value='');">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6 col-lg-6">
              <label><strong>Destino</strong></label>
              <select class="selectpicker" data-width="100%" data-size="4" data-live-search="true"
                title="Selecione o destino" id="SeletorDestino" name="SeletorDestino"
                placeholder="Digite o destino do material" required>
                <option></option>
                <?php
                while ($linha3 = mysqli_fetch_array($PesquisaDestino)) {
                  echo '<option value="' . $linha3['Destino'] . '">' . $linha3['Destino'] . '</option>';
                }
                ?>
              </select>
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label class="form-label" for="Observacao"><strong>Observação</strong></label>
              <input type="text" name="Observacao" class="form-control" id="Observacao">
            </div>

          </div>

          <div class="col text-center mt-3">
            <button class="btn btn-primary mr-2" style="background-color: #831D1C" type="submit">Retirar</button>
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