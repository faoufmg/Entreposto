<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

try {
  // Prepara e executa a consulta para buscar os nomes dos produtos
  $query = "SELECT DISTINCT P.Nome
            FROM Entrada AS E
            JOIN Produto AS P
            ON E.Produto_id = P.Produto_id";
  $stmt = $pdo->prepare($query);
  $stmt->execute();

  // Obtém os resultados
  $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

  $queryDestino = "SELECT Destino FROM Destino ORDER BY Destino ASC";
  $stmt = $pdo->prepare($queryDestino);
  $stmt->execute();

  $resultadosDestino = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
  die("Erro na consulta: " . $e->getMessage());
}

?>

<section class="conteudo">
  <div class="container-fluid">

    <figure class="text-center">
      <h1>Retirar Produto</h1>
    </figure>

    <div class="row list-box">
      <div class="col">
        <form action="../models/retirada.php" method="POST" enctype="multipart/form-data">
          <div class="row">

            <div class="col-md-12 text-center" name="SeletorRetirada">
              <select class="form-select" data-width="100%" data-size="6" id="SeletorRetirada" data-live-search="true"
                name="SeletorRetirada" title="Selecione o Produto" onchange="Informacoes(this.value)">
                <option selected>Selecionar Produto</option>
                <?php
                // Exibe os resultados na lista suspensa
                foreach ($resultados as $row) {
                  echo "<option>" . htmlspecialchars($row['Nome'], ENT_QUOTES, 'UTF-8') . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 text-center">
              <label for="Informacoes"><strong>Informações do Produto</strong></label>
              <input type="text" name="Informacoes" placeholder="Selecione o produto que se deseja retirar" readonly class="form-control" id="Informacoes" required>
            </div>

            <div class="col-md-6 text-center">
              <label for="Quantidade"><strong>Quantidade</strong></label>
              <input type="number" name="Quantidade" placeholder="Digite a quantidade a ser retirada" class="form-control"
                id="Quantidade" min="0" max="9999999" oninput="validity.valid||(value='');" required>
            </div>

            <div class="col-md-6 text-center">
              <label for="Destino"><strong>Destino</strong></label>
              <select class="form-select" data-width="100%" data-size="6" id="Destino" data-live-search="true"
                name="Destino" title="Selecione o destino" onchange="Dados(this.value)">
                <option selected>Selecione o Destino</option>
                <?php
                // Exibe os resultados na lista suspensa
                foreach ($resultadosDestino as $row) {
                  echo "<option>" . htmlspecialchars($row['Destino'], ENT_QUOTES, 'UTF-8') . "</option>";
                }
                ?>
              </select>
            </div>

            <div class="col-md-6 text-center">
              <label for="Observacao"><strong>Observação</strong></label>
              <input type="text" name="Observacao" placeholder="Digite observações do produto" class="form-control" id="Observacao">
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