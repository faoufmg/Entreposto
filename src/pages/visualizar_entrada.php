<?php
include_once("../partials/header.php");
include_once("../../config/db.php");

try {
    // Prepara e executa a consulta para buscar os nomes dos produtos
    $query = "SELECT *
              FROM Entrada AS E
              JOIN MovimentacaoDatas AS MD
              ON E.MovimentacaoDatas_id = MD.MovimentacaoData_id
              JOIN Produto AS P
              ON E.Produto_id = P.Produto_id";
    $stmt = $pdo->prepare($query);
    $stmt->execute();

    // Obtém os resultados
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Erro na consulta: " . $e->getMessage());
}
?>

<section class="conteudo-visualizar">
    <div class="container-fluid">

        <table id="visualizar" class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Produto</th>
                    <th>Validade</th>
                    <th>Data de Movimentação</th>
                    <th>Descrição</th>
                    <th>Quantidade</th>
                    <th>Código</th>
                    <th>Local</th>
                </tr>
            </thead>

            <tbody>
                <?php
                foreach ($resultados as $resultado) {
                    echo 
                    '<tr>
                    <td>' . $resultado['Nome'] . '</td>
                    <td>' . date("d/m/Y", strtotime($resultado['Validade'])) . '</td>
                    <td>' . date("d/m/Y H:i:s", strtotime($resultado['DataMovimentacao'])) . '</td>
                    <td>' . $resultado['Descricao'] . '</td>
                    <td>' . $resultado['QuantidadeRestante'] . '</td>
                    <td>' . $resultado['Codigo'] . '</td>
                    <td>' . $resultado['Local'] . '</td>
                    </tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="form-row">
            <div class="col text-center mt-3">
                <br>
                <a type="button" class="btn btn-primary" style="background-color: #831D1C" href="visualizar.php">Voltar</a>
            </div>
        </div>

</section>

<?php
include_once('../partials/footer.php');
?>