<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

try {
    // Prepara e executa a consulta para buscar os nomes dos produtos
    $query = "SELECT P.Nome, SUM(E.QuantidadeRestante)
              FROM Entrada AS E
              JOIN Produto AS P
              ON E.Produto_id = P.Produto_id
              WHERE E.QuantidadeRestante = 0";
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
            <h1>Demanda de Produto</h1>
        </figure>

        <div class="row list-box">
            <div class="col">
                <form action="../models/demanda.php" method="POST" enctype=multipart/form-data>
                    <div class="row">

                        <div class="col-md-6 text-center">
                            <label for="SeletorProduto" class="form-label"><strong>Selecionar Produto</strong></label>
                            <select class="form-select" data-width="100%" data-size="4" id="SeletorProduto"
                                name="SeletorProduto" data-live-search="true" title="Selecione o produto" required>
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
                            <label class="form-label" for="Quantidade"><strong>Quantidade</strong></label>
                            <input type="number" class="form-control" id="Quantidade" name="Quantidade"
                                placeholder="Digite a quantidade de demanda" class="form-control" required min="1" max="9999999" >
                        </div>

                        <div class="col-md-6 text-center">
                            <label for="SeletorDestino" class="form-label"><strong>Destino</strong></label>
                            <select class="form-select" data-width="100%" data-size="4" data-live-search="true"
                                title="Selecione o destino" id="SeletorDestino" name="SeletorDestino"
                                placeholder="Digite o destino do material" required>
                                <option selected>Selecione o Destino</option>
                                <?php
                                foreach ($resultadosDestino as $row) {
                                    echo "<option>" . htmlspecialchars($row['Destino'], ENT_QUOTES, 'UTF-8') . "</option>";
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-6 text-center">
                            <label class="form-label" for="Observacao"><strong>Observação</strong></label>
                            <input type="text" name="Observacao" class="form-control" id="Observacao">
                        </div>

                        <div class="col text-center mt-3">
                            <button class="btn btn-primary mr-2" style="background-color: #831D1C"
                                type="submit">Registrar</button>
                            <a class="btn btn-secondary" href="../pages/index.php">Voltar</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</section>

<?php
include_once('../partials/footer.php');
?>