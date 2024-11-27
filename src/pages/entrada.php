<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

try {
    // Prepara e executa a consulta para buscar os nomes dos produtos
    $query = "SELECT DISTINCT Nome FROM Produto ORDER BY Nome ASC";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Obtém os resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}
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
              <select class="form-select" data-width="100%" data-size="6" id="SeletorEntrada" data-live-search="true" name="SeletorEntrada" title="Selecione o Produto" onchange="Dados(this.value)">
                <option selected>Selecione o produto</option>
                <?php
                // Exibe os resultados na lista suspensa
                foreach ($resultados as $row) {
                    echo "<option>" . htmlspecialchars($row['Nome'], ENT_QUOTES, 'UTF-8') . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 text-center">
              <label for="material"><strong>Nome</strong></label>
              <input type="text" name="material" placeholder="Nome do material" class="form-control" id="material" readonly>
            </div>

            <div class="col-md-6 text-center">
              <label for="codigo"><strong>Código</strong></label>
              <input type="text" name="codigo" placeholder="Código do material" class="form-control" id="codigo" min="0" max="999999999999" readonly>
            </div>

            <div class="col-md-6 text-center">
              <label for="descricao"><strong>Descrição</strong></label>
              <input type="text" name="descricao" placeholder="Descrição do material" class="form-control" id="descricao" readonly>
            </div>

            <div class="col-md-6 text-center">
              <label for="local"><strong>Local</strong></label>
              <input type="text" name="local" placeholder="Local onde se encontra o material" class="form-control" id="local" readonly>
            </div>

            <div class="col-md-6 text-center">
              <label for="data_validade"><strong>Validade</strong></label>
              <input type="date" name="data_validade" class="form-control" id="data_validade">
            </div>

            <div class="col-md-6 text-center">
              <label for="quantidade"><strong>Quantidade</strong></label>
              <input type="number" name="quantidade" placeholder="Digite a quantidade" class="form-control" id="quantidade" min="0" max="999999" required>
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
include_once("../partials/footer.php");
?>
