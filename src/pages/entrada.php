<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

$pesquisa = mysqli_query($conn, "SELECT DISTINCT Nome FROM Entrada ORDER BY Nome ASC");
?>

<section class="conteudo">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Acrescentar Novo Lote</h1>
    </figure>

    <div class="row list-box">
      <div class="col">
        <form action="../models/entrada.php" method="POST" enctype="multipart/form-data">
          <div class="form-row">

            <div class="form-group col-md-12 col-lg-12" name="SeletorEntrada">
              <select class="selectpicker" data-width="100%" data-size="6" id="SeletorEntrada" data-live-search="true"
                name="SeletorEntrada" title="Selecione o Produto" onchange="Dados(this.value)">
                <option selected>Novo Produto</option>
                <?php
                while ($row = mysqli_fetch_array($pesquisa)) {
                  echo "<option>" . $row['Nome'] . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label class="form-label" for="material"><strong>Nome</strong></label>
              <input type="text" name="nome" placeholder="Digite o nome do material" class="form-control" id="material"
                required>
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label for="codigo"><strong>Código</strong></label>
              <input type="text" name="codigo" placeholder="Digite o código do material" class="form-control"
                id="codigo" min="0" max="999999999999" required>
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label for="data_validade"><strong>Validade</strong></label>
              <input type="date" name="data_validade" class="form-control" id="data_validade" required>
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label class="form-label" for="quantidade"><strong>Quantidade</strong></label>
              <input type="number" name="quantidade" placeholder="Digite a quantidade" class="form-control"
                id="quantidade" min="0" max="999999" required>
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label class="form-label" for="descricao"><strong>Descrição</strong></label>
              <input type="text" name="descricao" placeholder="Digite a descrição do material" class="form-control"
                id="descricao">
            </div>

            <div class="form-group col-md-6 col-lg-6">
              <label for="local"><strong>Local</strong></label>
              <input type="text" name="local" placeholder="Digite o local onde se encontra o material"
                class="form-control" id="local">
            </div>

          </div>

          <div class="col text-center mt-3">
            <button type="submit" class="btn btn-primary mr-2" style="background-color: #831D1C">Cadastrar</button>
            <a class="btn btn-secondary" href="../pages/index.php">Voltar</a>
          </div>

        </form>
      </div>
    </div>
  </div>
</section>

<?php
include_once("../partials/footer.php");
?>