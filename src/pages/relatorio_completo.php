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

        <figure class="text-center">
            <h1>Relatórios</h1>
        </figure>

        <table id="relatorioCompleto" class="table table-striped table-bordered text-center">
            <thead class="table-dark">
                <tr>
                    <th>Produto</th>
                    <th>Movimentação</th>
                    <th>Origem</th>
                    <th>Destino</th>
                    <th>Validade</th>
                    <th>Quantidade</th>
                    <th>Descrição</th>
                    <th>Data de Movimentação</th>
                    <th>Usuário</th>
                </tr>
            </thead>

            <tbody>
                <?php
                while ($resultados) {
                    echo '<tr>
                  <td>' . $resultados['Nome'] . '</td>                           
                  <td style="color:green">' . $resultados['OrigemMovimentacao'] . '</td>
                  <td>' . $resultados['Local'] . '</td>
                  <td></td>
                  <td>' . date("d/m/Y", strtotime($resultados['Validade'])) . '</td>
                  <td>' . $resultados['QuantidadeEntrou'] . '</td>
                  <td>' . $resultados['Descricao'] . '</td>                            
                  <td>' . date("d/m/Y", strtotime($resultados['DataMovimentacao'])) . '</td>
                  <td>' . $resultados['Usuario'] . '</td>
                </tr>';
                }
                ?>
            </tbody>
        </table>

        <div class="form-row">
            <div class="col text-center mt-3">
                <br>
                <a type="button" class="btn btn-primary" style="background-color: #831D1C" href="relatorio.php">Voltar</a>
            </div>
        </div>

</section>

<?php
include_once('../partials/footer.php');
?>